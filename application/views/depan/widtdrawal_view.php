<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
$uDetail=$userlogin['detail'];
if(!isset($uDetail['bank'])||$uDetail['bank']==''){
	$notAllow=1;
	$uDetail['bank']='';
}

if(!isset($uDetail['bank_norek'])||$uDetail['bank_norek']==''){
	$notAllow=1;
	$uDetail['bank_norek']='';
}

if(isset($notAllow)){
	redirect(site_url("member/edit/warn"),1);
}
?>
<style>
.form-group{
	width:100% !important;
}
</style> 
<div class='container'>
    <div style='margin-top:30px;'>
	<div style='margin-top:30px;'>
        <form novalidate="novalidate" name="frm" id0="frm"   method="POST"  class="form-horizontal" role="form"> 
		<div class="frame-form-basic">
		<h2>Widtdrawal</h2>
		  <div class="panel-body">
            <table> 
<?php 
$name=$userlogin['detail']['firstname']." ".$userlogin['detail']['lastname']; 
$name1='<input type="hidden" name="accountid" value="'.$userlogin['accountid'].'" />
<input type="hidden" name="name" value="'.$name.'" />
<input type="hidden" name="username" value="'.$userlogin['username'].'" />';
echo bsInput('Akun Salmaforex','akun', $userlogin['username'] ,'',true);
echo bsInput('Name','name', $name.$name1 ,'',true);
echo bsInput('Phone','phone', trim($uDetail['phone']) ,'Please Input Valid Phonenumber' );
echo bsInput('Nama Bank','bank', trim($uDetail['bank']) ,'BCA, Mandiri, BNI, BII, etc' );
echo bsInput('No Rekening','norek', trim($uDetail['bank_norek']) ,'999 999 999 9' );
echo bsInput('Nama Pemilik Rekening','namerek', trim($name) ,'Please Input Valid Name' );

echo bsInput('Jumlah Widtdrawal ($)','orderWidtdrawal', 0 ,'Minimal $10' );
echo bsInput('Rate ($)','orderDeposit', 
'<div id="input_rate">0</div>' ,'Minimal $10',true );
echo bsInput('Jumlah Widtdrawal(Rp)','order1', '' ,'Nominal Hanya Estimasi Saja' );

?>             
            <tr><td colspan=3> 
            <button type="submit" class="btn btn-default submitLogin" >
              Submit
            </button></td></tr>
			</table>
          </div>
          <div class='clear'></div> 
		</div>
		<div class='notice'>
		   <p><br />
                Please wait 1-3 x 24 hours , your order will be forwarded to the Finance Departement for in the process.Salmaforex finance working hours from Monday - Friday at 09:00 am - 17:00 pm .  Hopefully this information is useful .<br />
              </p>
              <p id="yui_3_16_0_1_1443010679159_2162">In case you have any questions, please <a rel="nofollow" target="_blank" href="https://www.salmaforex.com/contact/" id="yui_3_16_0_1_1443010679159_2161">contact us</a>, we will be happy to answer them.</p>
              <p id="yui_3_16_0_1_1443010679159_2163">Wishing you luck and profitable trading! </p>
              <p><strong>Thank you for choosing SalmaForex to provide you with brokerage services on the forex market! We wish you every success in your trading!</strong></p>
              <p>Sincerely,<br />
              Finance Departement</p>
		</div>
	
		</form>
		</div>     
</div>
<script>
urlWidtdrawal = "<?=base_url("rupiah_widtdrawal");?>";
</script>	
 