<?php
ob_start();
	$responce=array('post'=>$post);
	$responce['detail']=$detail=$this->forex->accountDetail($post['username'],'username');
	if($detail!==false){
		if($detail['masterpassword']==''){
			$responce['code']=9;
			$sql="select password from {$this->forex->tablePassword} order by rand() limit 2";
			$data=dbFetch($sql);
			$invPass=$data[0]['password'];
			$masterPass=$data[1]['password'];
			
			$param=array( );
			
			$param['accountid']=$detail['accountid'];
			$param['masterpassword']=$masterPass.($detail['accountid']%100000 +19939);
			$param['investorpassword']=$invPass.($detail['accountid'] %100000 +19919) ;
			
			$data = array(
				'investorpassword' => md5( $param['investorpassword'] ),
				'masterpassword'=>md5( $param['masterpassword'] )
			);
			$where = "id=".(int)$detail['id'];
			 
			$param['privatekey']	=$this->forex->forexKey();
			
			$url=$this->forex->forexUrl('update');
			$url.="?".http_build_query($param);
			 
			$result0= _runApi($url );
			logCreate("update password result:".print_r($result0,1));
			
			$sql = $this->db->update_string($this->forex->tableAccount, $data, $where);
			dbQuery($sql,1); 
			
			$param2=array( 
				'username'=>$detail['username'],
				'masterpassword'=>$param['masterpassword'],
				'investorpassword'=>$param['investorpassword'],
				'email'=>$detail['email']
			);
			$param2['emailAdmin']=$this->forex->emailAdmin;
			
			$this->load->view('member/email/emailAccount_view',$param2);
			$responce['error']='Your password have been update. Please Check Your Email ('.$detail['email'].')';
		}
		else{ 
			$ok=1;
		}
		
		if($ok==1){
			if(md5($post['password'])==$detail['masterpassword']){
			$responce['error']=false;
			$array=array( 
				'username'=>$post['username'],
				'password'=>md5($post['password'])
			);
			$this->session->set_userdata($array);
			
			}
			else{
				$responce['error']='Please Check Your Username and Password';			
			}
		}else{}
		
		unset($responce['detail']);
	}
	else{ 
		$responce['error']='Unknown account';
	}
$warning = ob_get_contents();
ob_end_clean();
if($warning!=''){
	$responce['warning']=$warning;     
}

if($responce['error']===false){
	$responce['result']=array(
		'message'=>'Klik to continue',
		'title'=>'Welcome',
		'status'=>true
	);
	
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


$responce['-']=$_SERVER;
logCreate($responce);
if(isset($responce['result'])){ 
	echo json_encode($responce['result']);
}else{
	echo json_encode(array());
}