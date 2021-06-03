$(function() {
    $('.delete').click(function() {
        Swal.fire({
            title: 'Are you sure that you want to remove this image?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            var $this = $(this);
            if (result.value) {
                $.ajax({
                    method: "DELETE",
                    url: $(this).data("url"),
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        }
                })
                .done(function( data ) {
                    $this.closest(".image-content").fadeOut(500);
                })
                .fail(function( data ) {
                    Swal.fire('Oops...', data.responseJSON.message, 'error');
                });
            }
        })
    });         
});   