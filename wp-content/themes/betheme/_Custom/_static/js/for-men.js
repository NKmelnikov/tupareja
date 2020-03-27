(function ($) {
    var ma1 = {
        homeUrl: location.protocol + '//' + location.host,
        submitBtn: $('.ma1-submit'),
        mensForm: $('#ma1-form'),

        clearErrors() {
            $('.error-box').text(''); //clear error spans
            $('.ma1-input').removeClass('error-input');
        },

        showNotification(type, message, timeOut = 7000) {
            return $.notify({
                message: message,
            }, {
                type: type,
                delay: timeOut,
                allow_dismiss: false,
                template: '<div data-notify="container" class="la1-notification alert alert-{0}" role="alert">' +
                    '<div data-notify="message">{2}</div>' +
                    '<div class="meter">' +
                    '<span style="width:100%;"><span class="progress"></span></span>' +
                    '</div>' +
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

        sendAjax() {
            let data = this.mensForm.serialize();
            data['g-recaptcha-response'] = grecaptcha.getResponse();
            $.ajax({
                url: this.mensForm.attr('action'),
                type: 'POST',
                data: data,
                success: function (response) {
                    ma1.validate(response);

                }
            });
        },

        sendAjaxTelegram() {
            let name = $('#ma1-name').val(),
                email = $('#ma1-email').val(),
                phone = $('#ma1-phone').val(),
                botToken = '542831533:AAHGt0Q4YVi0EuLkOpkDqdyzpQD5IInzCHQ',
                chatId = '-1001312503507',
                text = '*Nuevo perfil de hombre*' + "\n";
            text += `*Nombre*: ${name}` + "\n";
            text += `*Email*: ${email}` + "\n";
            text += `*Teléfono*: ${phone}` + "\n";


            let url = `https://api.telegram.org/bot${botToken}/sendMessage`;
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    chat_id: chatId,
                    text: text,
                    parse_mode: 'Markdown'
                },
                success: function (response) {

                }
            });
        },

        validateHtml() {
            this.clearErrors();
            return this.mensForm.find(":invalid").each(function (index, node) {
                $(`#${node.id}`).addClass('error-input');
                $(`.error-${node.id}`).html(node.validationMessage);
            });
        },

        validate(data) {
            data = JSON.parse(data);
            if (data.error) {
                this.showNotification('danger', data.error)
            } else {
                ma1.sendAjaxTelegram();
                let noti = ma1.showNotification('success', `<strong>Cargando archivos...</strong>.`);
                $('.meter').show();
                setTimeout(function () {
                    noti.update('message', `<strong>Los archivos están cargados</strong>.`);
                    $('.meter').hide();
                }, 2000);
                setTimeout(function () {
                    noti.update('message', 'Gracias, el operador lo contactará a la brevedad.');
                }, 4000);
                setTimeout(() => {
                    location.replace(this.homeUrl)
                }, 9000);
            }
        },

        submitApplicationClient() {
            if (ma1.validateHtml().length === 0) {
                this.sendAjax();
            } else {
                this.showNotification('danger', 'Errores en los campos de entrada.');
                grecaptcha.reset();
            }
        },

    };

    $('.ma1-input').on('input', () => {
        ma1.clearErrors();
    });

    ma1.submitBtn.on('click', (e) => {
        e.preventDefault();

        ma1.submitApplicationClient();
    });

})(jQuery);
