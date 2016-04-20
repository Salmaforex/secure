<?php 
ob_start();
$responce=array('post'=>$post);
$responce['error']=false;
$responce['detail']=$detail=$this->account->detail($post['email'],'email');
	if($detail!==false){
		$this->param['recoverid']=$this->account->recover($detail);
		$this->param['raw']=$detail;
		$raw=$this->load->view('member/email/emailRecover_view',$this->param,true);
	}
	else{ 
		$responce['error']="The Email Not Found in Our Database .  Please check your input.";
	}
	
if($responce['error']===false){
	$responce['result']=array(
		'raw'=>$raw,
		'detail'=>$detail,
		'message'=>'You Will receive an e-mail with instruction about how to recover your password in few minutes.',
		'title'=>'Your Request has been sent Successfully',
		'status'=>true
	);
	
}
else{
	$responce['result']=array(
		'message'=>$responce['error'],
		'status'=>false,
		'title'=>'Warning',
	);
	if(isset($responce['code'])){
		$responce['result']['code']= $responce['code'];
	}else{}
}
 
logCreate($responce);
if(isset($responce['result'])){ 
	echo json_encode($responce['result'] );
}else{
	echo json_encode(array());
}