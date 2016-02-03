<?php 
//deposit_view.php
/*
Array
(
    [0] => glory.lombok@gmail.com
    [1] => enjoy21939
    [2] => room21919
    [3] => 2000
)
*/
$uDetail=$userlogin['detail'];
defined('BASEPATH') OR exit('No direct script access allowed');?>
<style>
.form-group{
	width:100% !important;
}
</style>
<?php //echo '<pre>'.print_r($userlogin['detail'],1).'</pre>'; ?>
<div class='container'>
    <div style='margin-top:30px;'>
        <form novalidate="novalidate" name="frm" id0="frm"   method="POST"  class="form-horizontal" role="form"> 
		<div class="frame-form-basic">
		<h2>Deposit</h2>
		  <div class="panel-body">
            <table> 
<?php 
$name=$userlogin['detail']['firstname']." ".$userlogin['detail']['lastname']; 
$name1=$name.'<input type="hidden" name="accountid" value="'.$userlogin['accountid'].'" />'.'<input type="hidden" name="name" value="'.$name.'" />';
echo bsInput('Akun Instaforex','akun', $name1 ,'',true);
echo bsInput('Phone','phone', trim($uDetail['phone']) ,'Please Input Valid Phonenumber' );
echo bsInput('Nama Bank','bank', '' ,'BCA, Mandiri, BNI, BII, etc' );
echo bsInput('No Rekening','norek', '' ,'999 999 999 9' );
echo bsInput('Nama Pemilik Rekening','namerek', trim($name) ,'Please Input Valid Name' );

echo bsInput('Jumlah Order ($)','orderDeposit', '' ,'Minimal $10' );
echo bsInput('Jumlah Transfer (Rp)','order1', '' ,'Nominal Hanya Estimasi Saja' );


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
                Please transfer in accordance with the amount of transfer listed above , the maximum transfer time 1x24 hours . If the transfer is not in that time period , then the system will automatically cancel the order.  Hopefully this information is useful .<br />
                <br />
                Our Bank information :</p>
              <h3><strong>BCA : 8380126282 a.n Yadi Supriyadi <br />
                </strong><strong>BRI : 2202.01.000120.561 a.n Yadi Supriyadi</strong><br />
                <strong>BNI : 0423851338 a.n Yadi Supriyadi</strong></h3>
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
urlDeposit = "<?=base_url("rupiah_deposit");?>";
</script>