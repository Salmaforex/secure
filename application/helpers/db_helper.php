<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
membutuhkan helper log 
work with basic db connection
*/
if ( ! function_exists('dbId')){
	function dbId($name="id",$start=10,$counter=1){
	$CI =& get_instance();
		$CI->load->dbforge();
		if($name=='')$name='id';
		if($name!='id'){
			$name.="_id";
		}else{}
		if(!$CI->db->table_exists($name)){
			$CI->dbforge->add_field('id');
			$CI->dbforge->create_table($name,TRUE);
			$str = $CI->db->last_query();			 
			logConfig("create table:$str",'logDB');
		}else{}
		$CI->db->reset_query();	
		
		$sql="select count(id) c, max(id) max from $name";
		$data=dbFetchOne($sql);
		if($data['c']==0){
			$data=array('id'=>$start);
			$sql = $CI->db->insert_string($name, $data);
			dbQuery($sql,1);
			$num=$start;
		}
		else{
			$num=$data['max']+$counter;
			$where="id=".$data['max'];
			$data=array('id'=>$num);			
			$sql = $CI->db->update_string($name, $data, $where);
			dbQuery($sql,1);
		}
		$str = $CI->db->last_query();
		logConfig("dbId sql:$str",'logDB');
		
		$CI->db->reset_query();
		return $num;
	}
}else{}

if ( ! function_exists('dbQuery')){
  function dbQuery($sql,$debug=0){
	$CI =& get_instance(); 
	$query=$CI->db->query($sql);
	if (!$query){
		logCreate($CI->db->error(),'error');
		logConfig('sql:'.$sql.'|error:'.print_r($CI->db->error(),1),'logDB','error');
		return false;
	}
	else{ 
		if($debug==1){ 	
			logCreate('sql:'.$sql.'|affected:'. $CI->db->affected_rows(),'query');			
		}else{}
		logConfig('sql:'.$sql.'|affected:'. $CI->db->affected_rows(),'logDB','query');
	}	
	
	return $query;
  }
  
}else{}

if ( ! function_exists('dbFetchOne')){
  function  dbFetchOne($sql,$debug=0){
	$query=dbQuery($sql,$debug);
	if(!$query){
		return false;
	}else{
		if($debug==1){
			logCreate('data:'. json_encode($query->row_array()) );
		}else{} 
		return $query->row_array();
	}
  }
  
}else{}

if ( ! function_exists('dbCleanField')){
	function dbCleanField($data0,$erase){
		$data=array();
		if(is_array($data0)){
		foreach($data0 as $name0=>$str){
			$name = str_replace($erase,"", $name0);					
			$intStr=intval($str);
			if((string)$intStr===$str && intval($str)!=0){
				$isInt=true;
			}else{ 
				$isInt=false;
			}
			$data[ $name  ]=$isInt?(int)$str:$str;
		}
		return $data;
		}else{
			return false;
		}
	}
}else{}

if ( ! function_exists('dbFetch')){
  function  dbFetch($sql,$type=0,$debug=0){
	$query=dbQuery($sql,$debug);
	if(!$query){
		return false;
	}else{
		
		$data=array();
		if($type==0){
		  foreach ($query->result_array() as $row){
			$data[]=$row;
		  }
		} 
		else{ 
		  foreach ($query->result() as $row){
			$data[]=$row;
		  }
		}
		if($debug==1){
			logCreate('data total:'. $query->num_rows() .'| list:'.json_encode($data));
		}else{} 
		
		return $data;
	}
  }
  
}else{}