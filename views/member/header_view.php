<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

<header id="page-header" class="clearfix">

  <div style="height: 128px;" class="sticky-wrapper">
    <div style="padding-bottom: 0px;" id="header-container" class="header-style-1 logo-position-left navigation-position-right sticky-logo-position-left sticky-navigation-position-right clearfix stuck" data-responsive="{&quot;css&quot;:{&quot;padding-bottom&quot;:{&quot;phone&quot;:20,&quot;tablet&quot;:20,&quot;widescreen&quot;:0}}}">
      <div id="header-container-background"></div>
      <div id="top-bar" class="clearfix">
        <div id="top-bar-background">
          <div class="container relative">
            <div id="top-bar-text" class="top-bar-sides abs-right">
              <a href="<?=!isset($detail['id'])?base_url("login "):base_url("member/logout ");?>" block="0" lightbox="0" title="Live Account" font="" color="29a4dd"><img class="ui--icon" src="<?=base_url();?>assets/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"><?php 
							echo isset($detail['id'])?'Logout':'Login';?></a>
              <?php 
if(isset($detail)&&$detail['type']=='admin'){
?>
                <a href="<?=!isset($detail['id'])?base_url("member/logout"):base_url("member/listApi");?>" block="0" lightbox="0" title="Live Account" font="" color="29a4dd"><img class="ui--icon" src="<?=base_url();?>assets/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"><?php 
							echo isset($detail['id'])?'API':'unknown';?>
				</a>
				<a href="<?=!isset($detail['id'])?base_url("member/logout"):base_url("member/tarif");?>" block="0" lightbox="0" title="Live Account" font="" color="29a4dd"><img class="ui--icon" src="<?=base_url();?>assets/img/partners.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"><?php 
							echo isset($detail['id'])?'Tarif':'unknown';?>
				</a>
                <?php 
}else{}
?>
                  <div class="helper--seperator"></div>
                  <a href="<?=base_url("deposit-form ");?>" block="0" lightbox="0" title="Demo Account" font="" color="29a4dd"><img class="ui--icon" src="<?=base_url();?>assets/img/partners.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"> Deposit</a>
                  <div class="helper--seperator"></div>
                  <a href="<?=base_url("withdrawal-form ");?>" block="0" lightbox="0" title="Partners Account" font="" color="29a4dd"><img class="ui--icon" src="<?=base_url();?>assets/img/contact.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;">Withdrawal</a>
                  <div class="helper--seperator"></div>
            </div>

            <div id="top-bar-widgets" class="top-bar-sides abs-left">

              <ul id="topbar-social-icons" class="ui-socialbar unstyled ui--widget opt--on-hover style--top-bar  ss grey-bevel-gradient effect--slide borderless">
                <li class="facebook ui--gradient ui--gradient-grey ui-socialbar-item ui--animation">
                  <div class="ui-socialbar-image ui-socialbar-background "></div>
                  <a href="https://www.facebook.com/salmaforexbroker" class="ui-socialbar-image" target="_blank" title="Facebook" rel=""></a>
                </li>
                <li class="twitter-alt ui--gradient ui--gradient-grey ui-socialbar-item ui--animation">
                  <div class="ui-socialbar-image ui-socialbar-background "></div>
                  <a href="https://twitter.com/salmaforex" class="ui-socialbar-image" target="_blank" title="Twitter" rel=""></a>
                </li>
                <li class="googleplus ui--gradient ui--gradient-grey ui-socialbar-item ui--animation">
                  <div class="ui-socialbar-image ui-socialbar-background "></div>
                  <a href="https://plus.google.com/u/0/114616917067540700860/" class="ui-socialbar-image" target="_blank" title="Google Plus" rel=""></a>
                </li>
                <li class="instagram ui--gradient ui--gradient-grey ui-socialbar-item ui--animation">
                  <div class="ui-socialbar-image ui-socialbar-background "></div>
                  <a href="https://instagram.com/salmaforex/" class="ui-socialbar-image" target="_blank" title="Instagram" rel=""></a>
                </li>
                <li class="mail ui--gradient ui--gradient-grey ui-socialbar-item ui--animation">
                  <div class="ui-socialbar-image ui-socialbar-background "></div>
                  <a href="http://www.salmaforex.com/contact/" class="ui-socialbar-image" target="_self" title="Mail" rel=""></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /#top-bar -->
      <div class="container relative">
        <div id="logo">
          <a href="http://www.salmaforex.com">
                            
                            <img id="logo-desktop" class="visible-desktop " src="<?=base_url();?>assets/img/logo1.png" data-at2x="<?=base_url();?>assets/img/logo1.png" alt="SalmaForex" style="margin-top: 20px;  margin-bottom: 20px;">
<img id="logo-tablet" class="visible-tablet " src="<?=base_url();?>assets/img/logo1.png" data-at2x="<?=base_url();?>assets/img/logo1.png" alt="SalmaForex" style="margin-top: 40px;  margin-bottom: 20px;">
<img id="logo-phone" class="visible-phone " src="<?=base_url();?>assets/img/logo1.png" data-at2x="<?=base_url();?>assets/img/logo1.png" alt="SalmaForex" style="margin-top: 20px;  margin-bottom: 20px;">                        </a>
        </div>
        <!-- /#logo --> 

      </div>
    </div>
  </div>
  <!-- /#header-container -->

</header>
