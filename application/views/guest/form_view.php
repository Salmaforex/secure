<?php 
if(!isset($defInput)){ 
	$defInput="";
}
if(!isset($showForm)){ 
	$showForm=1;
}
$showAgent=true;
if(!isset($showAgent)){ 
	$showAgent=true;
}

//if(isset($register)){ print_r($register); }
?><form novalidate="novalidate" name="frm" id0="frm" id="frmLiveAccount" method="POST"  class="form-horizontal" role="form" style="" action="<?=base_url('guest/register');?>" >
<?php  
		if(isset($register['message'])){ ?>
							<div class="alert alert-block alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"></button>
								<h4 class="alert-heading">Warning!</h4>
								<p><?=$register['message'];?></p>								
							</div>
<?php	}  
?>
		<input type='hidden' name='type' value='request' />
		<div class="frame-form-basic"> 
			<?=bsInput2( lang('forex_firstname'),'firstname', isset($register['firstname'])?$register['firstname']:'', lang('forex_inputsuggestion') );?> 
			<?=bsInput2( lang('forex_lastname'),'lastname', isset($register['lastname'])?$register['lastname']:'', lang('forex_inputsuggestion') );?> 
 
			<?=bsInput2( lang('forex_address'), 'address',isset($register['address'])?$register['address']:$defInput, lang('forex_inputsuggestion2'),false, $showForm );?>
			<?=bsInput2( lang('forex_state'),'state', isset($register['state'])?$register['state']:$defInput, lang('forex_inputsuggestion2'),false, $showForm );?>
			 
			<?=bsInput2( lang('forex_city'),'city', isset($register['city'])?$register['city']:$defInput, lang('forex_inputsuggestion2') ,false, $showForm);?>
			<?=bsInput2( lang('forex_zipcode'),'zipcode', isset($register['zipcode'])?$register['zipcode']:$defInput, lang('forex_inputsuggestion'),false, $showForm );?>
			<div class='form-group'
<?php 	if($showForm==false){?> style='display:none' <?php } ?>
			>
				 <label for="input_date" class="col-sm-2 control-label"><?=lang('forex_country');?></label>  
				<div class="col-sm-10">
<?php 
	$all= $this->country->getAll(); //id only
	$data=array();
	foreach($all as $row){
		$row2=$this->country->getData($row['id']);	
		$data[$row['id']]=$row2['name'];
	}
	$params='class="form-control" id="citizen"';
	echo form_dropdown("citizen",$data, isset($register['citizen'])?$register['citizen']:101,$params);
?>
				</div>
			</div>
		</div>
 	
		<?=bsInput2( lang('forex_agent'),'agent', isset($register['agent'])?$register['agent']:$agent, lang('forex_inputsuggestion'),false, $showAgent  );?>	
 

		<h2>Contact Information</h2>
 
			<?=bsInput2( lang('forex_email'),'email', isset($register['email'])?$register['email']:'', lang('forex_inputsuggestion') );?>
			<?=bsInput2( lang('forex_phone'),'phone', isset($register['phone'])?$register['phone']:$defInput, lang('forex_inputsuggestion'),false,$showForm );?>
 		
		<div class='form-group'
<?php 	if($showForm==false){?> style='display:none' <?php } ?>
		>
			<label for="input_date" class="col-sm-2 control-label">Date&nbsp;of&nbsp;Birth</label> 
			<div class="col-sm-10">
			  <input name="dob1" value="<?=isset($register['dob1'])?$register['dob1']:date("d",strtotime("-20 years"));?>" id="input_date" class="dob"  type="text"> -
			  <input name="dob2" value="<?=isset($register['dob2'])?$register['dob2']:date("m",strtotime("-20 years"));?>" id="input_date2" class="dob"  type="text"> -
			  <input name="dob3" value="<?=isset($register['dob3'])?$register['dob3']:date("Y",strtotime("-20 years"));?>" id="input_date3" class="dob"  type="text">
			</div> 
		</div>	
 		
 
		<input type='hidden' name='statusMember' value='<?=isset($register['statusMember'])?$register['statusMember']:strtoupper($statAccount);?>' />
		
			<div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-5">
                    <input name="accept" id="acc" value="OK" class="btn btn-info" type="checkbox" />
					I accept Costumer Agrement
                </div>
            </div> 
			<div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-5">
                    <input name="submit" id="submit" value="Create Account" class="btn btn-info" type="submit" />
                </div>
            </div>  
        </form>