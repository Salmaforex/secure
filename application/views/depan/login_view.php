	<div class="container">
    	<div class="row">
        	<div class="col-md-4 col-md-push-8">
            	<h3 class="large bright">Security Convenience Simplicity</h3>
                <div class="vspace-30"></div>
            </div>
        	<div class="col-md-6 col-md-pull-4">
            	<div class="login-module">
                	<ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#online-login" data-toggle="tab">Online Login</a></li>
                        <li><a href="#salma-forex" data-toggle="tab">Salma Forex</a></li>
					</ul>
                    <div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="online-login">
                        	<h4><strong>Login to Secure Online Account</strong></h4>
<?php  
		if(isset($register['message'])){ ?>
							<div class="alert alert-block alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"></button>
								<h4 class="alert-heading">Warning!</h4>
								<p><?=$register['message'];?></p>								
							</div>
<?php	}  
?>
<?php  
		if(isset($login['message'])){ ?>
							<div class="alert alert-block alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert"></button>
								<h4 class="alert-heading">Warning!</h4>
								<p><?=$login['message'];?></p>								
							</div>
<?php	}  
?>
                            <form id="online-login"  method="POST" action="<?=base_url('login/process');?>">
                            	<div class="row">
                                	<div class="col-md-6">
                                    	<div class="input-group">
                                    	<input class="form-control" type="text" name="username" placeholder="Username" 
										value="<?=isset($login['username'])?$login['username']:'';?>" />
                                        </div>
                                        <div class="input-group">
                                    	<input class="form-control" type="password" name="password" placeholder="Password" />
                                        </div>
                                        <div class="input-group">
<?php 
		if(!defined('LOCAL')) echo $this->recaptcha->render(); 
?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="input-group">
                                        	<!--img src="<?=base_url();?>media/images/captcha.jpg" alt="captcha" /-->
											 <button id="submit_login" class="btn btn-success btn-block btn-big">Login</button>
                                        </div>
                                        <div class="input-group">
                                       
                                        </div>
                                        <div class="text-center"><a class="small bright" href="<?=base_url('guest/forgot');?>" title="Forgot your passport?"><span class="glyphicon glyphicon-arrow-right"></span> Reset Password</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="salma-forex">...</div>
					</div>
                </div>
            </div>
            
        </div>
    </div>