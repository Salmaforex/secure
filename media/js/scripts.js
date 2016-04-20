$(document).ready(function(e) {
	$('#submit_login').click(function(){
		console.log('submit now');
		//$('#online-login').submit();
		document.getElementById("online-login").submit();
	});
    $('#online-login0').formValidation({
        framework: 'bootstrap',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: ' Your Username.'
                    }
                }
            },
			password: {
                validators: {
                    notEmpty: {
                        message: 'Your Password.'
                    }
                }
            },
			captcha: {
                validators: {
                    notEmpty: {
                        message: 'Type Security Code.'
                    }
                }
            },
        }
    });
	$('.drop-nav').find('.toggle').click(function(){
		var th = $(this);
		var target = th.parent().find('ul');
		if(target.css('display') === 'none'){
			target.slideDown();
			th.addClass('glyphicon-chevron-up');
			th.removeClass('glyphicon-chevron-down');
		}else{
			target.slideUp();
			th.removeClass('glyphicon-chevron-up');
			th.addClass('glyphicon-chevron-down');
		}
	});
});