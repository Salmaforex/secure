var url=siteUrl+"member/data";
function login(){
	var formData=jQuery("#frmLiveAccount").serializeArray();	
	params={type:"login",data:formData}
	console.log(params);
	clearModal();
	
	respon=sendAjax(url,params);
	respon.success(function(result,status) {
		if(result.status==true){ 
			jQuery(".modal-title").html(result.data.title);
			jQuery(".modal-body").html(result.data.message);
			//alert( result.data.message );
			window.location.href =siteUrl+"member/detail";
		}else{
			jQuery(".modal-title").html("WARNING");
			jQuery(".modal-body").html(result.message);
			jQuery("#myModal").modal({show: true}).css("height","150%");
		}
		
		//jQuery("#myModal").modal({show: true}).css("height","150%");	
		
		console.log("success");	
		console.log(result);	 
			
	   });
	   respon.error(function(xhr,status,msg){			
			console.log("Error");
			console.log(status);
			console.log(msg);
			console.log(xhr);
			
		});
		
}