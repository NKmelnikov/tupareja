(function ($) {
    var l = {
        homeUrl: location.protocol + '//' + location.host,
        submitBtn : $('.la1-submit'),
        ladiesForm: $('#la1-form'),

        clearErrors() {
            $('.error-box').text(''); //clear error spans
            $('.la1-input').removeClass('error-input');
        },

        showNotification(type, message){
            $.notify({
                title: 'Внимание!',
                message: message,
            },{
                type: type,
                delay: 7000,
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

        sendAjax(){
            let data = this.ladiesForm.serialize();
            data['g-recaptcha-response'] = grecaptcha.getResponse();

            $.ajax({
                url: this.ladiesForm.attr('action'),
                type: 'POST',
                data : data,
                success: function(response){
                    l.validate(response);
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

        verifyCallback(response) {
            return response;
        },

        submitApplicationClient () {
            if (this.validateHtml().length === 0) {
                 this.sendAjax();
            }
        }

    };

    l.submitBtn.on('click', (e) => {
        e.preventDefault();

        l.submitApplicationClient();
    });

    $('.la1-input').on('input', function () {
        l.clearErrors();
    });

    function onloadCallback() {
        grecaptcha.render('g-recaptcha', {
            'sitekey' : '6LdRaDMUAAAAAOwHA7zXiR1sAEbA2yQ9gwt7bbo0',
            'callback' : l.verifyCallback
        });
    };
    window.onloadCallback = onloadCallback;

})(jQuery);
