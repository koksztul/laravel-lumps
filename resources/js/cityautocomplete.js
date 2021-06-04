var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
  $( "#city_search" ).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: $("#city_search").data('url'),
        type: 'post',
        dataType: "json",
        data: {
           _token: CSRF_TOKEN,
           search: request.term,
           voivodshipName: $( "#voivodship option:selected" ).val()
        },
        success: function( data ) {
           response( data );
        }
      });
    },
    select: function (event, ui) {
       // Set selection
       $('#city_search').val(ui.item.label); // display the selected text
       return false;
    }
  });
});