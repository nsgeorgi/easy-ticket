function SubmitIfValid()
{
    if(!$("#form1").valid()) return false;  
    return true;
}

$( document ).ready(function() {
  


$('#form1').validate({
  debug: false,
    rules:{
    username:
            {

            required:true,
          //  email:true
            },
    password:
            {
            required:true,
            minlength:3,
            maxlength:10
            },
    password_again:{
            equalTo:"#password"

            }
          },
		 
          highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.form-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
		 
       
	
	
})
});



jQuery.extend(jQuery.validator.messages, {
    required: "Aυτό το πεδίο είναι υποχρεωτικό.",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Παρακαλώ μη πληκτρολογήστε παραπάνω από {0} χαρακτήρες."),
    minlength: jQuery.validator.format("Παρακαλώ πληκτρολογήστε τουλάχιστον {0} χαρακτήρες."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});