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
$this->param['deposit']=$dt;
//======KIRIM EMAIL
$this->load->view('member/email/emailDepositStatus_view',$dt);
			
if(isset($_POST['status'])){
	if($_POST['status']=='approve'){
		$sql="update mujur_flowlog set status=1 where id=$id";
	}else{
		$sql="update mujur_flowlog set status=2 where id=$id";
	}
	dbQuery($sql,1);
}else{}	
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