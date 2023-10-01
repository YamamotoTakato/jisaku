<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/top.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery (BootstrapのJavaScriptプラグインが依存) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<!-- <button class="post-button" href=>投稿</button> -->
<body class="TopBody">
    <div class="mynav">
        <div class="nav_text">
            <div><a href="/">ログアウト</a></div>
            <div><a href="top">TOP</a></div>
            <div><a href="mypage">マイページ</a></div>
           
            <form id="genreForm" action="top" method="get">
                <select name="genre" id="genreSelect">
                    <option value="" disabled selected>ジャンル</option> <!-- 初期値として設定 -->
                    <option value="all">全て</option>
                    <option value="game">ゲーム</option>
                    <option value="manga">漫画</option>
                </select>
            </form>
            <div id="posts-container">
        </div>
    </div>
    <div class="container">
    @foreach ($posts as $post)



    

    <<div class="post-author">
    @if(optional($post->user)->user_id)
        <a href="other/{{ optional($post->user)->user_id }}" class="black-text">
            {{ optional($post->user)->name ?? 'Unknown' }}
        </a>
    @else
        {{ 'Unknown' }}
    @endif
</div>


        
       





        <div class="custom-post">
            <div class="post-thumbnail">
                <!-- 画像データがURLとして保存されている場合 -->
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" style="width:100%; height:auto;">
            </div>
            <div class="post-info">
                <div class="post-header">{{ $post->title }}</div>
                <div class="post-description">{{ $post->content }}</div>
                <button class="like-button" data-post-id="{{ $post->post_id }}">👍</button>
            </div>
        </div>
    @endforeach
</div>




<!-- モーダルボタン -->
<button type="button" class="btn btn-primary post-button neon-button" data-toggle="modal" data-target="#myModal">
  投稿
</button>

<!-- モーダルウィンドウの内容 -->
<div class="modal fade" id="myModal">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">投稿内容を入力して下さい</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <form action="/post" method="post" enctype="multipart/form-data">
        @csrf <!-- CSRFトークンを追加 -->
        <div class="modal-body">
            <div class="postbody">
            <div class="PostImg">
                <input type="file" name="image" id="image-upload">
                <img id="image-preview" alt="Image Preview" style="display:none; width:100%;">
            </div>
            <div class="PostContents">
                <div>
                <label for="title">題名:</label>
                <input type="text" id="title" name="title">
                </div>
                <div>
                <label for="content">内容:</label>
                <textarea id="content" name="content"></textarea>
                </div>
            </div>
            </div>
        </div>
            <div class="modal-footer">
                <div>
                    <label for="genre">ジャンル:</label>
                    <select id="genre" name="genre">
                        <option value="manga">漫画</option>
                        <option value="game">ゲーム</option>
                        <!-- 他のジャンルを追加 -->
                    </select>
                </div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">投稿</button> <!-- typeをsubmitに変更 -->
        </div>
        </form>
    </div>
  </div>
</div>
<script src="/js/script.js"></script>
</body>
</html>