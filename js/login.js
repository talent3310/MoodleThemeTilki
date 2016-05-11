jQuery(document).ready(function() {
	var varusername = $("#logininfo").val();
	var varpassword = $("#logininfo").attr('name');
	var gotohome = $("#gotohome").val();
	var sitename = $("#sitename").val();
	var placeholderusername = {
	    'username' : varusername
	};
	var placeholderspassword = {
	    'password' : varpassword
	};
	$('input[type=text]').each(function(i,el) {
		if (!el.value || el.value == '') {
	        el.placeholder = placeholderusername[el.id];
	    }   
	});
	$('input[type=password]').each(function(i,el) {
		if (!el.value || el.value == '') {
	        el.placeholder = placeholderspassword[el.id];
	    }   
	});
	$('.signupform').find('input[type=submit]').addClass('signup');
	$('.loginbox').removeClass('twocolumns').addClass('onecolumns');
	$('.loginpanel').find('h2').prepend('<a href="'+gotohome+'" class = "click">'+sitename+'</a>');
	$('body').addClass('login-pagebg');
});

