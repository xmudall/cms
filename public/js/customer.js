$(function() {
    $('.action-delete').on('click', function(e) {
        var id = $(e.delegateTarget).parents('tr').attr('id');
        console.log('delete ' + id);
        ajaxGet('customer/delete/' + id, function(data, textStatus) {
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
        location = 'customer/edit/' + id;
    });
});
