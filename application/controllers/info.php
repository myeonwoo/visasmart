<?php

class Info extends CI_Controller {

	function index()
	{
		phpinfo();
	}
	
	function start(){
		echo 'hi';
	}
	function server()
	{
		print_r($_SERVER);
	}
	
	function db_test()
	{
		$this->load->model('bank_model');
		$ret = $this->bank_model->test();
		print_r($ret);
	}
	
	function db_appdisco_user()
	{
		$this->load->model('appdisco_staff_model');
		$ret = $this->appdisco_staff_model->get_appdisco_user();
		print_r(count($ret));
	}
	
	function char()
	{
		$args = $this->uri->uri_to_assoc(3, $schema);
		extract($args, EXTR_OVERWRITE);
		
		echo $nickname . '<br />';
		echo htmlspecialchars_decode($nickname) . '<br />';
		echo mb_convert_encoding($nickname,'HTML-ENTITIES','utf-8') . '<br />';
		echo '%EB%A9%B4%EC%9A%B0' . '<br />';
		
		
	}
	
	function ctime()
	{
		$date = new DateTime(date(), new DateTimeZone('Asia/Seoul'));
		echo $date->format('Y-m-d H:i:s') . "\n";
		
		return;
		
		$now = date("Y-m-d H:i:s");
		echo $now;
	}
	function sayHi(){
		echo "HI";
	}
}