/**
 * @author charlesgallant
 */

var signupClicked = false;

// - - - - - - - - - - - - - - - - - - - - - - -
// Document.ready
// - - - - - - - - - - - - - - - - - - - - - - -
$(document).ready(function(){
	
	$('#signup_form').hide();
	
	$('#class_signup a').click(function(){
		if(!signupClicked){
			signupClicked = true;
			$('#signup_form').fadeIn();
			$('#signup_form input').focus();

			$('#class_signup a').html("Send!");
		}else{
			$('#class_signup').fadeOut('slow', function() {
			    $('#class_signup').html("Awesome! Glad you're interested. Someone will reply to you soon.");
				$('#class_signup').css("color", "#33DDFF")
				$('#class_signup').fadeIn();
			});
		}
		
		
		
		return false;
	});
});



// - - - - - - - - - - - - - - - - - - - - - - -
// Debug
// - - - - - - - - - - - - - - - - - - - - - - -
function log(message) {
	if (typeof console != "undefined") { // safari, firebug
		if (typeof console.debug != "undefined") { // firebug
			console.log(message);
		}
	}
}





