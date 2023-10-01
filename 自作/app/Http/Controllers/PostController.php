<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;


class PostController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     // 'title' => 'required|max:255',
        //     // 'content' => 'required',
        //     // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $title = $request->input('title');
        $content = $request->input('content');
        $user_id = $request->session()->get('user_id');  // セッションからユーザーIDを取得
        $genre = $request->input('genre');

        $imageName = null;
        // dd($genre);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension(); // 画像名を生成
            $imagePath = 'img/' . $imageName; //保存先
            $request->file('image')->storeAs('public', $imagePath); //db

        }

        try {
            $post = new Post();
            $post->title = $title;
            $post->content = $content;
            $post->user_id = $user_id;
            $post->image_path = $imagePath;
            $post->category_id = $genre; 
            $post->save();
        } catch (\Exception $e) {
            return back()->withErrors(['message' => '保存に失敗しました']);
        }

        return redirect('top')->with('message', '投稿が成功しました');
    }

        public function like_list(Request $request)
    {
        $userId = $request->session()->get('user_id'); // セッションからuser_idを取得
        $liked_posts = Post::whereHas('likes', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return view('like_list', ['liked_posts' => $liked_posts]);
    }

    public function edit(Request $request) {
        $post = Post::find($request->post_id);
        $post->title = $request->title;
        $post->content = $request->content;
        // 画像の処理もここで行う
        $post->save();
        return redirect()->back();
    }
    
    


}