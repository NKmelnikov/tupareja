var endpoint = '/wp-content/themes/betheme/_Custom/Actions/upload.php';
var pathArray = [];

function makeMain($, id) {
    $(`#make_main-0`).attr("checked", true);
    $('#la1-main-image-path').val(pathArray[0]);

    $(`#make_main-${id}`).change(function () {
        $(`.make-main-checkbox`).attr("checked", false);
        $(`#make_main-${id}`).attr("checked", true);

        if ($(this).is(':checked')) {
            $('#la1-main-image-path').val(pathArray[id]);
        }
    });
}

function updateImagesPathes($, responseJSON){
    pathArray.push(responseJSON.path);
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
                itemLimit: 4,
                acceptFiles: 'image/*',
                allowedExtensions: ['jpeg', 'jpg', 'gif', 'png']
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

            console.log(JSON.stringify(pathArray));
            $('#la1-path-to-images').val(JSON.stringify(pathArray));


        });
    })(jQuery);
});
