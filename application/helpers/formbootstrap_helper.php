<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
hanya generator
*/
if ( ! function_exists('bsInput')){
	function bsInput($title,$name, $value='',$info='',$disable=false){
		if($info=='')$info='please input correct data';
		$data = array(
			'name'          => $name,
			'id'            => 'input_'.$name,
			'value'         => $value,
			'class'			=> 'form-control',
			'type'			=> 'text',
			'placeholder'	=> $info
		);
		if($disable!==false){
			$inp=$value; 
		}
		else{
			$inp= form_input($data);
		}
  
		$str='<div class="form-group">
    <label for="input_'.$name.'">'.$title.'</label>'.$inp.'</div>';
	return $str;
	}
	
	function bsText($title,$name, $value='',$rows=0,$cols=0){
		$cols=$cols==0?60:$cols;
		$rows=$rows==0?3:$rows;
		
		$data = array(
			'name'          => $name,
			'id'            => 'input_'.$name,
			'value'         => $value,
			'class'			=> 'form-control',
			'rows'	=>$rows,
			'cols'	=>$cols 
		);

		$inp= form_textarea($data); 
		$str='<div class="form-group">
    <label for="input_'.$name.'">'.$title.'</label>'.$inp.'</div>';
	return $str;
	}
	
	function bsSelect($title, $name, $data='',$default=''){
	$attributes = array(
 			'id'            => 'input_'.$name,
 			'class'			=> 'form-control',
		);
	  $inp=form_dropdown($name,$data,$default,$attributes);
		$str='<div class="form-group">
    <label for="input_'.$name.'">'.$title.'</label>'.$inp.'</div>';
	return $str;
	}
	
	function bsButton($value='',$type=1,$class='',$aData=array() ){
		$str='<button type="%s" class="btn %s" %s>%s</button>';
		$typeButton=$type==1?'submit':'button';
		$classButton=$class==''?'btn-default':'btn-'.$class;
		$oth="";
		foreach($aData as $nm=>$val){
			$oth.="\t$nm=\"".addslashes($val)."\"";
		}
	return sprintf($str, $typeButton,$classButton,$oth, $value);
	}
}