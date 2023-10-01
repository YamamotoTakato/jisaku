document.addEventListener("DOMContentLoaded", function() {
    var imageUpload = document.getElementById('profile_image');  
    var imagePreview = document.getElementById('image-preview');

    // この時点でimagePreviewがnullかどうかチェック
    if (imagePreview === null) {
        console.error('image-preview element not found');
        return; // 見つからない場合は以降の処理を中断
    }

    imageUpload.addEventListener('change', function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.addEventListener("load", function() {
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});
