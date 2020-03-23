(function ($) {
    var le1 = {
        tableUrl: location.protocol + '//' + location.host+'/wp-admin/admin.php?page=ladies_applications',
        translateUrl: location.protocol + '//' + location.host+'/wp-content/themes/betheme/_Custom/Actions/submitTranslateLady.php',
        translateBtn : $('.le1_bottom_section__button-translate'),
        ladiesForm: $('#le1-form'),
        translateValue: $('.translate-value'),
        currentValArr: [],
        translatedValArr: [],

        sendTranslateAjax(text){
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://translate.yandex.net/api/v1.5/tr.json/translate",
                "method": "GET",
                "data": {
                    "key":"trnsl.1.1.20200313T213245Z.8baf1066581b39f8.9f2992d1b6047707187b4fccbd0eae4431b55466",
                    "lang":"ru-es",
                    "text": text,
                    "options": 1
                }
            };

            $.ajax(settings).done(function (response) {
                le1.changeInputData(response);
            });
        },

        changeInputData(response){
            console.log(response);
            le1.translatedValArr = response.text[0].split('|');
            console.log(le1.translatedValArr);
            this.translateValue.each(function (i) {
                $(this).val(le1.translatedValArr[i]);
            });
        },

        translateApplication() {
            le1.clearArrays();
            this.translateValue.each(function () {
                le1.currentValArr.push($(this).val());
            });
            let text = le1.currentValArr.join('|');
            console.log(text);
            le1.sendTranslateAjax(text);
        },

        clearArrays() {
            le1.currentValArr = [];
            le1.translatedValArr = [];
        }
};

    le1.translateBtn.on('click', (e) => {
        e.preventDefault();

        le1.translateApplication();
    });

})(jQuery);
