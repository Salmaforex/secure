<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html>
<?php 
	$load_view=isset($baseFolder)?$baseFolder.'head_view':'head_view';
	$this->load->view($load_view);
?> 
<body>
<div class="top-header">
	<div class="container">
    	<div class="row">
        	<div class="social col-md-6">
                <ul class="list-inline">
                    <li><a href="#"><span class="glyphicon-social facebook"></span></a></li>
                    <li><a href="#"><span class="glyphicon-social twitter"></span></a></li>
                    <li><a href="#"><span class="glyphicon-social instagram"></span></a></li>
                    <li><a href="#"><span class="glyphicon-social e-mail"></span></a></li>
                </ul>
            </div>
            <div class="quicklinks col-md-6">
                <ul class="list-inline text-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> <span class="small">Login</span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-import"></span> <span class="small">Deposit</span></a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-export"></span> <span class="small">Withdrawal</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="header">
	<div class="container">
    	<div class="logo"><img alt="Salma Market Logo" src="<?=base_url("media/images/logo1.png");?>" /></div>
    </div>
</div>
<div class="middle">
	<div class="container">
    	<div class="row">
        	<div class="col-md-4 col-md-push-8">
            	<h1 class="large bright">Security Convenience Simplicity</h1>
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
                            <form id="online-login">
                            	<div class="row">
                                	<div class="col-md-6">
                                    	<div class="input-group">
                                    	<input class="form-control" type="text" name="username" placeholder="Username" />
                                        </div>
                                        <div class="input-group">
                                    	<input class="form-control" type="password" name="password" placeholder="Password" />
                                        </div>
                                        <div class="input-group">
                                    	<input class="form-control" type="text" name="captcha" placeholder="Security Code" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<div class="input-group captcha">
                                        	<img src="images/captcha.jpg" alt="captcha" />
                                        </div>
                                        <div class="input-group">
                                        <button type="submit" class="btn btn-success btn-block">Login</button>
                                        </div>
                                        <div class="text-center"><a class="small bright" href="#" title="Forgot your passport?"><span class="glyphicon glyphicon-arrow-right"></span> Reset Password</a></div>
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
</div>
<div class="footer">
	<div class="vspace-30"></div>
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<img alt="Salma Forex Logo" src="images/footer-logo.jpg" />
                <a class="inlineblock vmargin-15 bright" href="#">Privacy Policy</a>
                <a class="inlineblock vmargin-15 bright" href="#">Terms & Conditions</a>
            </div>
            <div class="col-md-4 text-right hpadding-20 visible-md visible-lg small">
            	Copyright @ Salma Forex 2016 All Rights Reserved
            </div>
            <div class="col-md-12 small opacity-5">
            	<p><strong>RISK WARNING:</strong> Trading foreign exchange, foreign exchange options, foreign exchange forwards, contracts for difference, bullion and other over-the-counter products carries a high level of risk and may not be suitable for all investors. Past performance of an investment is no guide to its performance in the future. Investments, or income from them, can go down as well as up. You may not necessarily get back the amount you invested.</p>
                <p>All opinions, news, analysis, prices or other information contained on this website are provided as general market commentary and does not constitute investment advice, nor a solicitation or recommendation for you to buy or sell any over-the-counter product or other financial instrument.</p>
                <div class="vspace-15"></div>
                <hr/>
            </div>
        </div>
    </div>
    <div class="vspace-30"></div>
</div>
<div class="bottom-footer">
	<div class="container">
	<p class="text-left small bright opacity-5"><strong>Salma Forex Partners</strong> - The leading forex broker @ 2016</p>
    </div>
</div>
<?php 
if(isset($footerJS)){ 
	if(!is_array($footerJS)){ 
		$footerJS=array($footerJS); 
	}else{}
	
	foreach($footerJS as $jsFile ){?>
	  <script src="<?=base_url();?>assets/<?=$jsFile;?>"></script>
<?php 
	}
}else{ echo '<!--no footer js -->'; } ?>
</body>
</html>
