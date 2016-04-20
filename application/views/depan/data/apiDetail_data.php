<?php 
ob_start();
if (  function_exists('logFile')){ logFile('view/member/data','apiDetail_data.php','data'); };
//api_data
$respon=array( 'draw'=>$_POST['draw']);
$html='';
$sql="select * from mujur_api where id=".$post0['id'];
$dt=$this->db->query($sql)->row_array();
$html.="<b>create</b><div style='width:700px;overflow:auto'>$dt[created]</div>";
$html.="<b>URL</b><div style='width:700px;overflow:auto'>$dt[url]</div>";
	$arr=json_decode($dt['parameter'],1); 
	if(!is_array($arr)){$arr=$dt['parameter'];}
$html.="<b>Parameter</b><div style='max-height:300px;width:700px;overflow:auto'><pre>".
	print_r($arr,1)."</pre></div>";
	$arr=json_decode($dt['response']); 
	if(!is_array($arr)){$arr=$dt['response'];}
$html.="<b>Respon</b><div style='max-height:300px;width:700px;overflow:auto'><pre>".
	print_r($arr,1)."</pre></div>";
$respon['title']='Detail API';
$respon['html']="<div style='max-height:400px;width:800px;overflow:auto'>".$html."</div>";

$warning = ob_get_contents();
ob_end_clean();
if($warning!=''){
	$respon['warning']=$warning;     
}
$respon['status']=true;
if(isset($respon)){ 
	echo json_encode($respon);
}else{
	echo json_encode(array());
}