$(document).ready(function()
{
    $('.delete-sales').click(function(e)
    {
        var id = $(this).data("id");
        var token = $('input[name="_token"]').val();
        
        if (!confirm('Are you sure you want to delete?')) return;
        e.preventDefault();

        $.ajax({
            url: '/sales/' + id,
            type: 'DELETE',
            data: {
                id: id,
                _method: 'DELETE',
                _token: token
            },
            success: function(){
                location.reload();
            },
            error: function(){
                alert('error');
            }
        });

    });
});