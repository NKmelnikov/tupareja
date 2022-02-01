(function ($) {
  let cf1 = {
    homeUrl: location.protocol + '//' + location.host,
    submitBtn: $('#cf1-submit'),
    contactForm: $('#cf1-form'),

    clearErrors() {
      $('.error-box').text(''); //clear error spans
      $('.cf1-input').removeClass('error-input');
    },

    showNotification(type, message, timeOut = 7000) {
      return $.notify({
        message: message,
      }, {
        type: type,
        delay: timeOut,
        allow_dismiss: false,
        template: '<div data-notify="container" class="cf1-notification alert alert-{0}" role="alert">' +
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

    sendAjaxTelegram() {
      let name = $('#cf1-name').val(),
        email = $('#cf1-email').val(),
        phone = $('#cf1-phone').val(),
        message = $('#cf1-message').val(),
        botToken = '542831533:AAHGt0Q4YVi0EuLkOpkDqdyzpQD5IInzCHQ',
        chatId = '-770491158',
      text = `*Имя*: ${name}` + "\n";
      text += `*Email*: ${email}` + "\n";
      text += `*Телефон*: ${phone}` + "\n";
      text += `*Сообщение*: ${message}` + "\n";


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

    sendAjax() {
      let data = this.contactForm.serialize();
      data['g-recaptcha-response'] = grecaptcha.getResponse();

      $.ajax({
        url: this.contactForm.attr('action'),
        type: this.contactForm.attr('method'),
        data: data,
        success: function (response) {
          cf1.validate(response);
        },
        error: function (err) {
          console.log(err);
        }
      });
    },

    validateHtml() {
      this.clearErrors();
      return this.contactForm.find(":invalid").each(function (index, node) {
        $(`#${node.id}`).addClass('error-input');
        $(`.error-${node.id}`).html(node.validationMessage);
      });
    },

    validate(data) {
      data = JSON.parse(data);
      if (data.error) {
        this.showNotification('danger', data.error)
      } else {
        cf1.sendAjaxTelegram();
        cf1.showNotification('success', data.success);
        setTimeout(() => {
          location.replace(this.homeUrl)
        }, 4000)
      }
    },

    sendContactForm() {
      if (this.validateHtml().length === 0) {
        this.sendAjax();
      } else {
        grecaptcha.reset();
      }
    },

  };

  cf1.submitBtn.on('click', (e) => {
    e.preventDefault();
    cf1.sendContactForm();
  });

  $('.cf1-input').on('input', () => {
    cf1.clearErrors();
  });

})(jQuery);
