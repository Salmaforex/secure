<?php 
ob_start();
$name=!isset($post0['name'])?$userlogin['detail']['firstname']." ".$userlogin['detail']['lastname']:$post0['name'];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td width="568" colspan="2"><a href="https://www.salmaforex.com/"><img src="https://www.salmaforex.com/wp-content/uploads/2016/01/unnamed-copy.jpg" width="750" height="225" /></a></td>
    </tr>
    <tr>
      <td colspan="2" valign="bottom"><table width="740" border="0" cellspacing="10" cellpadding="10">
        <tbody>
          <tr>
            <td><h3>Deposit Order Detail</h3>
              <p>Dear <?=$name;?>,</p>
              <p id="yui_3_16_0_1_1443010679159_2033">Thank you for submitting deposit form, Here your order deposit detail:.<br />
              </p>
              <table border="1" align="center" id="yui_3_16_0_1_1450323941636_3312">
                <tbody id="yui_3_16_0_1_1450323941636_3311">
                  <tr id="yui_3_16_0_1_1450323941636_3324">
                    <td width="363" bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3323"><strong>Date</strong></td>
                    <td width="337" bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3337"><strong>: <?=date("Y-m-d H:i:s");?></strong></td>
                  </tr>
                  <tr id="yui_3_16_0_1_1450323941636_3322">
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3321"><strong>Deposit to account</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3338"> <strong>: <?=$post0['accountid'];?></strong></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_"><strong>Name</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_2"><strong>: <?=$name;?>
					</strong></td>
                  </tr>
