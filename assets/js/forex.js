function clearModal(){
	jQuery(".modal-title, .modal-body").empty();
}

jQuery("#input_orderDeposit").keyup(function(){
	orderDeposit();
});
jQuery("#input_orderDeposit").blur(function(){
	orderDeposit();
});

function orderDeposit(){
	target0=jQuery("#input_orderDeposit");
	dolar=0;
	jQuery.post(urlDeposit,function(dolar){
		target=jQuery("#input_order1");
		target.val( target0.val() * dolar);
	});
}

/* FOREX */
function createLiveUser(){
	var url=siteUrl+"forex/data";
	var formData=jQuery("#frmLiveAccount").serializeArray();
	
	params={type:"request",data:formData}
	stat=checkInput();
    clearModal();
	if(stat==0){
		//alert('please check your input');
		jQuery("#myModal").modal({show: true}).css("height","150%");
		jQuery(".modal-title").html("WARNING");
		jQuery(".modal-body").html("please check your input");
		return false;
	}
	
	respon=sendAjax(url,params);
	respon.success(function(result,status) {
		if(result.status==true){ 
			jQuery(".modal-title").html(result.data.title);
			jQuery(".modal-body").html(result.data.html);
		}else{
			jQuery(".modal-title").html("WARNING");
			jQuery(".modal-body").html(result.message);
			
		}
		
		jQuery("#myModal").modal({show: true}).css("height","150%");	
		
		console.log("success");	console.log(result);			
	   });
	   respon.error(function(xhr,status,msg){			
			console.log("Error");
			console.log(status);
			console.log(msg);
			console.log(xhr);
			
		});
}

function checkInput(){
	stat=1
	//stat=checkMoreThan(jQuery('#input_name'),2);
	if(stat==1)stat=checkMoreThan(jQuery('#input_address'),2);
	if(stat==1)stat=checkMoreThan(jQuery('#input_state'),2);
	if(stat==1)stat=checkMoreThan(jQuery('#input_city'),2);
	if(stat==1)stat=checkMoreThan(jQuery('#input_zipcode'),2);
	//if(stat==1)stat=checkMoreThan(jQuery('#input_agent'),2);
	if(stat==1){
		stat=checkEmail(jQuery('#input_email'),2);
		if(stat==false){
			jQuery('#input_email').css('border-color','#ff2323') ;
			jQuery('#input_email').css('border-width','3px') ;
		}
	}
	if(stat==1||stat==true){		
		jQuery('#input_email').css('border-color','#e1e1e1') ;
		jQuery('#input_email').css('border-width','1px') ;
		stat=checkMoreThan(jQuery('#input_phone'),2);
	}else{ 
		console.log('error email :');console.log(stat);
		
	}
	return stat;
}
/*
function checkEmail(target){
	return true;
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(target.val());
	
}
*/
function checkMoreThan(target, length){
	console.log(target);
	if(target.val().length<=length){
		console.log('error :'+target.attr('name'));
		console.log('error :'+target.val().length);
		target.css('border-color','#ff2323') ;
		target.css('border-width','3px') ;
		return 0;
	}
	target.css('border-color','#E1E1E1') ;
		target.css('border-width','1px') ;
	return 1;
}

jQuery(function() {
    jQuery( ".datepicker,#input_dob" ).datepicker({
	dateFormat:'yy-mm-dd',
	showAnim: "fold"
	});
	jQuery("#myModal").click(function(){
		jQuery("#myModal").hide();
	});
 
  });
  
 

function sendAjax(url,params){
	var request = jQuery.ajax({
          url: url,
          type: "POST",
          data: params,
          dataType: "json", 
		  cache:false,
		  timeout:20000, 
    });
	
	return request;
}

jQuery("#myModal").modal({show: false});	
//jQuery( ".datepicker, #input_dob" ).datepicker({ dateFormat:'yy-mm-dd'});