<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Country_model extends CI_Model {
public $table='sfor_country'; 
        public function __construct()
        {
            $this->load->database();
        }
		
	function getAll()
	{
		$sql="select 
		 `country_id` id from {$this->table}";
		return dbFetch($sql); 
	}
/*	
	If not valid, Create New
	UPDATE DATA USING ID:country_id	
*/
	function updateData($data,$id)
	{
		dbIdReport('update','update Permision',json_encode($data), 10);
		$this->db->where('country_id', $id);
		$this->db->update($this->table, $data);
		$str = $this->db->last_query();	
		logConfig("update Permision:$str",'logDB');
		
	}
/* 
	SAVE DATA 
*/
	function saveData($data)
	{
		$id=$data['country_id']=dbIdReport('permit','create Permision',json_encode($data),10);
		$data['country_created']=date("Y-m-d H:i:s");
		$this->db->insert($this->table,$data);
		$str = $this->db->last_query();			 
		logConfig("create Permision:$str",'logDB');
		return $id;
	}
/*
	GET DATA if using country_id, return as 1 array 
*/	
	function getData($id,$field='country_id')
	{
		$sql="select 
		 `country_id` id,  `country_code` code,  `country_name` name
		from {$this->table} where {$field}='$id'";
		//,  `country_created` created,  `country_modified` modified 
		if($field=='country_id'){
			$data=dbFetchOne($sql);
		}else{ 
			$result=dbQuery($sql,1);
			$data=array();
			$i=0;
			foreach ($result->result_array() as $row){
				$data[]=$row;
			}
		}
		return $data;
	}
/*
	TOTAL ALL DATA IN TABLE
	If not valid, create New
*/	
	function totalAll()
	{
		$sql="select count(country_id) total from {$this->table}";
		$data=dbFetchOne($sql);
		return isset($data['total'])?$data['total']:false;
	}	
}