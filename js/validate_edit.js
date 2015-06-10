$(function() {
    
   function replaceValidationUI( form ) {
    // Suppress the default bubbles
    form.addEventListener( "invalid", function( event ) {
        event.preventDefault();
    }, true );

    // Support Safari, iOS Safari, and the Android browser—each of which do not prevent
    // form submissions by default
    form.addEventListener( "submit", function( event ) {
        if ( !this.checkValidity() ) {
            event.preventDefault();
        }
    });

    var submitButton = form.querySelector( "button:not([type=button]), input[type=submit]" );
    submitButton.addEventListener( "click", function( event ) {
        var invalidFields = form.querySelectorAll( ":invalid" ),
            errorMessages = form.querySelectorAll( ".error-message" ),
            parent;
            
        // The function SetCustomValidity must be used against a native HTML object
        var name = $('#name')[0];
        var email = $('#email')[0];
        var program = $('#program')[0];
        var egd = $('#egd')[0];
        
        var nameVal = $('#name').val();
        var emailVal = $('#email').val();
        var programVal = $('#program').val();
        var egdVal = $('#egd').val();
        
        //var emailFilter = filter_var(email, FILTER_VALIDATE_EMAIL);
            
        // Set custom error messages
        if (!nameVal) {
             name.setCustomValidity("Name cannot be left blank");
        }
        
        if (!emailVal) {
             email.setCustomValidity("Email cannot be left blank");
        }
        // filter module needs to be configured on server  
        /*else if (emailFilter === false) {
            email.setCustomValidity("Please enter a valid email address");
        }
        */
        
        if (!programVal) {
             name.setCustomValidity("Please select a program option");
        }
    
        if (!egdVal) {
             name.setCustomValidity("Please select a graduation date");
        }

        // Remove any existing messages
        for ( var i = 0; i < errorMessages.length; i++ ) {
            errorMessages[ i ].parentNode.removeChild( errorMessages[ i ] );
        }

        
        for ( var i = 0; i < invalidFields.length; i++ ) {
            parent = invalidFields[ i ].parentNode;
            parent.insertAdjacentHTML( "beforeend", "<div class='error-message'>" + 
                invalidFields[ i ].validationMessage +
                "</div>" );
        }

        // If there are errors, give focus to the first invalid field
        if ( invalidFields.length > 0 ) {
            invalidFields[ 0 ].focus();
        }
    });
}

// Replace the validation UI for all forms
var forms = document.querySelectorAll( "form" );
for ( var i = 0; i < forms.length; i++ ) {
    replaceValidationUI( forms[ i ] );
    }
})
