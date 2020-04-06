(function ($) {
    var le1 = {
        tableUrl: location.protocol + '//' + location.host+'/wp-admin/admin.php?page=ladies_applications',
        saveBtn : $('.le1_bottom_section__button-save'),
        ladiesForm: $('#le1-form'),

        deleteImage(elem){
          elem.parent().remove();
          let str ="";
          let images = $('.image-wrap a').each(function (i) {
            if (i==0){ str+=$(this).attr("href");}
            else {
            str+=","+$(this).attr("href");
            }
          });
          console.log(str);
            $('#le1-path-to-images').val(str);
        },

        clearErrors() {
            $('.error-box').text(''); //clear error spans
            $('.le1-input').removeClass('error-input');
        },

        showNotification(type, message){
            $.notify({
                title: 'Внимание!',
                message: message,
            },{
                type: type,
                delay: 7000,
                template: '<div data-notify="container" class="le1-notification alert alert-{0}" role="alert">' +
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

        sendAjax(){
            let data = this.ladiesForm.serialize();
            $.ajax({
                url: this.ladiesForm.attr('action'),
                type: 'POST',
                data : data,
                success: function(response){
                    le1.validate(response);
                }
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
                location.replace(this.tableUrl)
            }
        },

        saveApplication () {
            if (this.validateHtml().length === 0) {
                this.sendAjax();
            }
        }

    };
    $("button.delete-image").click(function (e) {
      e.preventDefault();
      le1.deleteImage($(this));
    });
    le1.saveBtn.on('click', (e) => {
        e.preventDefault();

        le1.saveApplication();
    });

})(jQuery);
