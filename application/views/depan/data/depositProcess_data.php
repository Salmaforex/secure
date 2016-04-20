<?php 
if (  function_exists('logFile')){ logFile('view/member/data','depositProcess_data.php','data'); };
ob_start();
$respon['post']=$_POST;

$id=isset($_POST['id'])?addslashes($_POST['id']):0;
//================
$sql="select * from mujur_flowlog where id='$id'";

$dt=$this->db->query($sql)->row_array();
$dt['raw']=json_decode($dt['param'],1);
$dt['userlogin']= $dt['raw']['userlogin'];
$dt['statusConfirm']=$_POST['status'];
$dt['rate']['value']=$dt['raw']['rate'];
$this->param['deposit']=$dt;
//======KIRIM EMAIL 
			
if(isset($_POST['status'])){
	if($_POST['status']=='approve'){
		$param=array( );
		if(defined('_DEV_')){
			$param['dev']=true;
		}
		$vol=(int)$dt['raw']['orderDeposit'];		
		$param['accountid']		=	$dt['raw']['accountid'];
		//$param['volume']		=	$vol; 			 
		$param['privatekey']	=	$this->forex->forexKey();
		$param['description']	= 	'Deposit';
		
		$url=$this->forex->forexUrl('updateBalance');
		$url.="?".http_build_query($param)."&volume={$vol}+";
		$respon['server']=$tmp= _runApi($url );
		if((int)$tmp['responsecode']===0){
			logCreate('deposit Approve');
			$this->load->view('member/email/emailDepositApprove_view',$dt);//emailDepositStatus_view
			$sql="update mujur_flowlog set status=1 where id=$id";
			dbQuery($sql,1);
		}
		else{
			logCreate('deposit canceled');
		} 	
		
	}
	else{
		$sql="update mujur_flowlog set status=2 where id=$id";
		dbQuery($sql,1);
		logCreate('deposit disaproved');
		$this->load->view('member/email/emailDepositCancel_view',$dt);//emailDepositStatus_view
	}
	
}else{}	

//echo "\nData:".print_r($dt,1);
logCreate("data:".print_r($dt,1));
 
$warning = ob_get_contents();
ob_end_clean();
if($warning!=''){
	$respon['warning']=$warning;     
}
$respon['raw']=$this->param;
if(isset($respon)){ 
	echo json_encode($respon);
}else{
	echo json_encode(array());
}
