<?php
namespace App\Http\Controllers;

use App\Models\User; // Userモデルをインポート
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function new()
    {   
        return view('new');
    }

    public function new_ok(Request $request)
    {
        // バリデーションルール
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // バリデーションが通った後のコード
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $password = bcrypt($validatedData['password']);  // パスワードのハッシュ化

        // データベースに保存
        $user = new User; 
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        return view('new_ok');
    }

    public function delete($id) {
        $user = User::find($id);
        if($user) {
            $user->delete();
        }
        return redirect()->back();
    }
    
    
}
