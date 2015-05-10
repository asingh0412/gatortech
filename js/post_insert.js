    // Make sure page is fully loaded before we execute script
    $(function() {

      //setTimeout(function() { location.reload() }, 5000);

      $('#post').click(function() {

      // Fetch a handle to the post field and the form
      var post = $('#message');
      var postForm = $('#postForm');

        // Create a new AJAX form post 
        $.post(
          postForm.action,   // Use the action from the HTML form
          postForm.serialize(), // Use the data from the HTML form

          // When the function is complete, run this function
          function(data) {

            // Add the new post to the list of posts 
            $('.post-container').prepend(data);

            // Clear the text field
            $(post).val('');

            //alert("Ajax is working");
          
          });

      });


       // Refresh the page every 10 seconds
       setTimeout(function() { location.reload() }, 10000);
  
  });


