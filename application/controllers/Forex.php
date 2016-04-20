<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/***
Daftar Fungsi Yang Tersedia :
*	registerApi($stat=1)
*	error404()
*	deposit_value()
*	widtdrawal_value()
*	register($raw=false,$agent=false)
*	agent()
*	index()
*	data()
*	convertData()
*	api()
*	succesMessage($respon)
*	errorMessage($code, $message,$data=array())
*	showView()
*	__CONSTRUCT()
*	fake($status='none')
***/
class Forex extends CI_Controller {
	public $param;	
	public function registerApi($stat=1){
		log_message('register Api in session');
		$tmp=$this->load->view('api/forexRegister_data',$this->param,true);
		$res=json_decode($tmp, true); 
		if($stat==1)
			print_r($res);
	}
	
	public function error404(){
		logCreate('error 404 link:'.current_url());
		die('unknown link');
		//redirect(base_url('member'));
	}
	
	public function deposit_value()	
	{
		$def=14000;
		$res=$this->forex->rateNow('deposit');
		if(isset($res['value'])){
			$def=$res['value'];
		}else{}
		echo $def;
		exit();
	}
	
	public function widtdrawal_value()	
	{
		$def=13000;
		$res=$this->forex->rateNow('widtdrawal');
		if(isset($res['value'])){
			$def=$res['value'];
		}else{}
		echo $def;
		exit();
	}
	
	public function register($raw=false,$agent=false)
	{
		redirect(base_url('welcome'),1);
		$this->load->library('session');
		$this->param['statAccount']='member';
		if($agent!=false){
			$this->param['fullregis']=true;
			$this->param['statAccount']='agent';
		}
		
		if($raw!='0'){
			$ar=explode("-",$raw);
			logCreate("agent ref:$raw id:{$ar[0]}","info");
			$num=trim($ar[0]);
			$this->session->set_flashdata('agent', $num);
			redirect(base_url('forex/register'),1);
			exit();
		}
		else{
			$num=$info=$this->session->flashdata('agent');
			$this->param['agent']=$num!=''?$num:'';
		}
		$this->param['title']='OPEN LIVE ACCOUNT'; 
		if(!isset($this->param['formTitle'])) 
			$this->param['formTitle']=$this->param['title'];
		$this->param['content']=array(
			'modal',
			'form', 
		);
		$this->showView(); 
		
	}
	
	public function agent()
	{
		$this->param['formTitle']="Open Patner Account";
		$this->register(false,true);
	}
	
	public function index()
	{		
		redirect(base_url('welcome'));
		$this->register();
	}
	
	public function data()
	{
		$url=$this->config->item('api_url');
		$this->load->helper('api');
		$respon=array(		
			'html'=>print_r($_REQUEST,1), 
		);
		$type=$this->input->post('type','unknown'); 
		$message='unknown data type';
		$raw=$this->convertData(); 
		
		if($type=='request'){
			$respon['title']='NEW LIVE ACCOUNT (CREATED)';
			if($raw['statusMember']=='AGENT'){
				$respon['title']='NEW PATNER ACCOUNT (CREATED)';
			}
			$param['data']=$this->convertData();
			$stat=$this->forex->saveData($param['data'],$message);

			if($stat!==false){
				
				$respon['html']="Your Opening Live Account Was Sent Successfully. Please Check your Email in few minutes. Thanks.<br/>
				Pembukaan Akun Tranding Anda telah Sukses. Silahkan Cek Kembali Email Anda beberapa saat lagi";
				$ok=1;
				if($raw['statusMember']=='AGENT'){
					$respon['html']='Your Opening Patner Account Was Sent Successfully. Please Check your Email in few minutes. Thanks.<br/>
				Pembukaan Akun Patner Anda telah Sukses. Silahkan Cek Kembali Email Anda beberapa saat lagi';
				}
				$url=$this->config->item('api_url');		
				$param['app_code']=$this->config->item('app_code')[0];
				$param['module']='forex';
				$param['task']='register';
//-------------------TESTED				
				$result=_runApi($url, $param); //test
				$this->registerApi(0);
			}
		}
		
		$open= $this->param['folder']."data/".$type."_data";
		if(is_file('views/'.$open.".php")){
			$param=array(
				'post'=>$this->convertData(),
				'get'=>$this->input->get(),
				'post0'=>$this->input->post()
			);
			$raw=$this->load->view($open, $param, true);
			$ar=json_decode($raw,true);
			if(is_array($ar)){
				$respon=$ar;				
				logCreate($respon);
				if(!isset($respon['status'])){ 
					echo json_encode($respon);exit(); 
				}
				if($respon['status']==true){
					$ok=1;
				}
				else{
					$message=$respon['message'];
				}
			}
			else{
				logCreate("unknown :".htmlentities($raw));
				$this->errorMessage('267',$raw,$message);
			}
		
		}
		if(!isset($ok)){
			$this->errorMessage('266',$message);
		}
		
		$this->succesMessage($respon);
	}
	
