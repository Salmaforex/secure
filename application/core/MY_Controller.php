<?php 

 class MY_Controller extends CI_Controller {
	function __CONSTRUCT(){
		parent::__construct(); 
		$this->load->library('session');
	}
	public function runApi(){
		$url=$this->config->item('api_url');		
		$param['app_code']='9912310';
		$param['module']='forex';
		$param['task']='register';
		$result=_runApi($url, $param);
		//echo 'run:'.$url.'<pre>';
		//var_dump($result);
	} 
	
	public function data()
	{
		$url=$this->config->item('api_url');
		$this->load->helper('api');
		$respon=array(		
			'html'=>print_r($_REQUEST,1), 
		);
		$type=$this->input->post('type','unknown'); 
		if($type=='unknown'||$type=='')$type=$this->input->get('type','unknown');
		$message='unknown data type';
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
				$this->errorMessage('267',$message);
			}
		}
		else{
			logCreate("unknown :".$open);
		}
		
		if(!isset($ok)){
			$this->errorMessage('266',$message);
		}
		
		$this->succesMessage($respon);
	}
	
	protected function convertData()
	{
	$post=array();
		if(is_array($this->input->post('data'))){
			foreach($this->input->post('data') as $data){
				$post[$data['name']]=$data['value'];
			}
		}else{}
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
			//	$respon=$this->modelku->$function($param );
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
	
	protected function succesMessage($respon)
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
	
	protected function errorMessage($code, $message,$data=array())
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
	 
	protected function showView(){
		$name=$this->uri->segment(2,'');		
		if($name!=''){
			$jsScript=$this->param['folder'].$this->uri->segment(2).".js";
			$this->param['dataUrl']=  $this->uri->segment(1). "_".$name;
			$this->param['script']=$this->param['type']=$name;
			
			//$this->param['openScript']=$jsScript;
			//logCreate('open script:'.$jsScript.'|data:'. $this->uri->segment(1)."_".$name  );
			
			if(isset($this->param['content'])&&!is_array($this->param['content'])){
				$this->param['load_view']= 
					$this->param['folder'].$this->param['content'].'_view';
				
			}else{}
			//$this->checkView( $this->param['load_view'] );
			
		}else{ 
			//$controller=$this->uri->segment(1);
			//if($controller=='')$controller='forex';
			//redirect(base_url().$controller."/index","refresh");	
		}
		 
		$this->load->view('base_view', $this->param);
	
	}
	 
 }