(function ($) {
    let mp1 = {
        galleryWrapper: $('.mp1-wrapper'),
        ladiesArray: [],

        grabLadies(getParams) {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: '/wp-content/themes/betheme/_Custom/Actions/getLadiesForGallery.php',
                    type: 'GET',
                    data: getParams,
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
                              </div>
                          </section>
                      </a>
                `;
                        mp1.galleryWrapper.prepend(lady);
                    });
                }
            });

        }
    };

    $("#accordion").accordion({
        header: "h6",
        collapsible: true,
        active: false
    });

    $(document).ready(() => {
        let getParams = null;
        mp1.grabLadies(getParams)
            .then((data) => mp1.renderLadyGrid(data));

        setTimeout(function () {
            console.log(mp1.ladiesArray);
        }, 2000);
    });

    //TODO loading cloak

})(jQuery);
