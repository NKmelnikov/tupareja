(function ($) {
    let la1 = {
        homeUrl: location.protocol + '//' + location.host,
        submitBtn : $('.la1-submit'),
        ladiesForm: $('#la1-form'),
        uploadInput: $('#la1-video-upload'),

        clearErrors() {
            $('.error-box').text(''); //clear error spans
            $('.la1-input').removeClass('error-input');
        },

        showNotification(type, message, timeOut = 7000){
            $.notify({
                title: 'Внимание!',
                message: message,
            },{
                type: type,
                delay: timeOut,
                template: '<div data-notify="container" class="la1-notification alert alert-{0}" role="alert">' +
                    '<div data-notify="title"><b>{1}</b></div>' +
                    '<div data-notify="message">{2}</div>' +
                    '</div>',
                placement: {
                    from: "bottom"
                },
                animate: {
                    enter: 'animated fadeInRight',
                    exit: 'animated fadeOutRight'
                }
            });
        },

        sendAjax(url_video){
            let data = this.ladiesForm.serialize();
          data+='&video_link='+url_video;
            data['g-recaptcha-response'] = grecaptcha.getResponse();

            $.ajax({
                url: this.ladiesForm.attr('action'),
                type: 'POST',
                data : data,
                success: function(response){
                    la1.validate(response);
                }
            });
        },

        sendAjaxVideo(){
          let file_video = la1.uploadInput.prop('files')[0];
          let data_video = new FormData();
          data_video.append('file',file_video);
          $.ajax({
            url: '/wp-content/themes/betheme/_Custom/Actions/uploadVideo.php',
            type: 'POST',
            data: data_video,
            cache: false,
            processData: false,
            contentType: false,
            success: function (msg) {
              la1.sendAjax(msg);
            },
            beforeSend: la1.showNotification('success','Идет загрузка видео',5000)
          });
        },
        validateHtml(){
            this.clearErrors();
            return this.ladiesForm.find( ":invalid" ).each( function( index, node ) {
                $(`#${node.id}`).addClass('error-input');
                $(`.error-${node.id}`).html(node.validationMessage);
                console.log(node.id);
                console.log(node.validationMessage);
            });
        },

        validate(data) {
            data = JSON.parse(data);
            if (data.error) {
                this.showNotification('danger', data.error)
            } else {
                this.showNotification('success', data.success);
                setTimeout(()=>{
                    location.replace(this.homeUrl)
                },7000)
            }
        },

        submitApplicationClient () {
            if (this.validateHtml().length === 0) {
                 this.sendAjaxVideo();
            }
        },

        fileValidate() {
        let file = la1.uploadInput.prop('files')[0],
          ext = "не определилось",
          parts = file.name.split('.');
        la1.uploadInput.removeClass('error-input');
        if (parts.length > 1) ext = parts.pop();
        if (file.type!=="video/mp4") {
          la1.showNotification('danger', "Неверный тип файла!");
          la1.uploadInput.addClass('error-input');}
        if (ext!=="mp4") {
          la1.showNotification('danger', "Неверный формат видео!");
          la1.uploadInput.addClass('error-input');}
        if (file.size>=60*1024*1024) {
          la1.showNotification('danger', "Видео не должно быть больше 60мб!");
          la1.uploadInput.addClass('error-input');}
      }
    };

    la1.submitBtn.on('click', (e) => {
        e.preventDefault();

        la1.submitApplicationClient();
    });


  document.getElementById('la1-video-upload').addEventListener('change', la1.fileValidate);



})(jQuery);
