$('document').ready(function () {
    $('.upload-file-container').click(function (e) {
        if (e.target.className === 'upload-file-content' || e.target.className === 'upload-file-container flex v-align-center h-align-center pointer') {
            $(this).children('input').trigger('click');
        }
    });

    $('.upload-file-container .input-file').change(function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            var self = this;
            reader.onload = function (e) {
                console.log(e);
                $(self).parent('.upload-file-container').css('background-image', 'url(' + e.target.result + ')');
            }

            reader.readAsDataURL(this.files[0]);
        }
    });

    $('.form-duration-container').each(function () {
        let currentValue = $(this).data('currentValue');
        let fieldId = $(this).data('fieldId');
        let handleId = $(this).data('handleId');
        $('#' + fieldId).addClass('hide');

        $(this).children('.form-duration').slider({
            min: 1,
            max: 90,
            vale: currentValue,
            create: function() {
                $('#' + handleId).html('<span>' + $( this ).slider( "value" ) + ' days</span>');
            },
            slide: function( event, ui ) {
                $('#' + handleId).html('<span>' + ui.value + ' days</span>');
                $('#' + fieldId).val(ui.value);
            }
        });
    });

});
