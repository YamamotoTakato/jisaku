<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function likePost(Request $request)
    {   
    $postId = $request->input('post_id');
    $userId = $request->session()->get('user_id');
    
    \Log::info('Post ID: ' . $postId);  
    \Log::info('User ID: ' . $userId);

    


        // ユーザーが認証されていない場合
        if (is_null($userId)) {
            return response()->json(['success' => false, 'message' => 'User not authenticated']);
        }

        // 既に「いいね」されているかどうかを確認
        $like = Like::where('post_id', $postId)->where('user_id', $userId)->first();
        
        if ($like) {
            // 既に「いいね」している場合は削除
            $like->delete();
            return response()->json(['success' => true, 'message' => 'いいねを取り消しました。']);
        } else {
            // まだ「いいね」していない場合は追加
            $like = new Like;
            $like->post_id = $postId;
            $like->user_id = $userId;
            $like->save();
            return response()->json(['success' => true, 'message' => 'いいねしました！']);
        }
    }
}
