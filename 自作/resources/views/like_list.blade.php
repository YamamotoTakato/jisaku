
<head>
    <link rel="stylesheet" href="{{ asset('css/adminpost.css') }}">
</head>




<div class="top-header">
    <a href='top' class="back-button">戻る</a>
</div>



@foreach($liked_posts as $post)
<div class="post-author">{{ optional($post->user)->name ?? 'Unknown' }}</div>
    <div class="post-container">
        <div class="post-thumbnail">
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="post-image">
        </div>
        <div class="post-content">
            <h3>{{ $post->title }}</h3>
            <div class="post-description">{{ $post->content }}</div>
        </div>
        <!-- 削除ボタン -->
        <form method="POST" action="{{ route('delete_post', ['id' => $post->post_id]) }}" class="delete-form" onsubmit="return confirmDelete();">
            @csrf
            @method('DELETE')
            <!-- <button type="submit" class="delete-button">削除</button> -->
        </form>
    </div>
@endforeach
<script>
    function confirmDelete() {
        return confirm('本当に削除しますか？');
    }
</script>


