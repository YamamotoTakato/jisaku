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
        <a href="/top">戻る</a>
    </div>