	private function convertData()
	{
	$post=array();
		if( $this->input->post('data') ){
			foreach($this->input->post('data') as $data){
				$post[$data['name']]=$data['value'];
			}
		}
		return $post;
	}
	
	public function api()
	{		
		$module=$this->input->post('module');
		$task=$this->input->post('task');
		$appcode=$this->input->post('app_code');
		$aAppcode=$this->config->item('app_code');
		if(array_search($appcode, $aAppcode)!==false){
			$this->load->model('forex_model','modelku');
			$param=$this->input->post('data');
			$function= strtolower($module ).ucfirst(strtolower($task )); 
			$file='views/api/'.$function.'_data.php';
			if(is_file($file)){
				$res =$this->load->view('api/'.$function.'_data', $param,true);
				$respon=json_decode($res,1);
			}else{ 
				$this->errorMessage('277','unknown action');
			}
		}else{ 
			$this->errorMessage('276','unknown app code');
		}
		
		if(isset($respon['succes'])){	
			$this->succesMessage($respon);
		}else{ 
			$respon=array( 
				'raw'=>$res,
				'req'=>$_REQUEST
			);
			$this->errorMessage('334','unknown error',$respon );
		}
	}
	
	private function succesMessage($respon)
	{
		echo json_encode(
		  array(
			'status'=>true,
			'code'=>9, 
			'data'=>$respon,
			'message'=>'succes'
		  )
		);
		
		exit();	
	}
	
	private function errorMessage($code, $message,$data=array())
	{
		$json=array(
			'status'=>false,
			'code'=>$code, 
			'message'=>$message 
		  );
		  
		if(count($data)!=0) 
			$json['data']=$data;
		
		echo json_encode($json);
		logCreate($json,"error");
		
		exit();
	}
	 
	private function showView(){
		$name=$this->uri->segment(2,'');		
		if($name!=''){
			$jsScript=$this->param['folder'].$this->uri->segment(2).".js";
			$this->param['dataUrl']=  $this->uri->segment(1). "_".$name;
			$this->param['script']=$this->param['type']=$name;
			
			$this->param['openScript']=$jsScript;
 			
			if(isset($this->param['content'])&&!is_array($this->param['content'])){
				$this->param['load_view']= 
					$this->param['folder'].$this->param['content'].'_view';
				
			}else{}
 			
		}else{ 
			$controller=$this->uri->segment(1);
			if($controller=='')$controller='forex';
			redirect(base_url().$controller."/index","refresh");	
		}
		 
		$this->load->view('base_view', $this->param);
	
	}
	
	function __CONSTRUCT(){
	parent::__construct(); 
		
		date_default_timezone_set('Asia/Jakarta');
		$this->param['today']=date('Y-m-d');
		$this->param['folder']='forex/';
		$this->load->helper('form');
		$this->load->helper('formtable');
		$this->load->helper('language');
		$this->load->helper('api');
		$this->load->helper('db');
		$this->load->model('forex_model','forex');
		$this->load->model('account_model','account');
		$this->load->model('country_model','country');
		$defaultLang="english";
		$this->lang->load('forex', $defaultLang);
		$this->param['fileCss']=array(	
			 
		);
		$this->param['fileJs']=array(
			
		);
		
		$this->param['shortlink']=base_url();
		$this->param['footerJS']=array(			
			
		);
 
		$this->param['description']="Trade now with the best and most transparent forex STP broker";
		 
		$this->param['emailAdmin']=$this->forex->emailAdmin; 
		 
		if($this->input->post())
			logCreate($this->input->post(),'post');
	}
	
	public function fake($status='none')
	{ 
		if(!defined('LOCAL')){
			redirect(site_url());
		}
		if($this->input->get('privatekey')!=$this->forex->forexKey()){
			$message="there is nothing to see but us tree";
			$this->errorMessage('341',$message);
		}
		
		if(defined('LOCAL')){
			if($status=='none'){
				$res=array(
					'responsecode'=>0,
					'accountid'=>'9'.date("Ymdhis"),
					'masterpassword'=>date("his"),
					'investorpassword'=>date("dmy"),
				);//$res= "1;11001724"; 
				 
			}
			
			if($status=='activation'){
				$res="1";
			}
			if($status=='update'){
				$res="0";
			}
			if($status=='updateBalance'){
				$res="0";
			}
			$raw=array();
		/*	
			if(!isset($res)){ 
				$res='1;11001724'; 
				
				$id=$this->forex->accountActivation(5,$raw);
				$res.="id:$id";
			}
			$this->succesMessage($res);
		*/
			echo json_encode($res);
		}else{ 
			echo "no respond";
		}
	}
	
	 
}