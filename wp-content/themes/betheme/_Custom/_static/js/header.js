var h = {
  burgerIcon: $('#hamburger'),
  menu: $('#mobile-menu')
};


var onDocumentReady = () => {
  h.burgerIcon.click(() => h.burgerIcon.toggleClass('active'))
  h.burgerIcon.click(() => h.menu.toggleClass('active'))
}

$(document).ready(onDocumentReady)