<?php 
if(isset($post0['phone'])&&$post0['phone']!=''){?>				  
				  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_"><strong>Phone</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_2"><strong>: 
					<?=$post0['phone'];?>
					</strong></td>
                  </tr>
<?php 
}
?>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3"><strong>Bank Name</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_4"><strong>: 
					<?=$post0['bank'];?></strong></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_5"><strong>Account Bank Number</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_6"><strong>: 
					<?=$post0['norek'];?></strong></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_7"><strong>Account Bank Holder</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_8"><strong>: 
					<?=$post0['namerek'];?></strong></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_9"><strong>Deposit Amount ( USD )</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_10"><strong>: $ 
					<?=number_format($post0['orderDeposit'],2);?></strong></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_11"><strong>Deposit Amount ( Rp )</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_12"><strong>: Rp.
					<?=number_format($post0['order1'],0);?></strong></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_13"><strong>Rate</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_14"><strong>: Rp. 
					<?=number_format($rate);?></strong></td>
                  </tr>
                </tbody>
            </table>
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
              Finance Departement</p></td>
          </tr>
        </tbody>
      </table>
        <br />
        <table width="750" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="373" valign="top" bgcolor="#E7E7E7"><img src="https://www.salmaforex.com/wp-content/uploads/2016/01/123.jpg" alt="" width="373" height="44" /></td>
              <td width="10" bgcolor="#FFFFFF">&nbsp;</td>
              <td width="367" valign="top" bgcolor="#E7E7E7"><img src="https://www.salmaforex.com/wp-content/uploads/2016/01/123.jpg" alt="" width="373" height="44" /></td>
            </tr>
            <tr>
              <td align="center" bgcolor="#E9EAEC">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td valign="top" bgcolor="#EAE9EE">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" bgcolor="#E9EAEC"><table width="340" border="0" cellpadding="2" cellspacing="2">
                <tbody>
                  <tr>
                    <td width="132" rowspan="2" align="center" valign="top"><img src="https://www.salmaforex.com/wp-content/uploads/2016/01/japan.jpg" alt="" width="121" height="130" /></td>
                    <td width="194" align="left" valign="top"><em><strong>JAPAN</strong></em></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">SalmaTrade Companies Group<br />
                      10-6, Kita-Aoyama 2-chome<br />
                      Minato-ku, Tokyo 107-8487, Japan<br />
                      TEL: 03-3492-3131<br />
                      <a href="https://www.salmaforex.com/" target="_blank"><img src="https://ci6.googleusercontent.com/proxy/mNfIncnCVMD2UsHac5t-90fnnE3KlKvMyhFa6PmA4q_BhBnFPLyzFf9JNhkawGLWcMXEuexBBYUvYpivzjzJWPASAPKnNriVohriStuasCzlX70Npxt6mSn5te0=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/read-more-btn-en.jpg" alt="" width="84" height="26" /></a></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                </tbody>
              </table></td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td rowspan="3" align="center" valign="top" bgcolor="#E9EAEC"><table width="340" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td align="center" bgcolor="#E9EAEC"><table width="340" border="0" cellpadding="2" cellspacing="2">
                      <tbody>
                        <tr>
                          <td width="132" rowspan="2" align="center" valign="top" bgcolor="#E9EAEC"><img src="https://ci5.googleusercontent.com/proxy/iOcxlm1p58PJIqt5JjhzYoXax_zLvvBck0tQuEHN38wumj9OWTojK4p9BmzphydSlcBBzGey3PEFh8YJ6KUAHP1ziIV3yZhPjZ-cnVTzMEl4eU1CFg=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/about-sfm.jpg" alt="" width="119" height="156" /></td>
                          <td width="194" align="left" valign="top" bgcolor="#E9EAEC"><strong><em>Salmaforex - The Leading</em></strong></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" bgcolor="#E9EAEC">SalmaForex offers direct access to multiple destinations of liquidity in the forex markets without the usual burdens of a deal desk that had previously been unavailable to the retail investor.<br />
                            <a href="https://www.salmaforex.com/about-us/" target="_blank"><img src="https://ci6.googleusercontent.com/proxy/mNfIncnCVMD2UsHac5t-90fnnE3KlKvMyhFa6PmA4q_BhBnFPLyzFf9JNhkawGLWcMXEuexBBYUvYpivzjzJWPASAPKnNriVohriStuasCzlX70Npxt6mSn5te0=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/read-more-btn-en.jpg" alt="" width="84" height="26" /></a></td>
                        </tr>
                        <tr>
                          <td bgcolor="#E9EAEC">&nbsp;</td>
                          <td align="left" valign="top" bgcolor="#E9EAEC">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC">&nbsp;</td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC"><img src="https://ci3.googleusercontent.com/proxy/BRAZITFgWtlYXFkiXRtSaScf85waxMn_t8WFNqvNvZUVqfGBg1VQS80ESIw6ntrHO75E9t-T0SWDPrQE-2fYgmqZGHBZriQCQWFViP_fB_KVtr5kXCcB=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/red-divider.jpg" alt="" width="373" height="10" /></td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC">&nbsp;</td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center" bgcolor="#E9EAEC"><table width="300" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td align="left" bgcolor="#E9EAEC"><img src="https://ci6.googleusercontent.com/proxy/9eAN3kMRi6jb6VN5lGfu9_7OJJNqrGJ7xuybu4GR4fsPR--Z1VHRUPVF_Q0p-RFcvo5iY9HnRMSye_xWXhwHHtOov_4TWU6wDrPqRSW-ELWevjqNREWVezV51co=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/need-help-hdg-en.jpg" alt="" width="102" height="26" /></td>
                        </tr>
                        <tr>
                          <td align="left" bgcolor="#E9EAEC">Call us, Send your query by e-mail or Chat Online from our Website. We answer all your questions!</td>
                        </tr>
                        <tr>
                          <td align="center">&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td align="center" bgcolor="#E9EAEC"><table width="340" border="0" cellpadding="2" cellspacing="2">
                <tbody>
                  <tr>
                    <td width="132" rowspan="2" align="center" valign="top"><img src="https://www.salmaforex.com/wp-content/uploads/2016/01/Screenshot_1.png" alt="" width="121" height="131" /></td>
                    <td width="194" align="left" valign="top"><em><strong>BELIZE</strong></em></td>
                  </tr>
                  <tr>
                    <td height="100" align="left" valign="top">Salma Markets Companies, <br />
