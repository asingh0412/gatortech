$(function() 
{
   $('.post-container').hide().fadeIn(3000);
        $('#post').click(function()
        {                
                $.ajax({
                url: 'feed_post.php',
                type: 'post',
                data: $('#post-form').serialize(),
                async: true,
                success: function() {
                    $('.post-container').prepend(data);

                    $('#message').val('');
                },
         });       
    });
});