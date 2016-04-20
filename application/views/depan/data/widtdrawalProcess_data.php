<?php 
ob_start();
if (  function_exists('logFile')){ logFile('view/member/data','widtdrawalProcess_data.php','data'); };

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
		$vol=(int)$dt['raw']['orderWidtdrawal'];		
		$param['accountid']		=	$dt['raw']['accountid'];
		$param['volume']		=	"-".$vol;  			 
		$param['privatekey']	=	$this->forex->forexKey();
		$param['description']	= 	'Withdrawal';
				
		$url=$this->forex->forexUrl('updateBalance');
		$url.="?".http_build_query($param);
		$respon['server'][]=$tmp= _runApi($url );
		$param['description']	= 	'Widthdrawal';
		//echo $url;
 
		if((int)$tmp['responsecode']===2){
			$url0=$this->forex->forexUrl('update');	
			$param2=array();
			$param2['accountid']=$dt['raw']['accountid'];
			$param2['allowlogin']	= 1;
			$param2['allowtrading']	= 1;
			$param2['privatekey']	=$this->forex->forexKey();
			$url0.="?".http_build_query($param2);
			$respon['server'][]=$tmp= _runApi($url0 );
			$respon['server'][]=$tmp= _runApi($url );
		}
  
		if((int)$tmp['responsecode']===2 ){
			$sql="update mujur_flowlog set status=2 where id=$id";
			dbQuery($sql,1);
			$dt['statusConfirm']="Disapprove";
			$this->load->view('member/email/emailWidtdrawalDisapprove_view',$dt);
			logCreate('widtdrawal disapprove');
		}
		else{ 
			$param['volume']		=	"-".$vol; 
			$url=$this->forex->forexUrl('updateBalance');
			$url.="?".http_build_query($param);
			//$respon['server'][]=$tmp= _runApi($url );
			
			if((int)$tmp['responsecode']===0){ 
				$this->load->view('member/email/emailWidtdrawalApprove_view',$dt);
				$sql="update mujur_flowlog set status=1 where id=$id";
				dbQuery($sql,1);
				logCreate('widtdrawal Approve');
			}
			else{ 
				logCreate('widtdrawal Canceled');
				
			}
		}
		
	}
	else{
		$sql="update mujur_flowlog set status=2 where id=$id";
		dbQuery($sql,1);
		$this->load->view('member/email/emailWidtdrawalDisapprove_view',$dt);
		logCreate('widtdrawal disapprove');
	}
	
}
else{}	
 
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
