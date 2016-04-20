<?php
$config['app_code']=array(
	'9912310',
);
 

$config['emailAdmin']=array('admin@dev.salmaforex.com','admin@secure.salmaforex.com');

if(defined('LOCAL')){
	$config['urlForex']=array( 
		'default'=>			'http://forex.local/forex/fake',
		'activation'=>		'http://forex.local/forex/fake/activation',
		'update'=>			'http://forex.local/forex/fake/update',
		'register'=>		'http://forex.local/forex/fake',
		'updateBalance'=>	'http://forex.local/forex/fake/updateBalance'		
		
	);
	
	$config['api_url']='http://forex.local/forex/api';
	$config['forexKey']='unknown99';
}
else{ 
	$config['urlForex']=array( 
		'default'=>			'https://www.natureforex.com/rest-api/salma' ,
		'register'=>		'https://www.natureforex.com/rest-api/salma/register',
		'update'=>			'https://www.natureforex.com/rest-api/salma/update-account' ,
		'updateBalance'=>	'https://www.natureforex.com/rest-api/salma/update-balance'
	);
	
	$config['api_url']='http://secure.salmaforex.com/forex/api';
	$config['forexKey']='SalmaFX123!@#';
	
}

//if dev
if(defined('_DEV_')){
	$config['api_url']='http://dev.salmaforex.com/forex/api';
	$config['urlForex']['updateBalance']=
	  'http://dev.salmaforex.com/forex/fake/updateBalance';
}else{} 

$config['urlForex']['local']='http://forex.local/index.php/forex/data';
