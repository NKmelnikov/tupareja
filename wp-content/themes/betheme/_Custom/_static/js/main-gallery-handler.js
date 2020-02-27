(function ($) {
    let mp1 = {
        galleryWrapper: $('.mp1-wrapper'),
        deepSearchSubmitButton: $('#mp1-ds-submit-btn'),
        deepSearchForm: $('#mp1-ds-form'),
        ladiesArray: [],
        zodiacCheckedArray: [],
        eyesCheckedArray: [],


        grabLadies() {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: '/wp-content/themes/betheme/_Custom/Actions/getLadiesForGallery.php',
                    type: 'GET',
                    success: (data) => {
                        resolve(JSON.parse(data));
                        mp1.ladiesArray = JSON.parse(data);
                    },
                    error: data => reject(data)
                });
            });
        },

        renderLadyGrid(data) {
            $('#pagination').pagination({
                dataSource: data,
                locator: 'items',
                totalNumber: 1000,
                pageSize: 10,
                ajax: {
                    beforeSend: function () {
                        mp1.galleryWrapper.html('loading...')
                    }
                },
                callback: function (data, pagination) {
                    mp1.galleryWrapper.empty();
                    data.forEach((item, i) => {
                        let lady = `
                      <a href="#">
                          <section class="mp1-lady-container">
                              <div class="mp1-image-container" style="background: url('${item.browser_path}') no-repeat"></div>
                              <div class="mp1-image-hover-container">
                                <span class="mp1-image-hover-container__name">${item.name}</span>
                                <span class="mp1-image-hover-container__divider"></span>
                                <span class="mp1-image-hover-container__age"><b>Возраст:${item.age}</span>
                                <span class="mp1-image-hover-container__height"><b>Рост:</b>${item.height}</span>
                                <span class="mp1-image-hover-container__profession"><b>Профессия:</b>${item.profession}</span>
                                <span class="mp1-image-hover-container__profession"><b>Зодиак:</b>${item.zodiac}</span>
                                <span class="mp1-image-hover-container__profession"><b>Цвет_глаз:</b>${item.eye_color}</span>
                              </div>
                          </section>
                      </a>
                `;
                        mp1.galleryWrapper.prepend(lady);
                    });
                }
            });

        },

        createParamArray(form) {
            let paramPairs = [];
            let a = form.split('&');
            a.forEach((item, i) => {
                let b = item.split('=');
                paramPairs[b[0]] = b[1];
            });

            return paramPairs;
        },

        nonCheckBoxLogic(item, paramArray) {
            return (item['age'] >= paramArray['mp1-ds-age-from'] && item['age'] <= paramArray['mp1-ds-age-to']) &&
                (item['height'] >= paramArray['mp1-ds-height-from'] && item['height'] <= paramArray['mp1-ds-height-to']) &&
                (item['weight'] >= paramArray['mp1-ds-weight-from'] && item['weight'] <= paramArray['mp1-ds-weight-to']);
        },

        deepSearch(ladiesArray, paramArray) {
            let dsArray = [];
            ladiesArray.forEach((item, i) => {
                if (
                    mp1.nonCheckBoxLogic(item, paramArray) &&
                    (mp1.zodiacCheckedArray === undefined || mp1.zodiacCheckedArray.length === 0) &&
                    (mp1.eyesCheckedArray === undefined || mp1.eyesCheckedArray.length === 0)
                ) {
                    dsArray.push(item);
                } else if (
                    mp1.nonCheckBoxLogic(item, paramArray) &&
                    mp1.zodiacCheckedArray.includes(item['zodiac']) &&
                    (mp1.eyesCheckedArray === undefined || mp1.eyesCheckedArray.length === 0)
                ) {
                    dsArray.push(item);
                } else if (
                    mp1.nonCheckBoxLogic(item, paramArray) &&
                    mp1.eyesCheckedArray.includes(item['eye_color']) &&
                    (mp1.zodiacCheckedArray === undefined || mp1.zodiacCheckedArray.length === 0)
                ) {
                    dsArray.push(item);
                } else if (
                    mp1.nonCheckBoxLogic(item, paramArray) &&
                    mp1.zodiacCheckedArray.includes(item['zodiac']) &&
                    mp1.eyesCheckedArray.includes(item['eye_color'])
                ) {
                    dsArray.push(item);
                }

            });

            return mp1.renderLadyGrid(dsArray);
        }

    };

    $("#accordion").accordion({
        header: "h6",
        collapsible: true,
        active: false
    });

    $(document).ready(() => {
        mp1.grabLadies()
            .then((data) => mp1.renderLadyGrid(data));

        $('.zodiac-input').change(function () {
            mp1.zodiacCheckedArray = [];
            $('.zodiac-input:checked').each(function () {
                let z = $(this).attr('id').split('-');
                let zodiac = z[2];
                mp1.zodiacCheckedArray.push(zodiac);
            });
        });

        $('.eyes-input').change(function () {
            mp1.eyesCheckedArray = [];
            $('.eyes-input:checked').each(function () {
                let z = $(this).attr('id').split('-');
                let eye = z[3];
                mp1.eyesCheckedArray.push(eye);
            });
        });

        mp1.deepSearchSubmitButton.on('click', (e) => {
            e.preventDefault();
            let paramArray = mp1.createParamArray(mp1.deepSearchForm.serialize());
            mp1.deepSearch(mp1.ladiesArray, paramArray);
        });
    });
    //TODO loading cloak
})(jQuery);
