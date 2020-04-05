(function ($) {
  let mp1 = {
    galleryWrapper: $('.mp1-wrapper'),
    deepSearchSubmitButton: $('#mp1-ds-submit-btn'),
    deepSearchForm: $('#mp1-ds-form'),
    mainSearchInput: $('#mp1-main-search-input'),
    mainSearchBtn: $('#mp1-main-search-btn'),
    ladiesArray: [],
    zodiacCheckedArray: [],
    eyesCheckedArray: [],
    hairCheckedArray: [],
    mainSearchArray: [],
    deepSearchArray: [],

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
          data = data.sort().reverse();
          data.forEach((item, i) => {
            let lady = `
                        <a href="person-page/?page=lady&id=${item.id}" target="_blank">
                            <section class="mp1-lady-container">
                                <div class="mp1-image-container" style="background: url('${item.browser_path}') no-repeat">
</div>
                          
                                <div class="mp1-image-hover-container">
                                  <span class="mp1-image-hover-container__name">${item.name}</span>
                                  <span class="mp1-image-hover-container__divider"></span>
                                  <span class="mp1-image-hover-container__age"><b>id: </b>${item.id}</span>
                                  <span class="mp1-image-hover-container__age"><b>Edad: </b>${item.age}</span>
                                  <span class="mp1-image-hover-container__height"><b>Altura: </b>${item.height}</span>
                                  <span class="mp1-image-hover-container__profession"><b>Profesión: </b>${item.profession}</span>
                                </div>
                            </section>
                         </a>`;
            mp1.galleryWrapper.prepend(lady);
          });
        }
      });

    },

    getActiveCheckBoxes(type, numberInArray, array) {
      $(`.${type}-input:checked`).each(function () {
        let z = $(this).attr('id').split('-');
        let item = z[numberInArray];
        array.push(item);
        console.log(array);
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
      mp1.deepSearchArray = [];
      ladiesArray.forEach((item, i) => {
        if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          (mp1.zodiacCheckedArray === undefined || mp1.zodiacCheckedArray.length === 0) &&
          (mp1.eyesCheckedArray === undefined || mp1.eyesCheckedArray.length === 0) &&
          (mp1.hairCheckedArray === undefined || mp1.hairCheckedArray.length === 0)
        ) {
          mp1.deepSearchArray.push(item);
        } else if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          mp1.zodiacCheckedArray.includes(item['zodiac']) &&
          (mp1.eyesCheckedArray === undefined || mp1.eyesCheckedArray.length === 0) &&
          (mp1.hairCheckedArray === undefined || mp1.hairCheckedArray.length === 0)
        ) {
          mp1.deepSearchArray.push(item);
        } else if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          mp1.eyesCheckedArray.includes(item['eye_color']) &&
          (mp1.zodiacCheckedArray === undefined || mp1.zodiacCheckedArray.length === 0) &&
          (mp1.hairCheckedArray === undefined || mp1.hairCheckedArray.length === 0)
        ) {
          mp1.deepSearchArray.push(item);
        } else if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          mp1.hairCheckedArray.includes(item['hair_color']) &&
          (mp1.eyesCheckedArray === undefined || mp1.eyesCheckedArray.length === 0) &&
          (mp1.zodiacCheckedArray === undefined || mp1.zodiacCheckedArray.length === 0)
        ) {
          mp1.deepSearchArray.push(item);
        } else if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          mp1.hairCheckedArray.includes(item['hair_color']) &&
          mp1.eyesCheckedArray.includes(item['eye_color']) &&
          (mp1.zodiacCheckedArray === undefined || mp1.zodiacCheckedArray.length === 0)
        ) {
          mp1.deepSearchArray.push(item);
        } else if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          mp1.hairCheckedArray.includes(item['hair_color']) &&
          mp1.zodiacCheckedArray.includes(item['zodiac']) &&
          (mp1.eyesCheckedArray === undefined || mp1.eyesCheckedArray.length === 0)
        ) {
          mp1.deepSearchArray.push(item);
        } else if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          mp1.eyesCheckedArray.includes(item['eye_color']) &&
          mp1.zodiacCheckedArray.includes(item['zodiac']) &&
          (mp1.hairCheckedArray === undefined || mp1.hairCheckedArray.length === 0)
        ) {
          mp1.deepSearchArray.push(item);
        } else if (
          mp1.nonCheckBoxLogic(item, paramArray) &&
          mp1.zodiacCheckedArray.includes(item['zodiac']) &&
          mp1.eyesCheckedArray.includes(item['eye_color']) &&
          mp1.hairCheckedArray.includes(item['hair_color'])
        ) {
          mp1.deepSearchArray.push(item);
        }

      });
      console.log(mp1.deepSearchArray);
      return mp1.renderLadyGrid(mp1.deepSearchArray);
    },


    mainSearch(ladiesArray) {
      mp1.mainSearchArray = [];
      ladiesArray.forEach((item, i) => {
        let name = item.name.toLowerCase();
        let id = item.id;
        let searchVal = mp1.mainSearchInput.val().toLowerCase().trim();
        if (
          name.includes(searchVal) ||
          id.includes(searchVal)
        ) {
          mp1.mainSearchArray.push(item)
        } else if (
          searchVal.includes(name) ||
          searchVal.includes(id)
        ) {
          mp1.mainSearchArray.push(item)
        }
      });
      return mp1.renderLadyGrid(mp1.mainSearchArray);
    }

  };


  $(document).ready(() => {
    mp1.grabLadies()
      .then((data) => mp1.renderLadyGrid(data));

    $('.zodiac-input').change(function () {
      mp1.zodiacCheckedArray = [];
      mp1.getActiveCheckBoxes('zodiac', 2, mp1.zodiacCheckedArray);
    });

    $('.eyes-input').change(function () {
      mp1.eyesCheckedArray = [];
      mp1.getActiveCheckBoxes('eyes', 3, mp1.eyesCheckedArray);
    });

    $('.hair-input').change(function () {
      mp1.hairCheckedArray = [];
      mp1.getActiveCheckBoxes('hair', 3, mp1.hairCheckedArray);
    });

    mp1.deepSearchSubmitButton.on('click', (e) => {
      e.preventDefault();
      let paramArray = mp1.createParamArray(mp1.deepSearchForm.serialize());
      mp1.deepSearch(mp1.ladiesArray, paramArray);
    });

    mp1.mainSearchBtn.on('click', () => {
      console.log(mp1.ladiesArray);
      mp1.mainSearch(mp1.ladiesArray);
    });


    $('#mp1-ds-form').hide();
    $("#accordion").click(function (e) {
      if ($(this).hasClass('active')) {
        $('#mp1-ds-form').slideUp(300);
        $(this).removeClass('active');
      } else {
        $('#mp1-ds-form').slideDown(300);
        $(this).addClass('active');
      }

    });

    let video = document.getElementById("mp1-bg-video");
    let clicked = false;
    video.volume = 0.3;
    video.pause();

    $('.mp1-video-block').click(() => {
      video.muted = !video.muted;
      video.play();
      clicked = true;
    });

    $(document).on('scroll', function () {
      if (!clicked) {
        if ($(this).scrollTop() >= $('.mp1-lower-section').position().top - 200 && $(this).scrollTop() <= $('.mp1-b3-wrap').position().top - 200) {
          video.play();
          video.muted = false;
        } else {
          video.pause();
          video.muted = true;
        }
      }
    });
  });
})(jQuery);
