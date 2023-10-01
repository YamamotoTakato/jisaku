function editPost(postId) {
    // 対象の投稿要素を取得
    const postElement = document.getElementById(`post-${postId}`);
    
    // 画像、タイトル、内容を取得
    const imageSrc = postElement.querySelector('.post-image').src;
    const title = postElement.querySelector('h3').textContent;
    const content = postElement.querySelector('.post-description').textContent;
    
    // モーダルの要素を取得
    const imagePreview = document.getElementById('image-preview');
    const modalTitle = document.getElementById('modal-title');
    const modalContent = document.getElementById('modal-content');

    // モーダルに取得したデータをセット
    imagePreview.src = imageSrc;
    imagePreview.style.display = 'block';
    modalTitle.value = title;
    modalContent.value = content;

    document.getElementById('modal-post-id').value = postId;
    document.getElementById('modal-submit-button').textContent = '更新';
    
    // モーダルを表示
    $('#myModal').modal('show');

    // 画像のinput要素にイベントリスナーを設定
document.getElementById('image-upload').addEventListener('change', function(event) {
    const imagePreview = document.getElementById('image-preview');
    const reader = new FileReader();
    
    reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
    };
    
    reader.readAsDataURL(event.target.files[0]);
    
});
    
}


