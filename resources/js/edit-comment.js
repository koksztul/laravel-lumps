$(document).ready(function(){
    $('#list').on('click', '.editcomment', function() {
        let $this = $(this);
        let body = $this.closest('li').find('.commentbody').text();
        $this.closest('li').find('.commentbody').replaceWith('<textarea class="form-control" rows="2" id="commentbody" name="body">'+ body +'</textarea>');
        $this.text('zapisz');
        $this.addClass('updatecomment');
        $this.removeClass('editcomment');
    });
    $('#list').on('click', '.updatecomment', function() {
        let $this = $(this);
        let body = $this.closest('li').find('textarea').val();
        $.ajax({
            url: $this.data('url'),
            type: 'put',
            dataType: "json",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                body: body,
            },
            success: function( data ) {
                $this.closest('li').find('textarea').replaceWith('<p class="commentbody">' + data.body + '</p>');
                $this.text('edytuj');
                $this.addClass('editcomment');
                $this.removeClass('updatecomment');
            },
            error: function(data){
                Swal.fire(
                    'Błąd!',
                    data.responseText,
                    'error'
                    )
        }
        });
    });
});