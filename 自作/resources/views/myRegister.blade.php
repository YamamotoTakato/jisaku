<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/myregi.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <div class="nav">
        <div class="nav_text">
            <div><a href="/">ログアウト</a></div>
            <div><a href="top">TOP</a></div>
            <div><a href="mypage">マイページ</a></div>
        </div>
    </div>
    <form class="mypage" action="myup" method="POST" enctype="multipart/form-data">
        @csrf
                <div class="img">
            <label for="profile_image">プロフィール画像:</label>
            <input type="file" name="profile_image" id="profile_image">
            <img id="image-preview" alt="Image Preview" style="display:none; width:100%;">
        </div>
        <div class="mybody">
            <label for="favorite_manga">好きな漫画:</label>
            <input type="text" name="favorite_manga" id="favorite_manga" value="">
        </div>
        <div class="mybody">
            <label for="favorite_game">好きなゲーム:</label>
            <input type="text" name="favorite_game" id="favorite_game" value="">
        </div>
        <div class="mybody">
            <label for="free_text">自由記入欄:</label>
            <textarea name="free_text" id="free_text" rows="4" cols="50"></textarea>
        </div>
        <input type="submit" value="更新する">
    </form>
    <script src="/js/myregi.js"></script>
</body>
</html>
