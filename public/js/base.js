function ajaxGet(url, callback) {
    $.ajax({
        url: url,
        type: 'GET',
        success: callback,
        timeout: 2000,
    });
}
function ajaxPost(url, data, callback) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: callback,
        timeout: 2000,
    });
}
function showError(msg) {
    $('.alert-danger .content').text(msg);
    $('.alert-danger').css('display', 'block');
    setTimeout(function() {
        $('.alert-danger').css('display', 'none');
    }, 5000);
}
function showSuccess(msg) {
    $('.alert-success .content').text(msg);
    $('.alert-success').css('display', 'block');
    setTimeout(function() {
        $('.alert-success').css('display', 'none');
    }, 5000);
}
