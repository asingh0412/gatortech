$(function() {
   var validator = new Dominar($('#create_form'), {
   feedbackIcons: {
      error: '<i class="fa fa-remove"></i>',
      success: '<i class="fa fa-check"></i>'
   },
    name: {
        rules: 'required|regex:/^[A-Za-z ]+$',
        },
    email: {
        rules: 'required|email',
    },
    password: {
        rules: 'required|regex:^((?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*]){9,}).+$',
    },
    program: {
        rules: 'required|in:Software Development,Networking',
    },
    egd: {
        rules: 'required'
    }
    });
});
