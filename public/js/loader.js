$(function() {

    $.ajaxSetup({
        'headers': {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#authByPhoneForm').submit(function (e) {
        let url = e.target.getAttribute('action');
        let formData = $(e.target);

        formData.find('.invalid-phone').hide().html('');

        $.ajax({
            method: 'POST',
            url: url,
            data: formData.serialize(),
            success: function (data) {
                formData.addClass('success');

                formData.find('.invalid-password').show().html('<strong>'+data.message+'</strong>');
            },
            error: function (error) {
                let message = error.responseJSON.message;

                formData.find('.invalid-phone').show().html('<strong>'+message+'</strong>');
            }
        });


        e.preventDefault();
    });
});