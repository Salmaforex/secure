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
				
				<h2>Detail</h2>
				<form   name="frm"  id="frmLiveAccount" method="POST"   role="form">
<?php 
	$detail1=$detail['detail'];
	if(isset($warning)&&$warning!==0){
		?><b>SILAKAN LENGKAPI SEMUA DETAIL YANG TERSEDIA</b>
<?php 
	}
	$allow=false;
	if(isset($detail1['firstname'])&&$detail1['firstname']!=''){
		$allow=1;
	}
?>
			<table class='table-striped table' border="0">
			<?=bsInput( lang('forex_firstname'),'firstname',isset($detail1['firstname'])?$detail1['firstname']:'', lang('forex_inputsuggestion'),$allow );?>
			<?=bsInput( lang('forex_lastname'),'lastname',isset($detail1['lastname'])?$detail1['lastname']:'', 
			lang('forex_inputsuggestion'),$allow   );?> 
			<?=bsInput( lang('forex_phone'),'phone',$detail1['phone'], lang('forex_inputsuggestion2')  );?>
			
			<?=bsInput( lang('forex_bank'),'bank',isset($detail1['bank'])?$detail1['bank']:'', lang('forex_inputsuggestion2')  );?>
			<?=bsInput( lang('forex_bank_norek'),'bank_norek',isset($detail1['bank_norek'])?$detail1['bank_norek']:'', lang('forex_inputsuggestion2')  );?>
			
				<?=bsInput( lang('forex_address'),'address',$detail1['address'], lang('forex_inputsuggestion2')  );?>
				<?=bsInput( lang('forex_state'),'state',$detail1['state'], lang('forex_inputsuggestion2')  );?>
				 
				<?=bsInput( lang('forex_city'),'city',$detail1['city'], lang('forex_inputsuggestion2')  );?>
				<?=bsInput( lang('forex_zipcode'),'zipcode', $detail1['zipcode'], lang('forex_inputsuggestion') );?>
				<?=bsInput( lang('forex_country'),'citizen', isset($detail1['citizen'])?$detail1['citizen']:'Indonesia', lang('forex_inputsuggestion'),1  );?>
				<?=bsButton('Update');?>
			</table>
			<input type='hidden' name='rand' value='<?=dbId('id',22222,3);?>' />
			</form> 
				
			</div>
		</div>
	</div>