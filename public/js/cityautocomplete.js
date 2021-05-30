/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/cityautocomplete.js ***!
  \******************************************/
// CSRF Token
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
  $("#city_search").autocomplete({
    source: function source(request, response) {
      // Fetch data
      $.ajax({
        url: "{{route('cities.getCites')}}",
        type: 'post',
        dataType: "json",
        data: {
          _token: CSRF_TOKEN,
          search: request.term
        },
        success: function success(data) {
          response(data);
        }
      });
    },
    select: function select(event, ui) {
      // Set selection
      $('#city_search').val(ui.item.label); // display the selected text

      $('#cityid').val(ui.item.value); // save selected id to input

      return false;
    }
  });
});
/******/ })()
;