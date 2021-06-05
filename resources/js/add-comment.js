$(document).ready(function(){
    $(document).on('click', '.storecomment', function() {
        let $this = $(this);
        $.ajax({
            url: $(".storecomment").data('url'),
            type: 'post',
            dataType: "json",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                body: $('#commentbody').val()
            },
            success: function( data ) {
                let urlDelete = $this.closest('form').attr('data-urlDel') + "/" + data.id;
                let urlEdit = $this.closest('form').attr('data-urlEdt') + "/" + data.id;
                let html = '<li><span>' + data.user + '</span><p class="commentbody">' + data.body + '</p><button class="btn btn-danger deletecomment" data-url="' + urlDelete + '">usuń</button><button class="btn btn-primary editcomment" data-url="' + urlEdit + '">edytuj</button></li>';
                $("#list").append(html);
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