<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forex_model extends CI_Model {
public $tableRegis='mujur_register'; 
public $tableWorld='mujur_country'; 
public $tableAccount='mujur_account';
public $tableAccountDetail='mujur_accountdetail';
public $tableActivation='mujur_activation';
public $tablePassword='mujur_password';
public $tableAdmin='mujur_admin';
public $tablePrice='mujur_price';
public $tableFlowlog='mujur_flowlog';
public $tableAPI='mujur_api';
public $url="http://localhost/forex/fake";
public $demo=1; 

public $emailAdmin='admin@secure.salmaforex.com';

	function forexUrl($name='default'){
		$url=$aAppcode=$this->config->item('urlForex');
		
		return isset($url[$name])?$url[$name]:false;
	}
	
	function forexKey(){
		$key=$this->config->item('forexKey');		
		return isset($key)?$key:false;
		
	}
//=================FLOW LOG
	function flowInsert($type='',$data=array() ){
		if(!$this->db->table_exists($this->tableFlowlog)){
				$fields = array(
				  'id'=>array( 
					'type' => 'BIGINT','auto_increment' => TRUE), 		   
				  'types'=>array( 
					'type' => 'VARCHAR',  
					'constraint' => '200'),
				  'param'=>array( 'type' => 'text'),				   
				  'created'=>array( 'type' => 'timestamp'),
				);
				$this->dbforge->add_field($fields);
				$this->dbforge->add_key('id', TRUE);
				$this->dbforge->create_table($this->tableFlowlog,TRUE);
				$str = $this->db->last_query();			 
				logConfig("create table:$str");
				$this->db->reset_query();	
				 
			}
		if($type=='')return false;
		$dt=array('types'=>$type);
		$dt['param']=json_encode($data);
		$this->db->insert($this->tableFlowlog,$dt);
		return true;
	}
//=================Rate	
	function rateUpdate($raw){
		$data=array( 
			'types'=>$raw['types'],
			'price'=>$raw['rate']
		);
		if($raw['types']==''||$raw['rate']=='') return false;
		$rate0=$this->rateNow($raw['type']);
		$this->db->insert($this->tablePrice,$data);
		
		$data=array( 'url'=>'updateRate',
				'parameter'=>json_encode($data),
				'error'=>2,
				'response'=>"rate0:$rate0\nuser:".print_r($this->param['userlogin'],1)
			);
		$this->db->insert($this->tableAPI,$data);
	}

	function rateNow($types=''){
//==========Menambah mujur_price
			if(!$this->db->table_exists($this->tablePrice)){
				$fields = array(
				  'id'=>array( 
					'type' => 'BIGINT','auto_increment' => TRUE), 		   
				  'types'=>array( 
					'type' => 'VARCHAR',  
					'constraint' => '200'),
				  'price'=>array( 'type' => 'integer'),				   
				  'created'=>array( 'type' => 'timestamp'),
				);
				$this->dbforge->add_field($fields);
				$this->dbforge->add_key('id', TRUE);
				$this->dbforge->create_table($this->tablePrice,TRUE);
				$str = $this->db->last_query();			 
				logConfig("create table:$str");
				$this->db->reset_query();	
				$this->db->insert('mujur_price', 
					array('types'=>'deposit', 'price'=>14000));
				$this->db->insert('mujur_price', 
					array('types'=>'widtdrawal', 'price'=>13500));
			}
			
		$types=addslashes($types);
		$row= $this->db	
		->query('select price `value` from mujur_price where types="'.$types.'" order by created desc limit 1')
		->row_array();
		return $row['value'];
	}
/***
ACCOUNT
***/	 
	function accountCreate($id,$raw='')
	{
		$detail=$this->regisDetail($id);
		if(defined('LOCAL')){
		$sql="select count(id) c from {$this->tableAccount} where username like '{$detail['username']}'";
			$row=dbFetchOne($sql);
			if($row['c']!=0){
				$sql="delete from {$this->tableAccount} where username like '{$detail['username']}'";
				dbQuery($sql,1);
				$sql="delete from {$this->tableAccountDetail} where username like '{$detail['username']}'";
				dbQuery($sql,1);
			}
		}

		$dt=array(
			'reg_id'=>$id,
			'username'=>$detail['username'],
			'investorpassword'=>trim($raw['investorpassword']),
			'masterpassword'=>trim($raw['masterpassword']),
			'accountid'=>$raw['accountid'],
			'email'=>$detail['email'],
			//'raw'=>$raw,
			//'activation'=>base64_encode($raw),
			'created'=>date("Y-m-d")
		);
		$accid=date("ym000");
		$sql="select max(id) max from {$this->tableAccount}";
		$dt2=dbFetchOne($sql);
		if($dt2['max'] > (int)$accid){
			$accid=$dt2['max'];
		}
		$dt['id']=$accid+1;
		
		$sql=$this->db->insert_string($this->tableAccount,$dt);
		dbQuery($sql,1);
//===========Account Detail  
		$dt=array(
			'id'=>$accid,
			'username'=>$detail['username'],
			'detail'=>json_encode($detail['detail']),
			
		);
		$sql=$this->db->insert_string($this->tableAccountDetail,$dt);
		
		$sql="select id from {$this->tableActivation} where userid=$id";
		$data=dbFetch($sql);
		foreach($data as $row){
			$idActive=$row['id'];
			$this->activationUpdate($idActive, 1); //close activation
		}
		
		$data = array('reg_status' => 0);
		$where = "reg_id=$id";
		$sql = $this->db->update_string($this->tableRegis, $data, $where);
		dbQuery($sql,1);
		//===============Change Password===============
		$sql="select password from {$this->tablePassword} order by rand() limit 2";
		$data=dbFetch($sql);
		$invPass=$data[0]['password'];
		$masterPass=$data[1]['password'];
		
		$param=array( );
		$param['privatekey']	=$this->forex->forexKey();
		$param['accountid']=$raw['accountid'];
		$param['masterpassword']=$masterPass.($raw['accountid']%100000 +19939);
		$param['investorpassword']=$invPass.($raw['accountid'] %100000 +19919) ; 
		
		$url=$this->forex->forexUrl('update');
		$url.="?".http_build_query($param);
		$arr['param']=$param;
		$arr['url']=$url;
		$result0= _runApi($url );
		logCreate("update password result:".print_r($result0,1));
		$data = array(
			'investorpassword' => md5( $param['investorpassword'] ),
			'masterpassword'=>md5( $param['masterpassword'] )
		);
		$where = "reg_id=$id";
		
		$sql = $this->db->update_string($this->tableAccount, $data, $where);
		dbQuery($sql,1);
		
		$param2=array( 
			'username'=>$detail['username'],
			'masterpassword'=>$param['masterpassword'],
			'investorpassword'=>$param['investorpassword'],
			'email'=>$detail['email']
		);
		$param2['emailAdmin']=$this->emailAdmin;
			
		$this->load->view('member/email/emailRegister_view',$param2);
		
	}

	function accountDetail($id,$field='id'){
		$id=addslashes($id);
		$sql="select count(id) c from {$this->tableAccount}
		where `{$field}`='$id'";
		$res=dbFetchOne($sql);
		if($res['c']==0)
			return false;
		
		$sql="select a.* from {$this->tableAccount} a  
		
		where `{$field}`='$id'";
		$res=dbFetchOne($sql);
		$this->accountDetailRepair($res);
			
		$sql="select a.*,ad.detail raw,adm.adm_type type from {$this->tableAccount} a 
		left join {$this->tableAccountDetail} ad 
			on a.username like ad.username
		left join {$this->tableAdmin} adm 
			on adm_username like a.username
		where a.`{$field}`='$id'";
		$data= dbFetchOne($sql);
		if($data['type']==7){
			$data['type']='admin';
		}else{
			$data['type']=false;
		}
		$data['detail']=json_decode($data['raw'],true); 
		unset($data['raw']);
		return $data;
	}
	
	function accountDetailRepair($data=array()){
		$username=$data['username'];
		$sql="select count(id) c  from {$this->tableAccountDetail} where `username`='$username'";
		$res=dbFetchOne($sql);
		if($res['c']==1)
			return true;
		
		$reg=$this->regisDetail($data['reg_id']);
		$detail=json_encode($reg['detail']);
		$sql="insert into {$this->tableAccountDetail}(username,detail) values('$username','$detail')";
		dbQuery($sql);
		return true;
	}
/***
ACTIVATION

***/	
	function accountActivation($id,$raw0){
		logCreate('create :'.$id." raw:".print_r($raw0,1));
		
		$sql="select reg_id id from {$this->tableRegis} where reg_id like '$id'";
		$row= $this->db->query($sql)->row_array();
		$idActive=sprintf("%s%05s",dbId('activation', 200005),$row['id']);
		$ar=array('date'=>date("Y-m-d H:i:s"), 'id'=>$id, 'raw'=>$raw0);
		$raw=json_encode($ar);
		$raw1=base64_encode($raw);
		logCreate('code:'.$raw,'info');
		$dt=array( 
			'id'=>$idActive,
			'code'=>$raw1,
			'userid'=>$id,
			'expired'=>date("Y-m-d H:i:s",strtotime("+4 hours")),
			'created'=>date("Y-m-d H:i:s",strtotime("now"))
			
		);
		logCreate('code (before):'.print_r(json_decode(base64_decode($raw1)),1) );
		$sql=$this->db->insert_string($this->tableActivation,$dt);
		dbQuery($sql,1);
		
		$data = array(
			'reg_status' => 2, 
			'reg_password'=>md5($raw0['masterpassword']), 
			'reg_investorpassword'=>md5($raw0['investorpassword'])
		);
		$where = "reg_id=$id";
		$sql = $this->db->update_string($this->tableRegis, $data, $where);
		dbQuery($sql,1);
		$this->accountCreate($id, $raw0);
		return $idActive;
	}
	
	function activationDetail($id,$field='id'){
		$sql="select * from {$this->tableActivation} where $field='".addslashes($id)."'";
		$res=dbFetchOne($sql);
		return $res;
	}
	
	function activationUpdate($id, $status){
		$data = array('status' => $status);
		$where = "id=$id";
		logCreate("activation update id:{$id} |status:{$status}","info");
		$sql = $this->db->update_string($this->tableActivation, $data, $where);
		dbQuery($sql,1);
		
	}
	
	function activationUpdateUser($id, $status){
		$data = array('status' => $status);
		$where = "userid=$id";
		$sql = $this->db->update_string($this->tableActivation, $data, $where);
		dbQuery($sql,1);
		
	}
	

/***
REGISTER
***/	
	function regisAll($limit=10)
	{
		$sql="select reg_id id from {$this->tableRegis} order by reg_id desc limit $limit";
		return  dbFetch($sql);//$this->db->query($sql)->result_array();
	}
	
	function regisDetail($id,$stat=false)
	{
		$sql="select reg_username username, reg_password password, reg_detail detail, reg_status status,reg_agent agent,reg_email email from {$this->tableRegis} where reg_id=$id";
		$res=dbFetchOne($sql);//$this->db->query($sql)->row_array();
		if($res['username']==''&&$stat==false){			
			$res['username']=9578990+$id;		
			if(defined('LOCAL')){
				$res['username']="demo".$res['username'];
			}else{}			
			$password=""; //substr(md5($res['username']),3,7);
			$res['password']=$password;
			$sql="update {$this->tableRegis} set reg_username='$res[username]', 
			  reg_password='$res[password]' where reg_id=$id";
			$data=array(
				'reg_username'=>$res['username'],
				'reg_password'=>$res['password']
			);
			$where="reg_id=$id";
			$sql = $this->db->update_string($this->tableRegis, $data, $where);
			dbQuery($sql,1);
			if(defined('LOCAL')){
				echo $sql;
			}
			//$this->db->query($sql);
		}
		
		unset($res['reg_id']);
		$dt2=json_decode($res['detail'],1);
		ksort($dt2);
		unset($res['detail']);
		foreach($dt2 as $nm=>$val){
			if($nm=='citizen'){
				$dt=$this->country->getData($val);
				$val=$dt['name'];
				$res['detail']['country']=$dt;
			}
			$res['detail'][$nm]=$val;
		}
		
		return $res;
	}
		
	function saveData($data, &$message)
	{
		if(isset($data['agent'])){
			$agent=trim($data['agent']);
			unset($data['agent']);
		}
		
		if(isset($data['email'])){
			$email=$data['email'];
		}else{
			$message='No email';
			return false;
		}
		
		$sql="select count(reg_id) c from {$this->tableRegis} where
		reg_email='$email'";
		$res= $this->db->query($sql)->row_array();
		if($res['c']!=0){
			$message='Email already register';//.json_encode($res);
			return false;
		}
		unset($data['type']);
		$dt=array(
			'reg_status'=>1,
			'reg_detail'=>json_encode($data),
			'reg_agent'=>$agent,
			'reg_created'=>date("Y-m-d H:i:s"),
			'reg_email'=>$email,
		);
		$sql=$this->db->insert_string($this->tableRegis, $dt);
		dbQuery($sql);
		$message='Your account successfull registered';
		return true;
	}
//=====================================
		public function __construct()
        {
            $this->load->database();
			$this->load->dbforge();
//=========UPDATE REGISTER			
			$sql="select count(reg_id) tot from {$this->tableRegis}";
			$dt=dbFetchOne($sql);
			if($dt['tot']==0){
				$arr=array('reg_id'=>0,'reg_status'=>-1);
				$this->db->insert($this->tableRegis,$arr);
			}
			$sql="select * from {$this->tableRegis} limit 1";
			$dt=dbFetchOne($sql);
			if(!isset($dt['reg_investorpassword'])){
				$sql="ALTER TABLE `{$this->tableRegis}` ADD `reg_investorpassword` VARCHAR(100) NOT NULL AFTER `reg_password`;";
				dbQuery($sql,1);			
			}
//=========UPDATE ACCOUNT			
			$sql="select count(id) tot from {$this->tableAccount}";
			$dt=dbFetchOne($sql);
			if($dt['tot']==0){
				$arr=array('id'=>0,'created'=>date("Y-m-d"));
				$this->db->insert($this->tableAccount,$arr);
			}
			$sql="select * from {$this->tableAccount} limit 1";
			$dt=dbFetchOne($sql);
			if(!isset($dt['investorpassword'])){
				$sql="ALTER TABLE `{$this->tableAccount}` 
				ADD `investorpassword` VARCHAR(100) NOT NULL, 
				ADD `masterpassword` VARCHAR(100) NOT NULL, 
				ADD `reg_id` BIGINT(20) NOT NULL ;";
				dbQuery($sql,1);
				$sql="ALTER TABLE `{$this->tableAccount}` CHANGE `username` `username` VARCHAR(50) NOT NULL;";
				dbQuery($sql,1);				
			}
			if(!isset($dt['accountid'])){
				echo '<pre>';var_dump($dt);
				$sql="ALTER TABLE `{$this->tableAccount}` ADD `accountid` bigint NOT NULL DEFAULT '1';";
				dbQuery($sql,1);
			}
//=========Menambah Account Detail			
			if(!$this->db->table_exists($this->tableAccountDetail)){
				$fields = array(
				  'id'=>array( 
					'type' => 'BIGINT','auto_increment' => TRUE), 		   
				  'username'=>array( 
					'type' => 'VARCHAR',  
					'constraint' => '100'),
				  'detail'=>array( 'type' => 'text'),
				  'modified'=>array( 'type' => 'timestamp'),
				);
				$this->dbforge->add_field($fields);
				$this->dbforge->add_key('id', TRUE);
				$this->dbforge->create_table($this->tableAccountDetail,TRUE);
				$str = $this->db->last_query();			 
				logConfig("create table:$str");
				$this->db->reset_query();	
			}
//==========Menambah mujur_api
			if(!$this->db->table_exists('mujur_api')){
				$fields = array(
				  'id'=>array( 
					'type' => 'BIGINT','auto_increment' => TRUE), 		   
				  'url'=>array( 
					'type' => 'VARCHAR',  
					'constraint' => '200'),
				  'parameter'=>array( 'type' => 'text'),
				  'response'=>array( 'type' => 'text'),
				  'error'=>array( 'type' => 'boolean'),
				  'created'=>array( 'type' => 'timestamp'),
				);
				$this->dbforge->add_field($fields);
				$this->dbforge->add_key('id', TRUE);
				$this->dbforge->create_table('mujur_api',TRUE);
				$str = $this->db->last_query();			 
				logConfig("create table:$str");
				$this->db->reset_query();	
			}

			$this->rateNow();
			$this->flowInsert('');
        }
}