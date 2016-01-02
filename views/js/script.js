$(document).ready(function() {
    $('body')
        .on('mouseover', '#raitChoose', function(e){
            $(this).parent().append('<span class="hint">'+$(this).attr("hint")+'</span>');
        })
        .on('mouseout', '#raitChoose', function(e){
            $('.hint').remove();
            $('.response').remove();
        })
        .on('click', '#raitChoose', function(e){
            var userId = $('#userId').val();
            var productId = $(this).parent().parent().children('div').attr('id');
            var rait = $(this).attr('value');
            var element = $(this);
            $.ajax({
                method: "POST",
                url: "/config/routing.php?file=ajaxController&action=raitProduct",
                data: {
                    userId: userId,
                    productId: productId,
                    rait: rait
                },
                success:function(response) {
                    $('.hint').remove();
                    if (jQuery.parseJSON(response) == "success") {
                        $(element).parent().append('<span class="response success">Saved</span>');
                    } else {
                        $(element).parent().append('<span class="response fail">Error</span>');
                    }
                    if (rait == 0) {
                        $('input[name="'+$(element).attr("name")+'"]').prop('checked', false);
                    }
                }
            })
        })
});