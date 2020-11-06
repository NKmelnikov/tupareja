var endpoint = '/wp-content/themes/betheme/_Custom/Actions/upload.php';
var pathArray = [];

function makeMain($, id) {
    $(`#make_main-0`).attr("checked", true);
    $('#la1-main-image-path, #ma1-main-image-path, #le1-main-image-path-1').val(pathArray[0]);

    $(`#make_main-${id}`).change(function () {
        $(`.make-main-checkbox`).attr("checked", false);
        $(`#make_main-${id}`).attr("checked", true);

        if ($(this).is(':checked')) {
            $('#la1-main-image-path, #ma1-main-image-path, #le1-main-image-path-1').val(pathArray[id]);
        }
    });
}

function updateImagesPathes($, responseJSON){
    pathArray.push(responseJSON.path);
}

function onAllCompleteCallback() {
    $('.la1-submit, .ma1-submit').attr('disabled', false);
}

function onProgressCallback () {
    $('.la1-submit, .ma1-submit').attr('disabled', true);
}

document.addEventListener("DOMContentLoaded", function (event) {

    (function ($) {
        $('#fine-uploader-gallery').fineUploader({
            template: 'qq-template-gallery',
            request: {
                endpoint: endpoint
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '/wp-content/themes/betheme/_Custom/_static/fine-uploader/placeholders/waiting-generic.png',
                    notAvailablePath: '/wp-content/themes/betheme/_Custom/_static/fine-uploader/placeholders/not_available-generic.png'
                }
            },
            deleteFile: {
                enabled: true,
                endpoint: endpoint
            },
            retry: {
                enableAuto: true,
                showButton: true
            },
            validation: {
                itemLimit: 5,
                acceptFiles: 'image/*',
                allowedExtensions: ['jpeg', 'jpg', 'gif', 'png', 'bmp', 'tiff', 'tif', 'svg']
            },
            callbacks: {
                onAllComplete: onAllCompleteCallback,
                onProgress: onProgressCallback
            }
        }).on('error', function (event, id, name, reason) {
            console.log(event);
            console.log(id);
            console.log(name);
            console.log(reason);
        }).on('complete', function (event, id, name, responseJSON) {
            $(`.qq-file-id-${id}`).prepend(`<input name="make_main" id="make_main-${id}" class="make-main-checkbox" type="checkbox">Главная`);
            updateImagesPathes($,responseJSON);
            makeMain($, id);
            $('#la1-path-to-images, #ma1-path-to-images, #le1-path-to-images-1').val(pathArray);
        });
    })(jQuery);
});
