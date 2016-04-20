<?php 
if (  function_exists('logFile')){ logFile('view/member/data','deposit_data.php','data'); };
ob_start();
//api_data
$respon=array( 'draw'=>isset($_POST['draw'])?$_POST['draw']:1);
 
$sql="select count(id) c from mujur_flowlog where 	types='deposit'";
$dt=$this->db->query($sql)->row_array();
$respon['recordsTotal']=$dt['c'];
$respon['recordsFiltered']=$dt['c']; //karena tidak ada filter?!

$start=isset($post0['start'])?$post0['start']:0;
$limit=isset($post0['length'])?$post0['length']:11;
$data=array();
   $order="order by created desc";
$sql="select * from mujur_flowlog where 	
types='deposit' $order limit $start,$limit";
$dt=$this->db->query($sql)->result_array();
foreach($dt as $row){
	//$row['url']=substr($row['rawUrl'],0,30);
	//$row['param']=substr($row['rawParam'],0,30);
	$row['raw']=json_decode($row['param']);
	if(!isset($row['raw']->username)){
		$row['raw']->username='-';
		$row['status']=-1;
	}	
	$row['action']=$row['status']==0?'<input type="button" onclick="depositApprove('.
	  $row['id'].');" value="approved" />
	  <input type="button" onclick="depositCancel('.
	  $row['id'].');" value="Cancel" />':'--';
	$status0=$row['status']==0?'open':'close';
	if($row['status']==1){
		$status0="approved";
	}
	
	if($row['status']==2){
		$status0="cancel";
	}
	$row['detail']=$row['raw']->namerek."<br/>".$row['raw']->bank ." (".$row['raw']->norek.")" ;
	
	$row['status']=$status0;
	//unset($row['param']);
	if($row['raw']->order1 != $row['raw']->orderDeposit* $row['raw']->rate){
		$row['raw']->order1=  $row['raw']->orderDeposit* $row['raw']->rate;
	}
	$row['raw']->orderDeposit ='$'.number_format($row['raw']->orderDeposit).'<br/>Rp'.number_format($row['raw']->order1) .'<br/>Rate Rp'.number_format($row['raw']->rate);
	$row['flowid']=sprintf("%s%04s",date("ymd",strtotime($row['created']) ),$row['id']);
	$data[]=$row;
}

$respon['data']=$data;
$respon['-']=$post0; 
//echo '<pre>'.print_r($data,1);die();
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