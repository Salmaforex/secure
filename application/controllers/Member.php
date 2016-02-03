<?php 
/*
Password untuk kotak surat admin02@salmaforex.com adalah ZL9EXgVoQZ


*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
	public $param;	
	  
	private function checkLogin(){
		$session=$this->param['session'];
		$detail=$this->forex->accountDetail($session['username'],'username');
		if($detail==false){
			logCreate('no username','error');
			redirect("login");			
		}
		else{ 
			
		}		
		if($session['password']==$detail['masterpassword']){			
			$array=array( 
				'username'=>$session['username'],
				'password'=>($session['password'])
			);
			$this->session->set_userdata($array);
			$this->param['detail']=$this->param['userlogin']=$detail;
		}
		else{
			logCreate('wrong password','error');
			redirect("login");			
		}
	}
	
	public function forgot(){
		$this->param['title']='Recover your Live Account'; 
		$this->param['content']=array(
			'modal',
			'forgot', 
		);
		$this->param['footerJS'][]='js/login.js';
		$this->showView(); 
	}
	public function listApi(){
		if(!defined('LOCAL')){
			$this->checkLogin();
		}
		$this->param['title']='List API'; 
		$this->param['content']=array(
			'modal',
			'api', 
		);
//datatables		
		$this->param['footerJS'][]='js/jquery.dataTables.min.js';
		$this->param['footerJS'][]='js/api.js';
		$this->param['fileCss']['dataTable']='css/jquery.dataTables.min.css';
		$this->showView(); 
	}
	
	public function tarif(){
		if(!defined('LOCAL')){
			$this->checkLogin();
		}
		if($this->input->post('rate')){
			$post= $this->input->post();
			$stat=$this->forex->rateUpdate($post);
			if($stat===false)die('error');
			redirect(base_url('member/tarif'));
			exit();
		}else{}
		$this->param['title']='Tarif'; 
		$this->param['content']=array(
			'modal',
			'tarif', 
		);
		$this->param['rate']=array(
			'mean'=>ceil( ($this->forex->rateNow('deposit')+$this->forex->rateNow('widtdrawal'))/2),
			'deposit'=>$this->forex->rateNow('deposit'),
			'widtdrawal'=>$this->forex->rateNow('widtdrawal')
		);
//datatables		
		$this->param['footerJS'][]='js/jquery.dataTables.min.js';
		$this->param['footerJS'][]='js/tarif.js';
		$this->param['fileCss']['dataTable']='css/jquery.dataTables.min.css';
		$this->showView(); 
	}
	
	public function logout()
	{
		$_SESSION['username']='';
		$_SESSION['password']='';
		redirect("login");
	}
	public function login()
	{
		$this->param['title']='OPEN LIVE ACCOUNT'; 
		$this->param['content']=array(
			'modal',
			'login', 
		);
		$this->param['footerJS'][]='js/login.js';
		$this->showView(); 
		
	}
	 
	public function detail()
	{
		$this->checkLogin();
		$this->param['title']='OPEN LIVE ACCOUNT'; 
		$this->param['content']=array(
			'detail', 
		);
		$this->param['footerJS'][]='js/login.js';
		$this->showView(); 
		
	}	
	
	public function deposit($status='none')
	{	
		$this->checkLogin();
		$this->param['content']=array();
		if($status=='done'){
			$this->param['content'][]='done' ;
		}
		if($this->input->post('orderDeposit')){
			$this->param['post0']=$post0=$this->input->post();
			$this->param['rate']=$rate=$this->forex->rateNow('deposit');
			$data=array( 'url'=>'Deposit',
				'parameter'=>json_encode($post0),
				'error'=>2,
				'response'=>"rate:$rate\n".print_r($this->param['userlogin'],1)
			);
			$this->db->insert('mujur_api',$data);
			
			$data=$post0;
			$data['userlogin']=$this->param['userlogin'];
			$data['rate']=$rate;
			$this->forex->flowInsert('deposit', $data);
			$this->param['emailAdmin']='admin@secure.salmaforex.com';
			
			//kirim email 1
			$this->load->view('member/email/emailDepositAdmin_view',$this->param);			
			//kirim email 2
			$this->load->view('member/email/emailDepositMember_view',$this->param);
			redirect(site_url('member/deposit/done'));
		}
		else{ 
			$this->param['title']='OPEN LIVE ACCOUNT'; 
			$this->param['content'][]='deposit' ;
		}
		$this->param['footerJS'][]='js/login.js';
		$this->showView(); 
		
	}	
	public function withdrawal()
	{
		$this->checkLogin();
		$this->param['title']='OPEN LIVE ACCOUNT'; 
		$this->param['content']=array(
			'widtdrawal', 
		);
		$this->param['footerJS'][]='js/login.js';
		$this->showView(); 
		
	}	
		
	function __CONSTRUCT(){
	parent::__construct(); 
		
		date_default_timezone_set('Asia/Jakarta');
		$this->param['today']=date('Y-m-d');
		$this->param['folder']='member/';
		$this->load->helper('form');
		$this->load->helper('formtable');
		$this->load->helper('language');
		$this->load->helper('api');
		$this->load->helper('db');
		$this->load->model('forex_model','forex');
		$this->load->model('country_model','country');
		$defaultLang="english";
		$this->lang->load('forex', $defaultLang);
		$this->param['fileCss']=array(	
			'css/style.css',
			'contact-form-7-css'=>'css/salmaforex/style.css', 
			'rs-plugin-settings-css'=>'css/salmaforex/settings.css',
			'wpt-custom-login-css'=>'css/salmaforex/custom-login.css',
			'theme-bootstrap-css'	=>	'css/envision/bootstrap.css',					
			'theme-frontend-style-css'	=>	'css/envision/style.css?ver=384753e655020ba892b1123f6ddf06b2',
			'theme-frontend-extensions-css'	=>			'css/envision/extensions.css',
			'theme-bootstrap-responsive-css'	=>		'css/envision/bootstrap-responsive.css',
			'theme-bootstrap-responsive-1170-css'	=>	'css/envision/bootstrap-responsive-1170.css',
			'theme-frontend-responsive-css'	=>			'css/envision/responsive.css',
			'ttheme-fontawesome-css'	=>				'css/module.fontawesome/source/css/font-awesome.min.css',	
			'theme-icomoon-css'	=>			'css/module.fontawesome/source/css/font-awesome.min.css',
			'theme-skin'	=>				'css/Dark-Blue-Skin_cf846b6937291eb00e63741d95d1ce40.css',
			'css/cupertino/jquery-ui-1.10.3.custom.min.css',
		);
		$this->param['fileJs']=array(
			'js/jquery-1.11.3.js',
			'js/jquery-migrate.min.js',
			'js/rs-plugin/js/jquery.themepunch.tools.min.js',
			'js/rs-plugin/js/jquery.themepunch.revolution.min.js',
			
		);
		
		$this->param['shortlink']=site_url();
		$this->param['footerJS']=array(			
			'js/envision-2.0.9.4/lib/js/common.js',
			'js/envision-2.0.9.4/lib/js/modernizr-2.6.2-respond-1.1.0.min.js',
			'js/envision-2.0.9.4/lib/js/noconflict.js',
			'js/envision-2.0.9.4/cloudfw/js/webfont.js',
			'js/envision-2.0.9.4/lib/js/jquery.prettyPhoto.js',
			'js/envision-2.0.9.4/lib/js/extensions.js',
			'js/envision-2.0.9.4/lib/js/retina.js',
			'js/envision-2.0.9.4/lib/js/queryloader2.js',
			'js/envision-2.0.9.4/lib/js/waypoints.min.js',
			'js/envision-2.0.9.4/lib/js/waypoints-sticky.js',
			'js/envision-2.0.9.4/lib/js/jquery.viewport.mini.js',
			'js/envision-2.0.9.4/lib/js/jquery.flexslider.js',		
			'js/jquery-ui-1.9.2.min.js',			
			'js/bootstrap.js',
			'js/forex.js',	
			
		);
 
		$this->param['description']="Trade now with the best and most transparent forex STP broker";
		 
		$this->param['session']=$this->session-> all_userdata(); 
		if($this->input->post())
			logCreate($this->input->post(),'post');
	}
	
}