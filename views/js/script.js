$(document).ready(function() {
    $.each($('.savedRate'), function(index, value){
        $(this).parent().children('input[type="radio"][value="'+$(this).val()+'"]').prop('checked', true);
    });

    $('body')
        .on('mouseover', '#rateChoose', function(e){
            $(this).parent().append('<span class="hint">'+$(this).attr("hint")+'</span>');
        })
        .on('mouseout', '#rateChoose', function(e){
            $('.hint').remove();
            $('.response').remove();
        })
        .on('click', '#rateChoose', function(e){
            var userId = $('#userId').val();
            var productId = $(this).parent().parent().children('div').attr('id');
            var rate = $(this).attr('value');
            var element = $(this);
            $.ajax({
                method: "POST",
                url: "/config/routing.php?file=ajaxController&action=rateProduct",
                data: {
                    userId: userId,
                    productId: productId,
                    rate: rate
                },
                success:function(response) {
                    $('.hint').remove();
                    if (jQuery.parseJSON(response) == "success") {
                        $(element).parent().append('<span class="response success">Saved</span>');
                    } else {
                        $(element).parent().append('<span class="response fail">Error</span>');
                    }
                    if (rate == 0) {
                        $('input[name="'+$(element).attr("name")+'"]').prop('checked', false);
                    }
                }
            });
        })
        .on('click', '#saveComment', function(e){
            var userId = $('#userId').val();
            var productId = $(this).parent().children('div').attr('id');
            var comment = $(this).parent().children('textarea').val();
            var element = $(this);
            $.ajax({
                method: "POST",
                url: "/config/routing.php?file=ajaxController&action=commentProduct",
                data: {
                    userId: userId,
                    productId: productId,
                    comment: comment
                },
                success:function(response) {
                    if (jQuery.parseJSON(response) == "success") {
                        $(element).text('Saved');
                        $(element).removeClass('btn-primary');
                        $(element).removeClass('btn-danger');
                        $(element).addClass('btn-success');
                    } else {
                        $(element).text('Error');
                        $(element).removeClass('btn-primary');
                        $(element).removeClass('btn-success');
                        $(element).addClass('btn-danger');
                    }
                }
            });
        })
        .on('keypress', '#writeComment', function(e){
            $(this).parent().children('#saveComment').text('Save');
            $(this).parent().children('#saveComment').removeClass('btn-success');
            $(this).parent().children('#saveComment').removeClass('btn-danger');
            $(this).parent().children('#saveComment').addClass('btn-primary');
        })
    ;
});