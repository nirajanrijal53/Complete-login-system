
$('#re_password').keyup(function(){
			  	var pass = $('#password').val();
			  	var re_pass = $('#re_password').val();
			  	if(pass != re_pass){
			  		$('#err_pass').html('Password does not match.').removeClass('hidden').addClass('alert-danger');
			  		$('#submit').attr('disabled', 'disabled');
			  	} else {
			  		$('#err_pass').html('').removeClass('alert-danger').addClass('hidden');
			  		$('#submit').removeAttr('disabled', 'disabled');
			  	}
			  });