$(document).ready(function(){
	jQuery.validator.addMethod("password", function( value, element ) {
		var result = this.optional(element) || value.length >= 6 && /\d/.test(value) && /[a-z]/i.test(value);
		if (!result) {
			element.value = "";
			var validator = this;
			setTimeout(function() {
				validator.blockFocusCleanup = true;
				element.focus();
				validator.blockFocusCleanup = false;
			}, 1);
		}
		return result;
	}, "Your password must be at least 6 characters long and contain at least one number and one character.");

	jQuery.validator.messages.required = "";
	$("#frmRegister").validate({
		invalidHandler: function(e, validator) {			
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? 'You missed 1 field. It has been highlighted below'
					: 'You missed ' + errors + ' fields.  They have been highlighted below';
				$("div.error span").html(message);
				$("div.error").show();
			} else {
				$("div.error").hide();
			}
		},
		onkeyup: false,
		submitHandler: function(form) {
			$("div.error").hide();		
			form.submit();
		},
		rules:{
			regUsername:{
				required:true,
				minlength: 4
			},
			regPassword2:{
				required: true, 
                equalTo:"#regPassword"	
			},
			txtDate:{
				min: 1,  
				max: 31,
				number : true
			},
			txtMonth:{
				number : true,
				min: 1,  
				max: 12
			},
			txtYear:{				
				number : true,
				min :1900,
				max : 2100				
			}
		},
		messages: {
			regUsername: {
				required: " ",		
				minlength: jQuery.format("Enter at least {0} characters"),		
				remote:function() { return  jQuery.format("{0} is already in use",$("#regUsername").val())}
			},
			regPassword2: {
				required: " ",
				equalTo: "Please enter the same password as above"
			},
			txtEmail: {
				required: " ",
				email: "Please enter a valid email address"
				//remote: jQuery.validator.format("{0} is already taken, please enter a different address.")
			},
			txtDate:{
				number:" ",
				min: " ",
				max: " "	
			},
			txtMonth:{
				min: " ",
				number:" ",
				max: " "	
			},
			txtYear:{
				min: " ",
				number:" ",
				max: " "	
			}
		}
	});
});