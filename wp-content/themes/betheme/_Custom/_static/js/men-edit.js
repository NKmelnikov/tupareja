(function ($) {
    let me1 = {
        tableUrl: location.protocol + '//' + location.host+'/wp-admin/admin.php?page=men_applications',
        saveBtn : $('.me1_bottom_section__button-save'),
        menForm: $('#me1-form'),

        clearErrors() {
            $('.error-box').text(''); //clear error spans
            $('.me1-input').removeClass('error-input');
        },

        showNotification(type, message){
            $.notify({
                title: 'Внимание!',
                message: message,
            },{
                type: type,
                delay: 7000,
                template: '<div data-notify="container" class="me1-notification alert alert-{0}" role="alert">' +
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
            let data = this.menForm.serialize();
            $.ajax({
                url: this.menForm.attr('action'),
                type: 'POST',
                data : data,
                success: function(response){
                    me1.validate(response);
                }
            });
        },


        validateHtml(){
            this.clearErrors();
            return this.menForm.find( ":invalid" ).each( function( index, node ) {
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

    me1.saveBtn.on('click', (e) => {
        e.preventDefault();

        me1.saveApplication();
    });

})(jQuery);
