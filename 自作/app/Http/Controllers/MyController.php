<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // 必要に応じてUserモデルをインポート
use Illuminate\Support\Facades\Log;  

class MyController extends Controller
{
    public function myup(Request $request)
    {   
        // セッションからuser_idを取得
        $userID = $request->session()->get('user_id');
        

        // $myname = $request->input('name');
        $mygame = $request->input('favorite_game');
        $mybook = $request->input('favorite_manga');
        $mytext = $request->input('free_text');  // 自己紹介欄を追加
        $imageName = null;
        $imagePath = null;

        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->file('profile_image')->getClientOriginalExtension();
            $imagePath = 'img/' . $imageName;
            $request->file('profile_image')->storeAs('public/img', $imageName);
        }

        try {
            $user = User::where('user_id', $userID)->first();
            if ($user) {
                // フォームから送られてきた値、もしくはユーザーの現在の値を使用
                // $user->name = $myname ?? $user->name;
                $user->like_game = $mygame;
                $user->like_manga = $mybook;
                $user->img_path = $imagePath;
                $user->bio = $mytext;  
                $user->save();  // データベースに保存
                return redirect('mypage');
            }  // <-- ここが修正されています
        } catch (\Exception $e) {
            Log::error("An error occurred: " . $e->getMessage());   // エラーメッセージをPHPのエラーログに保存
        }
        
    }

    public function myregi(Request $request)
    {
        return view('myRegister');
    }

////他人のプロフィール
    public function user($user_id)
{   
    $user = User::findOrFail($user_id);  // ユーザーを探すまたは失敗
    // dd($user);
    return view('other_user', ['user' => $user]);  // 他のユーザーのプロフィールビューを返す
}



}
?>