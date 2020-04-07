(function ($) {
  var le1 = {
    tableUrl: location.protocol + '//' + location.host + '/wp-admin/admin.php?page=ladies_applications',
    saveBtn: $('.le1_bottom_section__button-save'),
    ladiesForm: $('#le1-form'),
    pathToImagesArea: $('#le1-path-to-images'),
    mainImageArea: $('#le1-main-image-path'),
    deleteImgBtn: $('.delete-image'),
    changeMainImgBtn: $('.change-main-image'),
    imgWrapper: $('.image-wrap'),
    ladyImg: $('.le1-lady-image'),

    deleteImage(elem) {
      let pathToImagesArray = le1.pathToImagesArea.val().split(',');
      pathToImagesArray = pathToImagesArray.filter(e => e !== le1.getSelfPath(elem));
      le1.pathToImagesArea.val(pathToImagesArray.join(','));

      if (elem.parent().hasClass('main-image')) {
        le1.changeMainImage(le1.chooseSibling(elem))
      }

      elem.parent().remove();

      if (le1.imgWrapper.parent().length === 0) {
        le1.mainImageArea.val('');
      }
    },

    changeMainImage(elem) {
      le1.imgWrapper.removeClass('main-image');
      le1.ladyImg.removeClass('main-image');
      le1.mainImageArea.val(le1.getSelfPath(elem));
      elem.parent().addClass('main-image');
      elem.siblings('a').children('img').addClass('main-image');
    },

    chooseSibling(elem) {
      if (elem.parent().prev().length === 0 && elem.parent().next().length === 0) {
        return elem;
      } else if (elem.parent().prev().length === 0) {
        return elem.parent().next().children('.change-main-image');
      } else {
        return elem.parent().prev().children('.change-main-image');
      }
    },

    getSelfPath(elem) {
      return elem.siblings('a').data('path');
    },

    clearErrors() {
      $('.error-box').text(''); //clear error spans
      $('.le1-input').removeClass('error-input');
    },

    showNotification(type, message) {
      $.notify({
        title: 'Внимание!',
        message: message,
      }, {
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

    sendAjax() {
      let data = this.ladiesForm.serialize();
      $.ajax({
        url: this.ladiesForm.attr('action'),
        type: 'POST',
        data: data,
        success: function (response) {
          le1.validate(response);
        }
      });
    },

    validateHtml() {
      this.clearErrors();
      return this.ladiesForm.find(":invalid").each(function (index, node) {
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

    saveApplication() {
      if (this.validateHtml().length === 0) {
        this.sendAjax();
      }
    }
  };

  le1.deleteImgBtn.click(function (e) {
    e.preventDefault();
    le1.deleteImage($(this));
  });

  le1.changeMainImgBtn.click(function (e) {
    e.preventDefault();
    le1.changeMainImage($(this));
  });

  le1.saveBtn.on('click', (e) => {
    e.preventDefault();
    le1.saveApplication();
  });

})(jQuery);
