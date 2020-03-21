(function ($) {
    var ma1 = {
        homeUrl: location.protocol + '//' + location.host + 'es/',
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
            let telegramArray = {
                name: $('#ma1-name').val(),
                email: $('#ma1-email').val(),
                phone: $('#ma1-phone').val()
            };

            let data = this.mensForm.serialize();
            data['g-recaptcha-response'] = grecaptcha.getResponse();

            $.ajax({
                url: this.mensForm.attr('action'),
                type: 'POST',
                data: data,
                success: function (response) {
                    ma1.validate(response);
                    ma1.sendAjaxTelegram(telegramArray)

                }
            });
        },

        sendAjaxTelegram(data) {
            let botToken = '542831533:AAHGt0Q4YVi0EuLkOpkDqdyzpQD5IInzCHQ';
            let chatId = '-1001312503507';
            let text = 'Новая !мужская! анкета' + "\n";
            text += `Имя: ${data['name']}` + "\n";
            text += `Email: ${data['email']}` + "\n";
            text += `Телефон: ${data['phone']}` + "\n";


            let url = `https://api.telegram.org/bot${botToken}/sendMessage`;
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    chat_id: chatId,
                    text: text
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
                let noti = ma1.showNotification('success', `<strong>${data.success0}</strong>.`);
                $('.meter').show();
                setTimeout(function () {
                    noti.update('message', `<strong>${data.success1}</strong>.`);
                    $('.meter').hide();
                }, 2000);
                setTimeout(function () {
                    noti.update('message', data.success2);
                }, 4000);
                setTimeout(() => {
                    location.replace(this.homeUrl)
                }, 9000)
            }
        },

        submitApplicationClient() {
            if (ma1.validateHtml().length === 0) {
                this.sendAjax();
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
