<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
/***
Daftar Fungsi Yang Tersedia :
*	index()
*	member()
*	__CONSTRUCT()
***/
	public $param;	
	function index(){
		redirect(base_url("login/member"));
	}
	
	function member(){
		$this->param['title']='OPEN LIVE ACCOUNT'; 
		$this->param['content']=array(
			'modal',
			'login', 
		);
		//$this->param['footerJS'][]='js/login.js';
		$this->showView('newbase_view'); 
	 
	}
	
	function process(){
		$captcha_answer = $this->input->post('g-recaptcha-response');
		$post=$this->input->post();
		
		if(!defined('LOCAL')){
		// Verifikasi input recaptcha dari user
			$response = $this->recaptcha->verifyResponse($captcha_answer);
			logCreate('recaptcha:'.print_r($response,1),'info');
		}
		else{
			$response['success']=true;
		}
		// Proses
		var_dump($response);//die();
		if( $response['success']  ){
			// Code jika sukses
			echo 'CAPTCHA OK';
			$this->session->set_userdata('login', $post);
			redirect(base_url('member/loginProcess'),1);
		} 
		else{
			// Code jika gagal
			echo 'CAPTCHA ERROR';
			$post['message']='Make sure CAPTCHA success';
			$this->session->set_flashdata('login', $post);
			logCreate('parameter invalid','error');
			redirect($_SERVER['HTTP_REFERER'],1);
		}
	}
	function __CONSTRUCT(){
	parent::__construct();
//		logCreate('controller Login','info');
		$this->load->library('recaptcha');
		$this->load->library('session');
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
		$this->load->model('account_model','account');
		$defaultLang="english";
		$this->lang->load('forex', $defaultLang);
		$this->param['fileCss']=array(	
			'css/style.css',
			'css/bootstrap.css',
		);
		$this->param['fileJs']=array(
			'js/jquery-1.7.min.js',
		);
		
		$this->param['shortlink']=base_url();
		$this->param['footerJS']=array(	 
			'js/bootstrap.min.js',
			'js/formValidation.min.js',
			'js/scripts.js'
		);
		$this->param['description']="Trade now with the best and most transparent forex STP broker";
		
		$this->param['emailAdmin']=$this->forex->emailAdmin;
		
		$this->param['session']=$this->session-> all_userdata(); 
		$this->param['baseFolder']='depan/';
		if($this->input->post())
			logCreate($this->input->post(),'post');
		
		if($this->session->flashdata('login')){
			$this->param['login']=$this->session->flashdata('login');
			logCreate('session login valid','info');
			logCreate('detail login:'.print_r($this->param['login'],1));
		}else{}
	}
}