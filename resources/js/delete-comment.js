$(document).ready(function(){
    $('#list').on('click', '.deletecomment', function() {
        Swal.fire({
            title: 'Czy na pewno chcesz usunąć ten komentarz?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak, usuń to!',
            cancelButtonText: 'Nie, zachowaj.'
        }).then((result) => {
            if (result.value) {
                let $this = $(this);
                $.ajax({
                url: $this.data('url'),
                type: 'delete',
                dataType: "json",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    }
                })
                .done(function( data ) {
                    $this.closest("li").remove();
                })
                .fail(function( data ) {
                    Swal.fire('Oops...', data.responseJSON.message, 'error');
                });
            }
        });
    });
});