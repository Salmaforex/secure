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
	$arr=array('r'=>$row,'raw'=>$dt);
//=================send
	$url=$this->forex->forexUrl();
	
	$param=array( );
	$param['privatekey']	=isset($dt['lastname'])?$dt['lastname']:'';
	//username 
	$param['username']	=$dt['username'];
	$param['email']		=$dt['email'];
	$param['address']	=$dt['address'];	
	$param['zip_code']	=$dt['zipcode'];	
	$param['country']=$dt['country']['name'];
	
	 
phone
agentid


	$param['password']	=$dt['password'];
	$param['countrycode']=$dt['country']['code'];
	$param['currencycode']='USD';
	$param['ip']		=$_SERVER['SERVER_ADDR'];
	$param['tel']		=$dt['phone'];
	$param['phonetype']	=1;
	$param['accountType']=2;
	$param['isfxflg']=1;
	$param['isdemoflg']=$this->forex->demo;
	$param['isntdindexflg']=0;
	$param['isntdcfdflg']=0;
	$param['wlcode']	='NFX';
	$param['displayLanguage']='EN';
	$param['ibcustid']=	(int)$dt['username'];
	$param['amsgroup']	='NFX_Salma';
	$param['fxgroup']	='NFXSalma_USD';
	$url.="?".http_build_query($param);
	
	$arr['url']=$url;
	$result= _runApi($url );
	
	if((int)$result['responsecode']==0){
		$id=$this->forex->accountActivation($row['id'],$result);
		$arr['accountActivation']=$id;
		logCreate('url:'.$this->forex->forexUrl().'|respon:'.print_r($result,1)	.'|url:'.$url, 
			'info');
	}
	else{ 
		$arr['accountCreate']=false;
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