<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/new.css">
</head>
<body>
    <div class="neon">
        <div class="wrap">
            <form action="new_ok" method="POST">
            @csrf
            <div class="box">
                <div class="text">
                    <label for="name">名前</label>
                    <input type="text" name="name">
                </div>
                @if($errors->has('name'))<p class="validation-message">{{$errors->first('name')}}</p>@endif
            </div>
                
            <div class="box">
                <div class="text">
                    <label for="email">メールアドレス:</label>
                    <input type="email" name="email">
                </div>
                @if($errors->has('email'))<p class="validation-message">{{$errors->first('email')}}</p>@endif
            </div>
                
            <div class="box">
                <div class="text">
                    <label for="password">パスワード:</label>
                    <input type="password" name="password">
                </div>
                @if($errors->has('password'))<p class="validation-message">{{$errors->first('password')}}</p>@endif
            </div>

            <div class="log_new">
                <input type="submit" name="login" value="登録" class="neon-button">
                <a class="new neon-button" href="/">戻る</a>
            </div>
            </form>   
        </div>               
    </div>
</body>
</html>
