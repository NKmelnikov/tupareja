(function ($) {
    var ma1 = {
        homeUrl: location.protocol + '//' + location.host,
        submitBtn : $('.ma1-submit'),
        ladiesForm: $('#ma1-form'),

        clearErrors() {
            $('.error-box').text(''); //clear error spans
            $('.ma1-input').removeClass('error-input');
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
            data['g-recaptcha-response'] = grecaptcha.getResponse();

            $.ajax({
                url: this.ladiesForm.attr('action'),
                type: 'POST',
                data : data,
                success: function(response){
                    ma1.validate(response);
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
                setTimeout(()=>{
                    location.replace(this.homeUrl)
                },7000)
            }
        },

        submitApplicationClient () {
            if (this.validateHtml().length === 0) {
                 this.sendAjax();
            }
        },

    };

    ma1.submitBtn.on('click', (e) => {
        e.preventDefault();

        ma1.submitApplicationClient();
    });





})(jQuery);