3 ½ Miles Philip S.W. Goldson Highway, Belize City, Beliz<strong>e</strong><br />
TEL: 03-3492-3131<br />
support@salmaforex.com<br />
                      <a href="https://www.salmaforex.com/" target="_blank"><img src="https://ci6.googleusercontent.com/proxy/mNfIncnCVMD2UsHac5t-90fnnE3KlKvMyhFa6PmA4q_BhBnFPLyzFf9JNhkawGLWcMXEuexBBYUvYpivzjzJWPASAPKnNriVohriStuasCzlX70Npxt6mSn5te0=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/read-more-btn-en.jpg" alt="" width="84" height="26" /></a></td>
                  </tr>
                </tbody>
              </table></td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" bgcolor="#E9EAEC">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <table width="750" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td align="center"><a href="https://www.salmaforex.com/" target="_blank"><img src="https://www.salmaforex.com/wp-content/uploads/2016/01/body_photo_button_open_account.jpg" alt="" width="193" height="41" /></a></td>
              <td align="center"><a href="https://www.salmaforex.com/" target="_blank"><img src="https://ci4.googleusercontent.com/proxy/9YJIHCFZpThJ3QNdDYNdwyyhcm9cC9wmIyMwDLT0aVsGS_bZWQUhUx9UQYLLMgB6_l5v-4qtM90xrPAdhM9RhnqvLWMtxxPdZeQcVHCkbRIlzZlYEy7r8hO8K1bo=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/contact-us-btn-en.jpg" alt="" width="192" height="41" /></a></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td colspan="2" valign="bottom"><table cellpadding="0" cellspacing="0" align="center">
        <tbody>
          <tr>
            <td>Follow us ! And get our best offer with !!<a href="http://www.sfm-offshore.com/unsubscribe-newsletter.html?UID=214925-576338" target="_blank"></a></td>
            <td><a href="https://www.facebook.com/salmaforexbroker" target="_blank"><img src="https://ci5.googleusercontent.com/proxy/VTM5viPATqODY1LqjMjAae-R4hA9qNtgqkPCDLwFWri9O-YFl1iZGViFG32HlTj4wJLiMqzCbUIbRenVGY2ALapY4i38eE0G4QjwNBFX=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/fb.jpg" alt="" /></a> <a href="https://twitter.com/salmaforex" target="_blank"><img src="https://ci3.googleusercontent.com/proxy/YnYoxrrExTciGQiCApxI21Lle_kVJKse0DCASTD-kCgGOFD5pHSU1dbNEqRPefHmjzldBc6XGETrETZJJcpvv5pvEOA83-hdGsRAZ0Sw=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/tw.jpg" alt="" /></a> <a href="http://www.salmaforex.com/contact/" target="_blank"><img src="https://ci3.googleusercontent.com/proxy/5Pz5Sj7ffW2Qq12bG-jK_kTP6BUzTCWPhfoeSFAri7w5uJNcKgDq1kdadIL621dyzL669yJQvOe2X9IkKMRwZU7zBgmf1CYA8pEcjaZf=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/ln.jpg" alt="" /></a></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php 
$message = ob_get_contents();
ob_end_clean();
//echo  $detail;
$to = trim( $userlogin['email'] );

$subject = '[SalmaForex] Confirmation to Deposit ';

$headers = "From: noreply@salmaforex.com\r\n";
$headers .= "Reply-To: noreply@salmaforex.com\r\n"; 
$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(defined('LOCAL')){
	
	
	$rawEmail=array(
		$subject, $headers,$message,'send email'
	);
	$data=array( 'url'=>$to,
		'parameter'=>json_encode($rawEmail),
		'error'=>2
	);
	$this->db->insert('mujur_api',$data);
	//die($message );
}
else{
	mail($to, $subject, $message, $headers);
	$rawEmail=array(
		$subject, $headers,$message,'send email'
	);
	$data=array( 'url'=>$to,
		'parameter'=>json_encode($rawEmail),
		'error'=>2
	);
	$this->db->insert('mujur_api',$data);
}