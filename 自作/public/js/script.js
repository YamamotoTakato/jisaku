

    var imageUpload = document.getElementById('image-upload');
    var imagePreview = document.getElementById('image-preview');

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





    // script.js
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(".like-button").click(function() {
            var postId = $(this).data("post-id");
            
            $.ajax({
                url: "/like",
                method: "POST",
                data: {
                    post_id: postId
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message); 
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert('Error - ' + errorMessage);
                }
            });
        });
    });
    
 
document.getElementById('genreSelect').addEventListener('change', function() {
    document.getElementById('genreForm').submit();
});

    
      