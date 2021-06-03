$(function() {
    $('.rating').barrating({
        theme: 'fontawesome-stars',
        onSelect: function(value, text, event) {
            // Get element id by data-id attribute
            var el = this;
            var el_id = el.$elem.data('id');
        // rating was selected by a user
        if (typeof(event) !== 'undefined') {
            var split_id = el_id.split("_");
            var shop_id = split_id[1]; // post_id
        // AJAX Request
        $.ajax({
            url: $(".rating").data('url'),
            type: 'post',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                rating:value
                },
            dataType: 'json',
            success: function(data){
                Swal.fire(
                'Brawo!',
                'Twój głoś został oddany!',
                'success'
                )
                var average = data['averageRating'];
                var usersRated = data['usersRated'];
                $('#avgrating_'+shop_id).text(average);
                $('#usersRated_'+shop_id).text(usersRated);
            },
            error: function(data){
                Swal.fire(
                    'Błąd!',
                    'Zaloguj się, aby oddać głos!',
                    'error'
                    )
            }
            });
        }
        }
    });
});