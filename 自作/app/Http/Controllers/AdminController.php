<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }


    public function postsByUser($id) {
        try {
            $user = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('admin')->with('error', 'ユーザーが存在しません');
        }
        $posts = Post::where('user_id', $id)->get();
        return view('posts_by_user', ['posts' => $posts, 'user' => $user]);
    }
    
    public function delete($id)
    {
        $post = Post::where('post_id', $id)->first();
        if ($post) {
            $post->delete();
            return redirect()->back()->with('success', '投稿を削除しました。');
        } else {
            return redirect()->back()->with('error', '投稿が見つかりません。');
        }
    }
}
?>