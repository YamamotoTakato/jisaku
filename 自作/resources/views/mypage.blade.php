<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery (BootstrapのJavaScriptプラグインが依存) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="/css/my.css">
</head>
<body>

    <div class="mynav">
        <div class="nav_text1">
            <div><a href="/">ログアウト</a></div>
            <div><a href="top">TOP</a></div>
            <div><a href="like_list">いいね一覧</a></div>
            <div><a href="myregi">編集</a></div>
        </div>
    </div>
    <div class="img"><img src="{{ asset('storage/' . $user->img_path) }}" ></div>
    <div class="mypage">
        <div class="matop">
            <p>{{ $user->name }}</p>
        </div>
        <div class="mybody">
        <p>好きな漫画: {{ $user->like_manga }}</p> 
        </div>
        <div class="mybody">
        <p>好きなゲーム: {{ $user->like_game }}</p>
        </div>
        <div>
            <p>自由記入欄</p>
        </div>
        <div class="body">
        <p>{{ $user->bio }}</p>
        </div>
        <div class="displayText">
            
        </div>
    </div>


    @foreach ($myPosts as $post)
    <div class="post-container" id="post-{{ $post->post_id }}">
        <div class="post-thumbnail">
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="post-image">
        </div>
        <div class="post-content">
            <h3>{{ $post->title }}</h3>
            <div class="post-description">{{ $post->content }}</div>
        </div>
        <form method="POST" action="{{ route('delete_post', ['id' => $post->post_id]) }}" class="delete-form" onsubmit="return confirmDelete();">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">削除</button>
        </form>
        <button class="edit-button" onclick="editPost('{{ $post->post_id }}')">編集</button>
    </div>
@endforeach


    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">投稿内容を入力して下さい</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>




        
        <form action="/post/edit" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="modal-post-id" name="post_id">
    <div class="modal-body">
        <div class="postbody">
            <div class="PostImg">
                <input type="file" name="image" id="image-upload">
                <img id="image-preview" alt="Image Preview" style="display:none; width:100%;">
            </div>
            <div class="PostContents">
                <div>
                    <label for="modal-title">題名:</label>
                    <input type="text" id="modal-title" name="title">
                </div>
                <div>
                    <label for="modal-content">内容:</label>
                    <textarea id="modal-content" name="content"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">閉じる</button>
        <button type="submit" id="modal-submit-button" class="btn btn-primary">更新</button>
    </div>
</form>

        </div>
    </div>
    </div>

<script>
    function confirmDelete() {
        return confirm('本当に削除しますか？');
    }
</script>
<script src="/js/mypage.js"></script>
</body>
</html>
