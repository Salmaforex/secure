<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Recaptcha configuration settings
 * 
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 * 
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 * 
 * @author Damar Riyadi <damar@tahutek.net>
 */
$config['recaptcha_sitekey'] = "6LdrWx8TAAAAAK3Ot-fvrQ-lPgGuCRgHyJbyc6Ez";
$config['recaptcha_secretkey'] = "6LdrWx8TAAAAAMg_BRrH6ZJK_GoJLR-ifmOhdt55";
$config['lang'] = "id";

if(defined('LOCAL')){
$config['recaptcha_sitekey'] = "6LdRkh0TAAAAAEqIcZsjSBa-LAyg1md7-4ConwjZ";
$config['recaptcha_secretkey'] = "6LdRkh0TAAAAANBv7mFCYdlc8SZP8coNG6XxOWbH";
$config['lang'] = "id";
}
if(defined('_DEV_')){
$config['recaptcha_sitekey'] = "6Lcnpx0TAAAAADrIfeQUL5w2EsRyvEtvMyzH4ZGS";
$config['recaptcha_secretkey'] = "6Lcnpx0TAAAAAMtSzsfhVDcPYebIvnyH1Gbigs-o";
$config['lang'] = "id";
}