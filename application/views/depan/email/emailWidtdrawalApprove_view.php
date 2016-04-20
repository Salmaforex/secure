<?php 
ob_start();
$name=!isset($raw['name'])?$userlogin['detail']['firstname']." ".$userlogin['detail']['lastname']:$raw['name'];
//$rate=$raw['rate'];
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
            <td><h3>Withdrawal Order Success</h3>
              <p>Dear <?=$name;?>,</p>
              <p id="yui_3_16_0_1_1443010679159_2033">Your Deposit Has been Success, Here your order withdrawal detail:.<br />
              </p>
              <table border="0" align="center" id="yui_3_16_0_1_1450323941636_3312">
                <tbody id="yui_3_16_0_1_1450323941636_3311">
                  <tr id="yui_3_16_0_1_1450323941636_3324">
                    <td width="297" bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3323"><strong>Date</strong></td>
                    <td width="398" bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3337"><strong>: </strong><?=date("Y-m-d H:i:s");?></td>
                  </tr>
                  <tr id="yui_3_16_0_1_1450323941636_3322">
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3321"><strong>Withdrawal from  account</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3338"> <strong>: </strong><?=$raw['accountid'];?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_"><strong>Name</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_2"><strong>:</strong> <?=$name;?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_3"><strong>Bank Name</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_4"><strong>: </strong><?=$raw['bank'];?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_5"><strong>Account Bank Number</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_6"><strong>: </strong><?=$raw['norek'];?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_7"><strong>Account Bank Holder</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_8"><strong>: </strong><?=$raw['namerek'];?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_9"><strong>Withdrawal Amount ( USD )</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_10"><strong>: </strong>$ <?=number_format($raw['orderWidtdrawal'],2);?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_11"><strong>Withdrawal Amount ( Rp )</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_12"><strong>: </strong>Rp. <?=number_format($raw['order1'],0);?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_13"><strong>Rate</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_14"><strong>: </strong>Rp. <?=number_format($rate['value']);?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_15"><strong>Status</strong></td>
                    <td bgcolor="#CCCCCC" id="yui_3_16_0_1_1450323941636_16"><strong>:</strong> Success</td>
                  </tr>
                </tbody>
            </table>
              <p><br />
              </p>
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
              <td width="10" bgcolor="#FFFFFF"> </td>
              <td width="367" valign="top" bgcolor="#E7E7E7"><img src="https://www.salmaforex.com/wp-content/uploads/2016/01/123.jpg" alt="" width="373" height="44" /></td>
            </tr>
            <tr>
              <td align="center" bgcolor="#E9EAEC"> </td>
              <td bgcolor="#FFFFFF"> </td>
              <td valign="top" bgcolor="#EAE9EE"> </td>
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
                    <td> </td>
                    <td align="left" valign="top"> </td>
                  </tr>
                </tbody>
              </table></td>
              <td bgcolor="#FFFFFF"> </td>
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
                          <td bgcolor="#E9EAEC"> </td>
                          <td align="left" valign="top" bgcolor="#E9EAEC"> </td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC"> </td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC"><img src="https://ci3.googleusercontent.com/proxy/BRAZITFgWtlYXFkiXRtSaScf85waxMn_t8WFNqvNvZUVqfGBg1VQS80ESIw6ntrHO75E9t-T0SWDPrQE-2fYgmqZGHBZriQCQWFViP_fB_KVtr5kXCcB=s0-d-e1-ft#http://marketing.offshorecompany.ch/images/170613/red-divider.jpg" alt="" width="373" height="10" /></td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC"> </td>
                  </tr>
                  <tr>
                    <td bgcolor="#E9EAEC"> </td>
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
                          <td align="center"> </td>
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
              <td bgcolor="#FFFFFF"> </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#E9EAEC"> </td>
              <td bgcolor="#FFFFFF"> </td>
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
$to = array(trim( $userlogin['email'] ));
foreach($this->forex->emailAdmin as $email){
	$to[]=$email;
}

$subject = '[SalmaForex] Confirmation to Widthdrawal ';
$subject.= 'Have Been Approve';//:'Have Been Disapprove';


$headers = "From: noreply@salmaforex.com\r\n";
$headers .= "Reply-To: noreply@salmaforex.com\r\n"; 
$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if(defined('LOCAL')){	
	$rawEmail=array(
		$subject, $headers,$message,'send email'
	);
	$data=array( 'url'=>json_encode($to),
		'parameter'=>json_encode($rawEmail),
		'error'=>2
	);
	$this->db->insert($this->forex->tableApi,$data);
	//die($message );
}
else{
	$to[]='finance@salmaforex.com';
	foreach($to as $email){
		mail($email, $subject, $message, $headers);
	}
	$rawEmail=array(
		$subject, $headers,$message,'send email'
	);
	$data=array( 'url'=>json_encode($to),
		'parameter'=>json_encode($rawEmail),
		'error'=>2
	);
	$this->db->insert($this->forex->tableApi,$data);
}