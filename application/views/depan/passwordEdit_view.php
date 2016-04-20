<?php
$name=$userlogin['detail']['firstname']." ".$userlogin['detail']['lastname']; 
?>
	<div class="container">
    	<div class="row">
<?php 
	$load_view=isset($baseFolder)?$baseFolder.'inc/leftmenu_view':'leftmenu_view';
	$this->load->view($load_view);
	
	$rand_url=url_title("{$detail['accountid']}-{$detail['detail']['firstname']}","-");
	$urlAffiliation=base_url("register/{$rand_url}");
?>		
			<div class="main col-md-8"> 
				<h3 class="orange nomargin"><strong>Welcome to the Secure Area of SalmaForex</strong></h3>
                <p>Dear <?=isset($userlogin['detail']['firstname'])?$userlogin['detail']['firstname']:'';?>&nbsp;<?=isset($userlogin['detail']['lastname'])?$userlogin['detail']['lastname']:'';?>,<br/>
				Your are now logged-in the Secure Area. Here you can view all the Information from your accounts. You can also Update Your Profile before deposit and withdrawn and many more. </p>
                <div class="vspace-30"></div>
				<h2>Change Your Password</h2>
				<form   name="frm"  id="frmLiveAccount" method="POST"  role="form">
<?php $detail1=$detail['detail'];  
?>
				<table class='formBasic table-striped' border="0">
			<?=bsInputPass('Password Trading','trading1','');?>
			<?=bsInputPass('Password Trading (input again)','trading2' );?>
			<?=bsInputPass('Password Investor','investor1' );?>
			<?=bsInputPass('Password Investor (input again)','investor2' );?>
				<?php 
		$ar=array(
		'onclick'=>'checkPass()'
		);
			echo	bsButton('Update',0,'',$ar);?>
			</table>
			Suggestion: Combine Number and Word to secure, minimal 5
			<input type='hidden' name='rand' value='<?=dbId('id',22222,3);?>' />
			<input type='hidden' name='expire' value='<?=date("Y-m-d H:i:s",
			strtotime("+1 hour"));?>' />
			</form> 
				
			</div>
		</div>
	</div>
	
<script>
function turnWhite(){
	pass1a=jQuery("#input_trading1");
	pass1b=jQuery("#input_trading2");
	pass2a=jQuery("#input_investor1");
	pass2b=jQuery("#input_investor2");
	
	pass1b.css('background-color','#fff');
	pass1a.css('background-color','#fff');
	pass2b.css('background-color','#fff');
	pass2a.css('background-color','#fff');
}

function checkPass()
{
	pass1a=jQuery("#input_trading1");
	pass1b=jQuery("#input_trading2");
	pass2a=jQuery("#input_investor1");
	pass2b=jQuery("#input_investor2");
	
	pass1b.css('background-color','#fff');
	pass1a.css('background-color','#fff');
	pass2b.css('background-color','#fff');
	pass2a.css('background-color','#fff');
		
	fail=4;
	if(pass1a.val()!="" && pass1a.val().length > 4){
		fail--;
	}
	else{ 
		console.log('check input 1 gagal='+pass1a.val().length);
		pass1a.css('background-color','#ff9494');
		pass1b.css('background-color','#ff9494');
	}
	
	if(pass1a.val()==pass1b.val() ){
		fail--;
	}
	else{ 
		console.log("fail  pass1");
		pass1a.css('background-color','#ff9494');
		pass1b.css('background-color','#ff9494');
	}
	
	if(pass2a.val()!="" && pass2a.val().length>4){
		fail--;
	}
	else{ 
		console.log('check input 2 gagal='+pass2a.val()+"="+pass2a.val().length);
		pass2b.css('background-color','#ff9494');
		pass2a.css('background-color','#ff9494');
	}
	
	if(pass2a.val()==pass2b.val() ){
		fail--;
	}
	else{
		console.log("fail  pass2");
		 
		pass2b.css('background-color','#ff9494');
		pass2a.css('background-color','#ff9494');
	}
	
	if(fail==0){
		console.log("ok");
		jQuery(".modal-title").html("Success");
			jQuery(".modal-body").html("Please Login Again with new Password"); 
		jQuery("#myModal").modal({show: true}).css("height","150%");
		setTimeout( function(){
			jQuery("#frmLiveAccount").submit();
		}, 2500);
		
	}
	else{
		jQuery(".modal-title").html("warning");
			jQuery(".modal-body").html("Check Again for passsword"); 
		jQuery("#myModal").modal({show: true}).css("height","150%");
		setTimeout(turnWhite(), 2000);
		console.log(pass1a.val());
		console.log(pass1b.val());
		console.log(pass2a.val());
		console.log(pass2b.val());
	}
}

function comparePass(){
	fail=2;	
	pass1a=jQuery("#input_trading1");
	pass1b=jQuery("#input_trading2");
	pass2a=jQuery("#input_investor1");
	pass2b=jQuery("#input_investor2");
	pass1b.css('background-color','#fff');
	pass1a.css('background-color','#fff');
	pass2b.css('background-color','#fff');
	pass2a.css('background-color','#fff');
	if(pass1a.val()==pass1b.val() ){
		fail--;
	}
	else{ 
		if(pass1a.val()!="" && pass1b.val().length > 4){
	 		console.log("fail  pass1");
			pass1a.css('background-color','#ff9494');
			pass1b.css('background-color','#ff9494');
		}else{}
	}
	if(pass2a.val()==pass2b.val() ){
		fail--;
	}
	else{
		if(pass2a.val()!="" && pass2b.val().length > 4){
			console.log("fail  pass2");
		 	pass2b.css('background-color','#ff9494');
			pass2a.css('background-color','#ff9494');
		}else{}
	}
	console.log(pass1a.val());
	console.log(pass1b.val());
	console.log(pass2a.val());
	console.log(pass2b.val());
}

jQuery("#input_trading1,#input_trading2,#input_investor1,#input_investor2").keyup(
	function(){
		comparePass();
	}
);
</script>