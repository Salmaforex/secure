<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?><div style='margin:100px auto;width:300px;font-size:200%'><?php 
if(isset($post['kode'])){
	if($post['kode']!=''){
		$kode0=base64_decode($post['kode']);  //===echo $kode0."<br/>";
		$ar0=json_decode($kode0,true);
		$ar=explode(";",$ar0['raw']); //===echo "<pre>".print_r($ar,1)."</pre><br>";
		$activecode=$ar[1];
		$data=$this->forex->activationDetail($post['kode'],'code'); //===echo  
		if(!isset($res)&&$data['status']!=0){
			$res= lang('forex_code_used');
			logCreate('forex code has been use code id:'.$post['kode']."|data:".print_r($data,1),'error');
			$dataRegis=$this->forex->regisDetail($data['userid']); 
			if($dataRegis['status']!=0){
				$idActivation=$this->forex->accountActivation($data['userid'],$ar0['raw']);
				?><script>window.location.href ="<?=base_url()."forex/activation/{$idActivation}";?>";</script><?php 
			}else{} 
			
		} 
		
		if(!isset($res)&&$data['expired']< date("Y-m-d H:i:s") ){
			$res= lang('forex_expired');
			$dataRegis=$this->forex->regisDetail($data['userid']); 
			//===echo "regis:<pre>".print_r($data,1)."</pre><br>";
			logCreate('forex code has been expire id:'.$post['kode']."|data:".print_r($data,1),'error');
			$idActivation=$this->forex->accountActivation($data['userid'],$ar0['raw']);
			//===echo "<br>id=$idActivation";
			?><script>window.location.href ="<?=base_url()."forex/activation/{$idActivation}";?>";</script><?php 
		}
		
		if(!isset($res)){
			$dataRegis=$this->forex->regisDetail($data['userid']); 
			//===echo "regis:<pre>".print_r($data,1)."</pre><br>";
			if(!isset($res)&&$dataRegis['status']!=2){
				$res=lang('forex_activation_not_valid');
				logCreate('Regis status not valid data:'.print_r($dataRegis,1),'error');
			}
			else{
				
				//===echo "Update activation<br/>";
			}
		}	
		
 	
		if(!isset($res)){
			$url=$this->forex->forexUrl('activation');
			$param=array( );
			$param['email']=$dataRegis['email'];
			$param['activecode']=$activecode;
			
			$url.="?".http_build_query($param);//===echo $url."<br>";
			$result= _runApi($url );	//===echo print_r($result,1)."<br>";
			if(!isset($res)&&(int)$result==25){
				logCreate('not valid code url:'.$url,'error');
				logCreate('url:'.$url.'|respon:'.$result,'error');
				$res=lang('forex_activation_not_valid');
			}
			
			if(!isset($res)&&(int)$result==99){
				logCreate('Account had been actived url:'.$url,'error');
				logCreate('url:'.$url.'|respon:'.$result,'error');
				$res=lang('forex_activation_account_active');
			}
			
			if(!isset($res)&&(int)$result==1){
				$this->forex->accountCreate($data['userid']);
				$res=lang('forex_done');
				$this->forex->activationUpdateUser($data['userid'], 2);
				$this->forex->activationUpdate( $data['id'], 1);
			}
			
			if(!isset($res)&&(int)$result!=1){
				$res=lang('forex_activation_not_valid');
				logCreate('url:'.$url.'|respon:'.$result,'error');
				logCreate('not valid url:'.$url,'error');
			}
		} 
		
		
 
		if(!isset($res)){
			//print lang('forex_done') ;
		}else{
			print  "<br/>".$res;
		}
	}else{
		
	}
	
}else{ 
	print lang('forex_wait');

}	
?>
</div>