/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/delete-image.js ***!
  \**************************************/
$(function () {
  $('.delete').click(function () {
    var _this = this;

    Swal.fire({
      title: 'Are you sure that you want to remove this image?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, keep it'
    }).then(function (result) {
      var $this = $(_this);

      if (result.value) {
        $.ajax({
          method: "DELETE",
          url: $(_this).data("url"),
          data: {
            "_token": $('meta[name="csrf-token"]').attr('content')
          }
        }).done(function (data) {
          $this.closest(".image-content").fadeOut(500);
        }).fail(function (data) {
          Swal.fire('Oops...', data.responseJSON.message, 'error');
        });
      }
    });
  });
});
/******/ })()
;