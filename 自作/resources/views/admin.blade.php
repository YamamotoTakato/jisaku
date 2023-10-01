
<head>
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<table>
    <thead>
        <tr>
            <th>名前</th>
            <th>Email</th>
            <th>投稿一覧</th>
            <th>削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('posts_by_user', ['id' => $user->user_id]) }}">選択</a></td>

                 <td>
                    <form method="POST" action="{{ route('delete_user', ['id' => $user->user_id]) }}"onsubmit="return confirmDelete();">        
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </tbody>
</table>
<a href="/">戻る</a>
<script>
    function confirmDelete() {
        return confirm('本当に削除しますか？');
    }
</script>

