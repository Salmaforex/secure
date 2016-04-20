	<form action="<?=current_url();?>" novalidate="novalidate" name="frm" id0="frm" id="frmLiveAccount" method="POST"  class="form-horizontal" role="form">
<?php 
	if($this->session->flashdata('forgot')){
			$forgot=$this->session->flashdata('forgot');
			logCreate('session forgot valid','info');
	}
		if(isset($forgot['message'])){ ?>
							<div class="alert alert-block alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"></button>
								<h4 class="alert-heading">Warning!</h4>
								<p><?=$forgot['message'];?></p>								
							</div>
<?php	}  
?>
			<div class="frame-form-basic">
			<h2>Forgot Your Password</h2>
      
          <div class="panel-body">
            <div class="form-group">

              <label for="myEmail1">
                Your Email
              </label>
              <input class="form-control" id="myUser" type="text" name="email" />
            </div> 
             
            <button type="submit" class="btn btn-default submitLogin" onclick="forgotpass()">
              Recover  
            </button>
          </div>
          <div class='clear'></div> 
        </div>
      </form>