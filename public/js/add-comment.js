/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/add-comment.js ***!
  \*************************************/
$(document).ready(function () {
  $(document).on('click', '.storecomment', function () {
    var $this = $(this);
    $.ajax({
      url: $(".storecomment").data('url'),
      type: 'post',
      dataType: "json",
      data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        body: $('#commentbody').val()
      },
      success: function success(data) {
        var urlDelete = $this.closest('form').attr('data-urlDel') + "/" + data.id;
        var urlEdit = $this.closest('form').attr('data-urlEdt') + "/" + data.id;
        var html = '<li><span>' + data.user + '</span><p class="commentbody">' + data.body + '</p><button class="btn btn-danger deletecomment" data-url="' + urlDelete + '">usuń</button><button class="btn btn-primary editcomment" data-url="' + urlEdit + '">edytuj</button></li>';
        $("#list").append(html);
      },
      error: function error(data) {
        Swal.fire('Błąd!', data.responseText, 'error');
      }
    });
  });
});
/******/ })()
;