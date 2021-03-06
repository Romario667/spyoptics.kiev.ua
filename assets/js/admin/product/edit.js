console.log('debug', 'entered admin mode');
var $loadingBar = $('#loading');
$loadingBar.html('admin mode');
$loadingBar.css({'opacity': 1, 'display': 'inline-block'});
var productImages = $('.flexslider .container > img');

var fileUploadForm = document.createElement('form');
var fileInput = document.createElement('input');
fileInput.setAttribute('type', 'file');
fileUploadForm.appendChild(fileInput);

$(fileInput).on('change', function() {
    requestImageUpdate();
});

var clickedImageId;

for (var i=0; i<productImages.length; i++) {
    $image = $(productImages[i]);
    $image.on('click', function() {
        $(fileInput).trigger('click');
        clickedImageId = this.id;
    });
}

function requestImageUpdate() {
    console.log('debug', 'gonna upload the file');
    var formData = new FormData();

    formData.append('id', clickedImageId);
    formData.append('userfile', fileInput.files[0]);

    $loadingBar.html('uploading image...');
    $loadingBar.css({'opacity': 1, 'background-color': 'yellow'});
    $.ajax({
        type: 'POST',
        url: SITE_URL + 'admin/adminajaxproduct/update',
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            console.log('debug', 'product update success! Response: ' + response);
            $loadingBar.html('upload success!');
            $loadingBar.css({'background-color': '#5f5'});
        },
        error: function(response) {
            console.log('debug', 'product update error :(. Response: ' + response);
        }
    });
}
