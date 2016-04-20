<?php
ob_start();
unset($post['detail']['detail']);
	$responce=array('post'=>$post);
	$responce['error']=false;
 
$data= $post['detail'] ;
foreach($post as $name=>$value){ 
		$data[$name]=$value;
}
 
unset($data['username']);
unset($data['rand']);
$responce['data']=json_encode($data);

	$sql="update `{$this->account->tableAccountDetail}` set detail='".
	addslashes(json_encode($data))."' where username like '$username'";
	dbQuery($sql);
$warning = ob_get_contents();
ob_end_clean();
if($warning!=''){
	$responce['warning']=$warning;     
}

if($responce['error']===false){
	$responce['result']=array(
		'message'=>'Klik to continue',
		'title'=>'Welcome',
		'status'=>true,
		'sql'=>$sql
		
	);
	$detail = $this->account->detail($username,'username'); 
		$param=array( );
		$param['privatekey']	=$this->forex->forexKey();
		$param['accountid']=(int)$detail['accountid'];
	 
		$param['allowlogin']=1;
		$param['allowtrading']=1;
		
		$param['username']=isset($detail['detail']['firstname'])&&isset($detail['detail']['lastname'])?utf8_encode("{$detail['detail']['firstname']} {$detail['detail']['lastname']}"):"";
		
		$param['address']=isset($detail['detail']['address'])?$detail['detail']['address']:"";
		$param['country']=isset($detail['detail']['country']['name'])?$detail['detail']['country']['name']:"";
		$param['zipcode']=isset($detail['detail']['zipcode'])?$detail['detail']['zipcode']:"";
		$param['phone']=  isset($detail['detail']['phone'])?$detail['detail']['phone']:"";
		$param['email']=  isset($detail['email'])?$detail['email']:"";
		
		$url=$this->forex->forexUrl('update');
		$url.="?".http_build_query($param);
		logCreate("update password param:".print_r($param,1)."|url:$url");
		$arr['param']=$param;
		$arr['url']=$url;
		$result0= _runApi($url );
		logCreate("update change detail:".print_r($result0,1));
	
}
else{
	$responce['result']=array(
		'message'=>$responce['error'],
		'status'=>false
	);
	if(isset($responce['code'])){
		$responce['result']['code']= $responce['code'];
	}else{}
}
 
//echo'<pre>';print_r($responce);die(); 
 
$responce['result']['raw']=$responce;
logCreate($responce);
if(isset($responce['result'])){ 
	echo json_encode($responce['result']);
}
else{
	echo json_encode(array());
}