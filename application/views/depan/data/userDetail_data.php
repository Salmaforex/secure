<?php 
$respon=array( 'post'=>$_POST );
$html='';
$detail=$this->account->detail($post0['id']);
$respon['raw']=$detail;
//$html.="<pre>".print_r($detail,1)."</pre>";

$show=array();
$show['TYPE']=$detail['accounttype'];
$show['username']=$detail['username'];
$show['email']=$detail['email'];
$show['Nama Lengkap']=isset($detail['detail']['firstname'])?$detail['detail']['firstname']:'';
$show['Nama Lengkap'].=isset($detail['detail']['lastname'])?' '.$detail['detail']['lastname']:'';
if(trim($show['Nama Lengkap'])=='')$show['Nama Lengkap']='???';

$show['Alamat']=isset($detail['detail']['address'])?$detail['detail']['address']:'';
if(trim($show['Alamat'])=='')$show['Alamat']='???';

$show['Bank']=isset($detail['detail']['bank'])?$detail['detail']['bank']:'???';
$show['No Rekening']=isset($detail['detail']['bank_norek'])?$detail['detail']['bank_norek']:'???';

?><h3>Detail</h3>
<table border=1 width=400>
<?php 
foreach($show as $nm=>$val){?>
<tr>
	<td><?=$nm;?></td><td>:</td><td>&nbsp;<?=$val;?></td>
</tr>
<?php 
}
?>
</table>
<?php 
$respon['title']='Detail User';


$html = ob_get_contents();
ob_end_clean();
 
$respon['html']="<div style='max-height:400px;width:800px;overflow:auto'>".$html."</div>";
$respon['status']=true;
if(isset($respon)){ 
	echo json_encode($respon);
}
else{
	echo json_encode(array());
}