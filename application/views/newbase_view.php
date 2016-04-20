<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html>
	<head>
<?php 
		$load_view=isset($baseFolder)?$baseFolder.'inc/head_view':'head_view';
		$this->load->view($load_view);
?>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
<body>
<?php 
	$load_view=isset($baseFolder)?$baseFolder.'inc/menu_view':'menu_view';
	$this->load->view($load_view);
?>
<?php 
	$load_view=isset($baseFolder)?$baseFolder.'inc/header_view':'header_view';
	$this->load->view($load_view);
?>  
<div class="middle <?=!isset($noBG)?'fullbg':'';?>">
<?php 
	$aContent= !is_array($content) ?(array)$content:$content;
	foreach($aContent as $load_view){
		$this->load->view($baseFolder.$load_view."_view");
	}
?>
</div>
<div class="footer">
	<div class="vspace-30"></div>
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<img alt="Salma Forex Logo" src="<?=base_url();?>media/images/footer-logo.jpg" />
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
	  <script src="<?=base_url();?>media/<?=$jsFile;?>"></script>
<?php 
	}
}else{ echo '<!--no footer js -->'; } ?>
</body>
</html>