<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class LoginController extends Controller
{
    public function index()
    {   
        session()->forget('user_id');

        return view('index');
    }

    public function login(Request $request)
    {
        // バリデーションルール
        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);
    
        $email = $validatedData['email'];
    
        // ユーザーが入力したメールアドレスでユーザーを検索
        $user = User::where('email', $email)->first();
    
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // メールアドレスとパスワードが一致する場合の処理

            if ($user->role == 'admin') {
                return redirect('admin');  // 'admin'は管理者用ページのルート名
            }
           
            $request->session()->put('user_id', $user->user_id);   // ユーザーIDをセッションに保存
            return redirect('top');

        } else {
            // 該当するユーザーが見つからなかった、またはパスワードが一致しない場合の処理
            return redirect('/')->with('error', 'メールアドレスまたはパスワードが間違っています。');
        }
    }
    

    public function top(Request $request)
{
    $selected_genre = $request->input('genre', ''); // デフォルトは ''

    if ($selected_genre === '' || $selected_genre === 'all') {
        $posts = Post::with('user')->get();
    } else {
        $posts = Post::with('user')->where('category_id', $selected_genre)->get();
    }

    // dd($posts);
   

    return view('top', ['posts' => $posts]); // 投稿データをビューに渡す
}

    
    
    



///マイページ

public function mypage(Request $request)
{
    $userId = $request->session()->get('user_id'); // セッションからuser_idを取得
    $user = User::find($userId); // user_idでユーザーを検索
    $myPosts = Post::where('user_id', $userId)->get(); // user_idで投稿を取得

    return view('mypage', ['user' => $user, 'myPosts' => $myPosts]); // mypage.blade.phpにデータを渡す
}

}
?>
