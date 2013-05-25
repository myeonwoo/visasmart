<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$env = (isset($_SERVER['ENVIRONMENT']) && $_SERVER['ENVIRONMENT'] == 'development') ? $_SERVER['ENVIRONMENT'] : 'production';
$_mongo_config = array(
	// Master
	'production'=>array(
		//'master'=>'10.0.1.236:27017',
		'master'=>'10.0.1.236:27017',
		//'slave'=>array('10.0.1.237:27017','10.0.1.238:27017'),
		'slave'=>array('10.0.1.237:27017', '10.0.1.238:27017'),
		'replicaset'=>'rs_adlatte'
	),
	// Staging
	'development'=>array(
		'master'=>'180.68.204.229:27017',
		//'master'=>'180.68.204.236:27017',
		//'master'=>'10.0.1.229:27017',
		
		'slave'=>array('180.68.204.229:27017'),
		//'slave'=>array('180.68.204.236:27017'),
		//'slave'=>array('10.0.1.229:27017'),
		'replicaset'=>false
	)
);
$_mongo = array(
	'hostname'=>array(
		'master'=>$_mongo_config[$env]['master']
		,'slave'=>get_slave_one($_mongo_config[$env]['slave'])
		,'slaves'=>$_mongo_config[$env]['slave']
		,'replicaset'=>$_mongo_config[$env]['replicaset']
	)
	,'replicaset'=>$_mongo_config[$env]['replicaset']
);

$config['mongodb']['hostname']['master'] = $_mongo['hostname']['master'];
$config['mongodb']['hostname']['slave'] = $_mongo['hostname']['slave'];
$config['mongodb']['hostname']['slaves'] = $_mongo['hostname']['slaves'];
$config['mongodb']['replicaset'] = $_mongo['replicaset'];