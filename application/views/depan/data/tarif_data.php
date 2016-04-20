<?php 
if (   function_exists('logFile')){ logFile('view/member/data','tarif_data.php','data'); };
ob_start();
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
$sql="select count(id) c from mujur_price";
$dt=$this->db->query($sql)->row_array();
$respon['recordsTotal']=$dt['c'];
$respon['recordsFiltered']=$dt['c']; //karena tidak ada filter?!

$start=$post0['start'];
$limit=$post0['length'];
$data=array();
$colums=array('created','types','price','created');
$ordertype=strtolower($post0['order'][0]['dir']);
$ordertype=$ordertype=='asc'?'desc':'asc';
$i= $post0['order'][0]['column'];
$ordername=$colums[$i];
   $order="order by $ordername $ordertype";
$sql="select id, types,price,created from mujur_price $order limit $start,$limit";
$dt=$this->db->query($sql)->result_array();
foreach($dt as $row){
	$row['price1']=number_format($row['price']); 
	$data[]=$row;
}

$respon['data']=$data;
$respon['-']=$sql; 

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