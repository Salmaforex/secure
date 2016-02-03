<?php
$config['app_code']=array(
	'9912310',
);
/*
[15/01/2016 17:00:37] ndthien: - http://nfx.posismo.com/rest-api/salma/register?.........
- http://nfx.posismo.com/rest-api/salma/update-account?......
- http://nfx.posismo.com/rest-api/salma/update-balance?......
[15/01/2016 17:01:06] ndthien: Please send me your page for testing
*/

if(defined('LOCAL')){
	$config['urlForex']=array( 
		'default'=>			'localhost/forex/fake',
		'activation'=>		'localhost/forex/fake/activation',
		'update'=>			'localhost/forex/fake/update',
		'register'=>		'localhost/forex/fake',
		'updateBalance'=>	'localhost/forex/fake/updateBalance'		
		
	);
	
	$config['api_url']='localhost/forex/api';
	$config['forexKey']='unknown';
}
else{ 
	$config['urlForex']=array( 
		'default'=>			'http://nfx.posismo.com/api/account/openAccount' ,
		'register'=>		'http://nfx.posismo.com/rest-api/salma/register',
		'update'=>			'http://nfx.posismo.com/rest-api/salma/update-account' ,
		'updateBalance'=>	'http://nfx.posismo.com/api/account/activeAccount'
	);
	
	$config['api_url']='http://dev.salmaforex.com/forex/api';
	$config['forexKey']='SalmaFX1234567*';
	
}