/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/delete-comment.js ***!
  \****************************************/
$(document).ready(function () {
  $('#list').on('click', '.deletecomment', function () {
    var _this = this;

    Swal.fire({
      title: 'Czy na pewno chcesz usunąć ten komentarz?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Tak, usuń to!',
      cancelButtonText: 'Nie, zachowaj.'
    }).then(function (result) {
      if (result.value) {
        var $this = $(_this);
        $.ajax({
          url: $this.data('url'),
          type: 'delete',
          dataType: "json",
          data: {
            _token: $('meta[name="csrf-token"]').attr('content')
          }
        }).done(function (data) {
          $this.closest("li").remove();
        }).fail(function (data) {
          Swal.fire('Oops...', data.responseJSON.message, 'error');
        });
      }
    });
  });
});
/******/ })()
;