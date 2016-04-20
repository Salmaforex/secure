<?php
$name=$userlogin['detail']['firstname']." ".$userlogin['detail']['lastname']; 
?>
<div class='container-left'>
    <div style='margin-top:30px;'>
		<div>
			<h2 class='welcome'>Welcome to the Secure Area of SalmaForex</h2>
			<p>
			Dear <?=$name;?>, <br/>
			Your are now logged-in the Secure Area. Here you can view all the Information from your accounts. You can also Update Your Profile before deposit and withdrawn and many more.
			</p>
		</div>
		<div class='box-welcome'> 
			<div class='box-info'>
				<div class='box-detail'>
				<label>Verify Account</label>
				<a href='<?=base_url("member/edit");?>'><button>Click Here</button></a>
				</div>
			</div>
			<div class='box-info'>
				<div class='box-detail'>
				<label>Change Password</label>
				<a href='<?=base_url("member/editpassword");?>'><button>Click Here</button></a>
				</div>
			</div>
			<div class='clear'></div>
			<div class='box-info'>
				<div class='box-detail'>
				<label>Create a Deposit</label>
				<a href='<?=base_url("deposit-form");?>'><button>Click Here</button></a>
				</div>
			</div>
			
			<div class='box-info'>
				<div class='box-detail'>
				<label>Withdrawn</label>
				<a href='<?=base_url("widtdrawal-form");?>'><button>Click Here</button></a>
				</div>
			</div>
			<div class='clear'></div>
		</div>
	</div>
</div>