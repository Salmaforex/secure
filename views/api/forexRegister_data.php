<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$succes=false;
 
$register=$this->forex->regisAll(30);
logCreate($register);
$data=array();
foreach($register as $row){
	$dt=$this->forex->regisDetail($row['id']);
	logCreate("register ".json_encode($dt));	
	if($dt['status']!=1) continue;
	$arr=array( 'raw'=>$dt);
//=================send
	$url=$this->forex->forexUrl();
	
	$param=array( );
	$param['privatekey']	=$this->forex->forexKey();
	//username 
	$param['username']	=$dt['username'];	
	$param['address']	=$dt['address'];	
	$param['zip_code']	=$dt['zipcode'];	
	$param['email']		=$dt['email'];
	$param['country']	=$dt['country']['name'];
	$param['phone']		=$dt['phone'];
	$param['agentid']	=$dt['agent'];	
 
	$url.="?".http_build_query($param);
	$arr['param']=$param;
	$arr['url']=$url;
	$result0= _runApi($url );
	if(isset($result0['status'])&&isset($result0['code'])&&$result0['status']==1&&$result0['code']==9){
		$result=(array)$result0['data'];
	}
	else{
		$result=$result0;		
	}
	
	if(isset($result['responsecode'])&&(int)$result['responsecode']==0){
		$id=$this->forex->accountActivation($row['id'],$result);
		$arr['accountActivation']=$id; 
		logCreate('url:'.$this->forex->forexUrl().'|respon:'.print_r($result,1)	.'|url:'.$url, 
			'info');
/*
		PENGIRIMAN EMAIL ==> PENDING
*/			
	}
	else{ 
		$arr['accountActivation']=false;
		$num=isset($result['responsecode'])?$result['responsecode']:'unknown';
		if(lang('resApi_'.$num)=='')$num='unknown';
		logCreate('num:'.$num.' |message:'.lang('resApi_'.$num),'error');
		logCreate('url:'.$this->forex->forexUrl().'|respon:'.print_r($result,1).'|url:'.$url, 
			'error');
		
	}
	
	$arr['result']=$result;	
	$data[]=$arr;
}


$succes=true;

$content=ob_get_contents();
ob_end_clean();

$result=array(
	'body'=>$content, 
	'data'=>$data, 
);

//==========IF OK
if($succes===true)
	$result['succes']=true;

echo json_encode($result);