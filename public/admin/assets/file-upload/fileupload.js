$(document).ready(function() {

    $(document).on('click', '.variantImg', function(e) {
        e.preventDefault();
        $('.singleChecked').not(this).prop('checked', false);
        var multiple = $('.variantImg').data('multiple');
        $('.singleChecked').prop('checked', false);
        $('#selectAllbutton').addClass('disabled');

        if(multiple === false){
            $(document).on('click', '.fileCheck', function(e) {
                $('.singleChecked').not(this).prop('checked', false);
                $(this).parent().parent().find('input').prop('checked', true);
            });
            $(document).on('change', '.singleChecked', function(e) {
                $('.singleChecked').not(this).prop('checked', false);
                $(this).parent().parent().find('input').prop('checked', true);
            });
        }
    });


    function resetModalCheckbox() {
        $('.singleChecked').prop('checked', false);
    }
    $('.resetButton').on('click', function() {
        resetModalCheckbox();
    });


});

