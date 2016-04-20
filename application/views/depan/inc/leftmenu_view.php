
    		<div class="main-left col-md-4">
            	<div class="box green-box">
                	<h3 class="box-title"><strong>SalmaForex Ballance</strong></h3>
                    <div class="row large">
                    	<div class="col-xs-5"><strong>Account :</strong></div>
                        <div class="col-xs-7 text-right"><?=isset($userlogin['username'])?$userlogin['username']:'';?></div>
                    </div>
                    <div class="row large">
                    	<div class="col-xs-5"><strong>Name :</strong></div>
                        <div class="col-xs-7 text-right"><?=isset($userlogin['detail']['firstname'])?$userlogin['detail']['firstname']:'';?>&nbsp;<?=isset($userlogin['detail']['lastname'])?$userlogin['detail']['lastname']:'';?></div>
                    </div>
                    <hr/>
                    <!--div class="row large">
                    	<div class="col-xs-5"><strong>Ballance :</strong></div>
                        <div class="col-xs-7 text-right">$ 12.00</div>
                    </div-->
                </div>
                <div class="vspace-30"></div>
                <div class="drop-nav">
                	<ul>
                    	<li>
                        	<a href="<?=base_url('member');?>"><span class="glyphicon glyphicon-home"></span> Home</a>
                        </li>
                        <li>
                        	<a href="#"><span class="glyphicon glyphicon-retweet"></span> Transactions</a>
                            <span class="toggle glyphicon glyphicon-chevron-down"></span>
                            <ul>
                            	<li><a href="<?=base_url('deposit-form');?>"><span class="glyphicon glyphicon-triangle-right"></span> <img class="ui--icon" src="<?=base_url();?>media/img/partners.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;">Deposit</a></li>
                                <li><a href="<?=base_url('withdraw-form');?>"><span class="glyphicon glyphicon-triangle-right"></span> <img class="ui--icon" src="<?=base_url();?>media/img/partners.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;">Withdrawal</a></li>
                            </ul>
                        </li>
                        <li>
                        	<a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a>
                            <span class="toggle glyphicon glyphicon-chevron-down"></span>
                            <ul>
                            	<li><a href="<?=base_url('member/detail');?>"><span class="glyphicon glyphicon-triangle-right"></span> <img class="ui--icon" src="<?=base_url();?>media/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;" />Detail</a></li>
                                <li><a href="<?=base_url('member/edit');?>"><span class="glyphicon glyphicon-triangle-right"></span> <img class="ui--icon" src="<?=base_url();?>media/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;" />Edit Detail</a></li>
								<li><a href="<?=base_url('member/editpassword');?>"><span class="glyphicon glyphicon-triangle-right"></span> <img class="ui--icon" src="<?=base_url();?>media/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;" />Edit Password</a></li>
                            </ul>
                        </li>
<?php 
if(isset($detail)&&$detail['type']=='admin'){?>
						<li>
                        	<a href="#"><span class="glyphicon glyphicon-user"></span> Admin</a>
                            <span class="toggle glyphicon glyphicon-chevron-down"></span>
                            <ul>
                            	<li><a href="<?=base_url('member/listApi');?>"><span class="glyphicon glyphicon-triangle-right"></span><img class="ui--icon" src="<?=base_url();?>media/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"> API</a></li>
                                <li><a href="<?=!isset($detail['id'])?base_url("member/logout"):base_url("member/listApi/deposit");?>"><span class="glyphicon glyphicon-triangle-right"></span><img class="ui--icon" src="<?=base_url();?>media/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"><?php 
														echo isset($detail['id'])?'DAFTAR DEPOSIT':'unknown';?>
											</a></li>
								<li><a href="<?=!isset($detail['id'])?base_url("member/logout"):base_url("member/listApi/widtdrawal");?>"><span class="glyphicon glyphicon-triangle-right"></span><img class="ui--icon" src="<?=base_url();?>media/img/open-account.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"><?php 
														echo isset($detail['id'])?'DAFTAR WIDTDRAWAL':'unknown';?>
											</a></li>
								<li><a href="<?=!isset($detail['id'])?base_url("member/logout"):base_url("member/tarif");?>"><span class="glyphicon glyphicon-triangle-right"></span><img class="ui--icon" src="<?=base_url();?>media/img/partners.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;"><?php 
														echo isset($detail['id'])?'Tarif':'unknown';?>
											</a>
								</li>
								<li><a href="<?=!isset($detail['id'])?base_url("member/logout"):base_url("member/listApi/user");?>"><span class="glyphicon glyphicon-triangle-right"></span> <img class="ui--icon" src="<?=base_url();?>media/img/contact.png" alt="" data-at2x="size:14px" data-retina-auto="1" style="margin-right: 5px;">
									List User
								</a></li>
                            </ul>
                        </li>
<?php 
}
?>
                        <!--li>
                        	<a href="#"><span class="glyphicon glyphicon-user"></span> Partner Area</a>
                            <span class="toggle glyphicon glyphicon-chevron-down"></span>
                            <ul>
                            	<li><a href="#"><span class="glyphicon glyphicon-triangle-right"></span> Subnav 1</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-triangle-right"></span> Subnav 2</a></li>
                            </ul>
                        </li-->
                        <li>
                        	<a href="<?=base_url('member/logout');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="vspace-30"></div>
                <div class="row">
                	<div class="col-xs-6 text-center">
                    	<a href="#"><img class="img-responsive inlineblock" alt="Live Support" src="<?=base_url();?>media/images/live-support.jpg" /></a>
                    </div>
                    <div class="col-xs-6 text-center">
                    	<a href="#"><img class="img-responsive inlineblock" alt="Skype Support" src="<?=base_url();?>media/images/skype-support.jpg" /></a>
                    </div>
                </div>
                <div class="vspace-30 visible-sm visible-xs"></div>
            </div>
            