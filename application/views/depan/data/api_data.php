<?php 
ob_start();
if ( function_exists('logFile')){ logFile('view/member/data','api_data.php','data'); };
//api_data
$respon=array( 'draw'=>$_POST['draw']);
/*
{
  "draw": 1,
  "recordsTotal": 57,
  "recordsFiltered": 57,
  "data": [
    {
*/
$sql="select count(id) c from mujur_api";
$dt=$this->db->query($sql)->row_array();
$respon['recordsTotal']=$dt['c'];
$respon['recordsFiltered']=$dt['c']; //karena tidak ada filter?!

$start=$post0['start'];
$limit=$post0['length'];
$data=array();
   $order="order by created desc";
$sql="select id,url rawUrl,parameter rawParam,created from mujur_api $order limit $start,$limit";
$dt=$this->db->query($sql)->result_array();
foreach($dt as $row){
	$row['url']=substr($row['rawUrl'],0,30);
	$row['param']=substr($row['rawParam'],0,30);
	$data[]=$row;
}

$respon['data']=$data;
$respon['-']=$post0; 

$warning = ob_get_contents();
ob_end_clean();
if($warning!=''){
	$respon['warning']=$warning;     
}

if(isset($respon)){ 
	echo json_encode($respon);
}else{
	echo json_encode(array());
}