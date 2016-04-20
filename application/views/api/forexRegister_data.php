<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
$succes=false;
$register=array();//$this->account->newAccountWithoutPassword(40,'where reg_status=1');
foreach($register as $row){
	$post=array('username'=>$row['username']);
	$params2=array('post'=>$post);
	$this->load->view('member/data/login_data',$params2);
} 

$register=$this->forex->regisAll(40,'where reg_status=1');
logCreate("register:".json_encode($register));
$data=array();
foreach($register as $row){
	$reg_id=$row['id'];
	$dt0=$this->forex->regisDetail($row['id']);
	if($dt0['status']!=1){
		logCreate("register id:".$row['id']."|status:".$dt0['status'],'info');
		continue;
	}
	else{
		logCreate("register id:".$row['id']."|".json_encode($dt0));	
	
	}
	
	$email=trim($dt0['email']);
	
	$account= $this->forex->accountDetail($email,'email');
	if(trim($email)==''){ //$account!==false||
		logCreate("register delete ($email) (empty):".print_r($account,1));
		$this->forex->regisDelete($dt0['email']);
		//die('--<pre>'.print_r($dt0,1).print_r($account,1));		
		continue;
		
	}
	else{ 
		logCreate("register email:($email)");
		if($email===NULL) logCreate("register email:(NULL)");
	}
	
	$arr=array( 'raw'=>$dt0);
	$dt=$dt0['detail'];
//=================send
	$url=$this->forex->forexUrl('register');
	
	$param=array( );
	$param['privatekey']	=$this->forex->forexKey();
//======Required 
	$param['username']	=   $dt0['detail']['firstname'];	
//======Optional	
	if($dt['address']!='')
		$param['address']	=$dt['address'];	
	if($dt['zipcode']!='')
		$param['zip_code']	=$dt['zipcode'];	
	if($dt['email']!='')
		$param['email']		=$dt['email'];
	if($dt['country']['name']!='')
		$param['country']	=$dt['country']['name'];
	if($dt['phone']!='')
		$param['phone']		=$dt['phone'];
	if($dt0['agent']!='')
		$param['agentid']	=$dt0['agent'];	
 
	$url.="?".http_build_query($param);
	$arr['param']=$param;
	$arr['url']=$url;
//--------- PERINTAH PEMBUATAN	
	logCreate("param:".print_r($param,1));
	$rawAccount=$this->account->detail($reg_id, 'reg_id');
	//apabila ada reg_id yang sama maka cancel	
		if($rawAccount!=false){
			logCreate("register not continue reg_id exist:".json_encode($rawAccount));
			continue;
		}
		else{
			$result0= _runApi($url );
		}
		
	if(isset($result0['status'])&&isset($result0['code'])&&$result0['status']==1&&$result0['code']==9){
		$result=(array)$result0['data'];
	}
	else{
		$result=$result0;		
	}

        if(isset($result['responsecode'])&& ((int)$result['responsecode']==7||(int)$result['responsecode']==5) ){
		logCreate("agent bermasalah?"); 
		//=================send
	   $url=$this->forex->forexUrl('register');
	
	   $param=array( );
	   $param['privatekey']	=$this->forex->forexKey();
//======Required 
	   $param['username']	=   $dt0['detail']['firstname'];	
//======Optional	
	   if($dt['address']!='')
		$param['address']	=$dt['address'];	
	   if($dt['zipcode']!='')
		$param['zip_code']	=$dt['zipcode'];	
	   if($dt['email']!='')
		$param['email']		=$dt['email'];
	   if($dt['country']['name']!='')
		$param['country']	=$dt['country']['name'];
	   if($dt['phone']!='')
		$param['phone']		=$dt['phone']; 
	   $url.="?".http_build_query($param);
           $result0= _runApi($url );
           if(isset($result0['status'])&&isset($result0['code'])&&$result0['status']==1&&$result0['code']==9){
		$result=(array)$result0['data'];logCreate("agent bermasalah V1 result:".print_r($result,1)); 
	   }
	   else{
		$result=$result0;logCreate("agent bermasalah?"); logCreate("agent bermasalah v2 result:".print_r($result,1)); 
	   }
	}
	
	if(isset($result['responsecode'])&&(int)$result['responsecode']==5){
		logCreate("delete Respon code 5");
		$this->forex->regisDelete($dt0['email'],5); 
		continue;
	}
	
	if(isset($result['responsecode'])&&(int)$result['responsecode']==8){
		logCreate("delete Respon code 8");
		$this->forex->regisDelete($dt0['email'],8); 
		continue;
	}
	
	if(isset($result['responsecode'])&&(int)$result['responsecode']==0){
		logCreate('register member |url:'.$this->forex->forexUrl().'|respon:'.print_r($result,1)	.'|url:'.$url, 
			'info');
		$id=$this->forex->accountActivation($row['id'],$result);
		$arr['accountActivation']=$id; 
 
	}
	else{ 
		$arr['accountActivation']=false;
		$num=isset($result['responsecode'])?$result['responsecode']:'unknown';
		if(lang('resApi_'.$num)=='')$num='unknown';
		logCreate('register member |num:'.$num.' |message:'.lang('resApi_'.$num),'error');
		logCreate('register member |url:'.$this->forex->forexUrl().'|respon:'.print_r($result,1).'|url:'.$url, 
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
//echo '<pre>'.print_r($result,1);