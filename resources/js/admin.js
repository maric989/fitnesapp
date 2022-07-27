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
        let maxValue = $(this).data('maxValue');
        let availableValues = $(this).data('availableValues');
        $('#' + fieldId).addClass('hide');

        $(this).children('.form-duration').slider({
            min: 1,
            max: maxValue,
            value: currentValue,
            create: function() {
                $('#' + handleId).html('<span>' + $( this ).slider( "value" ) + ' days</span>');
                if (availableValues) {
                    let indexValue = availableValues.findIndex(x => x === $( this ).slider( "value" ));
                    if (indexValue > -1) {
                        $('#' + handleId).removeClass('error');
                    } else {
                        $('#' + handleId).addClass('error');
                    }
                } else {
                    $('#' + handleId).removeClass('error');
                }
            },
            slide: function( event, ui ) {
                $('#' + handleId).html('<span>' + ui.value + ' days</span>');
                $('#' + fieldId).val(ui.value);
                if (availableValues) {
                    let indexValue = availableValues.findIndex(x => x === ui.value);
                    if (indexValue > -1) {
                        $('#' + handleId).removeClass('error');
                    } else {
                        $('#' + handleId).addClass('error');
                    }
                } else {
                    $('#' + handleId).removeClass('error');
                }
            }
        });
    });
});

function changeProgramSelection(selectedProgram)
{
    $('#show-allocation-program').addClass('hide');
    $('.show-allocation-one-program').addClass('hide');
    $('.show-allocation-one-program_day').removeAttr('name');

    if (selectedProgram) {
        $('#show-allocation-program').removeClass('hide');
        $('#show-allocation-one-program_' + selectedProgram).removeClass('hide');
        $('#day_' + selectedProgram).attr('name', 'day');
    }
}
