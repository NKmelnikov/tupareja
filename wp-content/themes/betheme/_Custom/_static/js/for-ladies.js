(function ($) {
	let la1 = {
		homeUrl: location.protocol + '//' + location.host + '/ru/',
		submitBtn: $('.la1-submit'),
		ladiesForm: $('#la1-form'),
		fileNameSpan: $('#la1-fileName-text'),
		uploadInput: $('#la1-video-upload'),
		fakeFileUploadBtn: $('#la1-fake-file-input'),
		dateInput: document.getElementById('la1-dateOfBirth'),
		phoneInput: document.getElementById('la1-phone'),

		clearErrors() {
			$('.error-box').text(''); //clear error spans
			$('.la1-input').removeClass('error-input');
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

		sendAjax(url_video) {
			let data = this.ladiesForm.serialize();
			data += '&video_link=' + url_video;
			data['g-recaptcha-response'] = grecaptcha.getResponse();
			$.ajax({
				url: this.ladiesForm.attr('action'),
				type: 'POST',
				data: data,
				success: function (response) {
					la1.validate(response);
				}
			});
		},

		sendAjaxVideo() {
			let file_video = la1.uploadInput.prop('files')[0];
			let data_video = new FormData();
			data_video.append('file', file_video);
			$.ajax({
				url: '/wp-content/themes/betheme/_Custom/Actions/uploadVideo.php',
				type: 'POST',
				data: data_video,
				cache: false,
				processData: false,
				contentType: false,
				success: function (msg) {
					la1.sendAjax(msg);
				}
			});
		},

		sendAjaxTelegram() {
			let name = $('#la1-name').val(),
				email = $('#la1-email').val(),
				phone = $('#la1-phone').val(),
				botToken = '542831533:AAHGt0Q4YVi0EuLkOpkDqdyzpQD5IInzCHQ',
				chatId = '-1001312503507',
				text = '*Nuevo perfil de chica*' + "\n";
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
			if(la1.dateInput.value.includes('_')){
				la1.dateInput.setCustomValidity('Дата заполнена не корректно')
			} else {
				la1.dateInput.setCustomValidity('')
			}

			if(la1.phoneInput.value.includes('_')){
				la1.phoneInput.setCustomValidity('Телефон заполнен не корректно')
			} else {
				la1.phoneInput.setCustomValidity('')
			}

			return this.ladiesForm.find(":invalid").each(function (index, node) {
				$(`#${node.id}`).addClass('error-input');
				$(`.error-${node.id}`).html(node.validationMessage);
			});
		},

		validate(data) {
			data = JSON.parse(data);
			if (data.error) {
				this.showNotification('danger', data.error);
				grecaptcha.reset();
			} else {
				la1.sendAjaxTelegram();
				let noti = la1.showNotification('success', `<strong>Загрузка файлов...</strong>`);
				$('.meter').show();
				setTimeout(function () {
					noti.update('message', `<strong>Файлы загружены!</strong>`);
					$('.meter').hide();
				}, 2000);
				setTimeout(function () {
					noti.update('message', 'Спасибо. Ваша анкета появится на сайте, после проверки администратором.');
				}, 4000);
				setTimeout(() => {
					location.replace(this.homeUrl)
				}, 9000);
			}
		},

		submitApplicationClient() {
			if (this.validateHtml().length === 0) {
				if (document.getElementById("la1-video-upload").files.length == 0) {
					this.sendAjax("no_video");
				} else {
					this.sendAjaxVideo();
				}
			} else {
				this.showNotification('danger', 'Ошибки в полях ввода.');
				grecaptcha.reset();
			}
		},

		fileValidate() {
			let file = la1.uploadInput.prop('files')[0],
				ext = "не определилось",
				parts = file.name.split('.');
			la1.uploadInput.removeClass('error-input');
			la1.fileNameSpan.html(file.name);
			if (parts.length > 1) ext = parts.pop();
			if (file.type !== "video/mp4") {
				la1.showNotification('danger', "Неверный тип файла!");
				la1.uploadInput.addClass('error-input');
			}
			if (ext !== "mp4") {
				la1.showNotification('danger', "Неверный формат видео!");
				la1.uploadInput.addClass('error-input');
			}
			if (file.size >= 60 * 1024 * 1024) {
				la1.showNotification('danger', "Видео не должно быть больше 60мб!");
				la1.uploadInput.addClass('error-input');
			}
		}
	};

	let momentFormat = 'DD/MM/YYYY';
	let momentMask = IMask(la1.dateInput, {
		mask: Date,
		pattern: momentFormat,
		lazy: false,
		min: new Date(1940, 0, 1),
		max: new Date(2030, 0, 1),

		format: function (date) {
			return moment(date).format(momentFormat);
		},
		parse: function (str) {
			return moment(str, momentFormat);
		},

		blocks: {
			YYYY: {
				mask: IMask.MaskedRange,
				from: 1940,
				to: 2030
			},
			MM: {
				mask: IMask.MaskedRange,
				from: 1,
				to: 12
			},
			DD: {
				mask: IMask.MaskedRange,
				from: 1,
				to: 31
			}
		},
	});

	var dynamicMask = IMask(la1.phoneInput, {
		mask: [
			{
				mask: '+000 (00) 000 00 00',
				startsWith: '380',
				lazy: false,
				country: 'Ukraine'
			},
			{
				mask: '+0 (000) 000 00 00',
				startsWith: '7',
				lazy: false,
				country: 'Russia'
			},
			{
				mask: '+000 (00) 000 00 00',
				startsWith: '375',
				lazy: false,
				country: 'Belarus'
			},
			{
				mask: '0000000000000',
				startsWith: '',
				country: 'unknown'
			}
		],
		dispatch: function (appended, dynamicMasked) {
			var number = (dynamicMasked.value + appended).replace(/\D/g,'');

			return dynamicMasked.compiledMasks.find(function (m) {
				return number.indexOf(m.startsWith) === 0;
			});
		}
	});



	la1.submitBtn.on('click', (e) => {
		e.preventDefault();
		la1.submitApplicationClient();
	});

	$('.la1-input').on('input', () => {
		la1.clearErrors();
	});

	la1.fakeFileUploadBtn.on('click', () => {
		la1.uploadInput.click();
	});

	la1.uploadInput.on('change', la1.fileValidate);

	$('#la1-eyeColor').on('change', function () {
		$(this).css('color', 'gray');

		if ($(this).val() !== '') {
			$(this).css('color', 'black');
		}
	})
})(jQuery);
