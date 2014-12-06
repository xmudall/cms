$(function() {
    $('.action-delete').on('click', function(e) {
        var id = $(e.delegateTarget).parents('tr').attr('id');
        console.log('delete ' + id);
        ajaxGet('order/delete/' + id, function(data, textStatus) {
            if ( data !== null && data.errcode === undefined ) {
                $(e.delegateTarget).parents('tr').remove();
                showSuccess('Success!');
            } else {
                showError('Failed! ' + data.errmsg);
            }
        });
    });
    $('.action-edit').on('click', function(e) {
        var id = $(e.delegateTarget).parents('tr').attr('id');
        console.log('edit ' + id);
        location = 'order/edit/' + id;
    });
});
