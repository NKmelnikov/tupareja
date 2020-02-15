(function ($) {
    var le1 = {
        homeUrl: location.protocol + '//' + location.host,
        saveBtn : $('.le1_bottom_section__button-save'),
        activateBtn : $('.le1_bottom_section__button-save'),
        ladiesForm: $('#le1-form'),

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

        sendSaveAjax(){
            $.ajax({
                url: this.ladiesForm.attr('action'),
                type: 'POST',
                data : data,
                success: function(response){
                    le1.validate(response);
                }
            });
        },

        sendActivateAjax(){
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
                setTimeout(()=>{
                    location.replace(this.homeUrl)
                },7000)
            }
        },

        saveApplication () {
            if (this.validateHtml().length === 0) {
                this.sendAjax();
            }
        }

    };

    le1.saveBtn.on('click', (e) => {
        e.preventDefault();

        le1.saveApplication();
    });

    le1.activateBtn.on('click', (e) => {
        e.preventDefault();

        le1.saveApplication();
    });

    $('.le1-input').on('input', function () {
        le1.clearErrors();
    });

})(jQuery);
