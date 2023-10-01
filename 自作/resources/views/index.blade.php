



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="login">
        <div class ="login-text">
            <div class="title ppp">オタク総本山</div>

<!-- 
            <form action="top" method="GET"> -->
            <form action="login" method="POST">
                @csrf
                <div class="title"><label for="name">メールアドレス:</label>
                <input type="email" name="email"><br>
                <label for="password">パスワード:</label>
                <input type="password" name="password"><br></div>
                <div class="log_new">
                    <input type="submit" name="login" value="ログイン" class="neon-button">
                    <a class="new neon-button" href="new">新規登録はこちら</a> 
                </div>                  
                @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)  
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif



                
        </div>
    </div>
</body>
</html>