<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
punkage / 앱디스코!QAZ
*/

$active_group = 'default';
$active_record = TRUE;

/** 내 개발 서버이면 **/
if ( false && $_SERVER['HTTP_HOST'] == '192.168.0.91')
{
	/* Main Master DB Env */
	$db['default']['hostname'] = '54.249.30.223';	// Staging
	//$db['default']['hostname'] = '54.249.30.223';	// Master
	//$db['default']['hostname'] = '10.0.0.223';
	$db['default']['username'] = 'adlatte';
	$db['default']['password'] = 'zjajsdy18';
	$db['default']['database'] = 'adlatte_db';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = false;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
	
	/* Other Master DB : 분리된 적립 테이블 가지고 있는 DB */
	$db['old_master']['hostname'] = '54.249.30.241';
	//$db['old_master']['hostname'] = '10.0.0.241';
	$db['old_master']['username'] = 'adlatte';
	$db['old_master']['password'] = 'zjajsdy18';
	$db['old_master']['database'] = 'adlatte_db';
	$db['old_master']['dbdriver'] = 'mysql';
	$db['old_master']['dbprefix'] = '';
	$db['old_master']['pconnect'] = false;
	$db['old_master']['db_debug'] = TRUE;
	$db['old_master']['cache_on'] = FALSE;
	$db['old_master']['cachedir'] = '';
	$db['old_master']['char_set'] = 'utf8';
	$db['old_master']['dbcollat'] = 'utf8_general_ci';
	$db['old_master']['swap_pre'] = '';
	$db['old_master']['autoinit'] = TRUE;
	$db['old_master']['stricton'] = FALSE;
}
else if ( false &&  $_SERVER['HTTP_HOST'] == 'www.adlatte.com')
{
	/* Main Master DB Env */
	$db['default']['hostname'] = '10.0.0.223';
	$db['default']['username'] = 'adlatte';
	$db['default']['password'] = 'zjajsdy18';
	$db['default']['database'] = 'adlatte_db';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = false;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
	
	/* Other Master DB : 분리된 적립 테이블 가지고 있는 DB */
	$db['old_master']['hostname'] = '10.0.0.241';
	$db['old_master']['username'] = 'adlatte';
	$db['old_master']['password'] = 'zjajsdy18';
	$db['old_master']['database'] = 'adlatte_db';
	$db['old_master']['dbdriver'] = 'mysql';
	$db['old_master']['dbprefix'] = '';
	$db['old_master']['pconnect'] = false;
	$db['old_master']['db_debug'] = TRUE;
	$db['old_master']['cache_on'] = FALSE;
	$db['old_master']['cachedir'] = '';
	$db['old_master']['char_set'] = 'utf8';
	$db['old_master']['dbcollat'] = 'utf8_general_ci';
	$db['old_master']['swap_pre'] = '';
	$db['old_master']['autoinit'] = TRUE;
	$db['old_master']['stricton'] = FALSE;
}
else if ( $_SERVER['HTTP_HOST'] == 'owner.appdisco.co.kr')
{
	/* Main Master DB Env */
	$db['default']['hostname'] = '10.0.0.249';
	$db['default']['username'] = 'adlatte';
	$db['default']['password'] = 'zjajsdy18';
	$db['default']['database'] = 'adlatte_db';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = false;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
	
	/* Other Master DB : 분리된 적립 테이블 가지고 있는 DB */
	$db['old_master']['hostname'] = '10.0.0.241';
	$db['old_master']['username'] = 'adlatte';
	$db['old_master']['password'] = 'zjajsdy18';
	$db['old_master']['database'] = 'adlatte_db';
	$db['old_master']['dbdriver'] = 'mysql';
	$db['old_master']['dbprefix'] = '';
	$db['old_master']['pconnect'] = false;
	$db['old_master']['db_debug'] = TRUE;
	$db['old_master']['cache_on'] = FALSE;
	$db['old_master']['cachedir'] = '';
	$db['old_master']['char_set'] = 'utf8';
	$db['old_master']['dbcollat'] = 'utf8_general_ci';
	$db['old_master']['swap_pre'] = '';
	$db['old_master']['autoinit'] = TRUE;
	$db['old_master']['stricton'] = FALSE;
}
else
{
	/* Staging DB Env */
	$db['default']['hostname'] = '180.68.204.229';
	$db['default']['username'] = 'adlatte';
	$db['default']['password'] = 'zjajsdy18';
	$db['default']['database'] = 'adlatte_db';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = false;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
	
	/* Other Master DB : 분리된 적립 테이블 가지고 있는 DB */
	$db['old_master']['hostname'] = '54.249.30.241';
	//$db['old_master']['hostname'] = '10.0.0.241';
	$db['old_master']['username'] = 'adlatte';
	$db['old_master']['password'] = 'zjajsdy18';
	$db['old_master']['database'] = 'adlatte_db';
	$db['old_master']['dbdriver'] = 'mysql';
	$db['old_master']['dbprefix'] = '';
	$db['old_master']['pconnect'] = false;
	$db['old_master']['db_debug'] = TRUE;
	$db['old_master']['cache_on'] = FALSE;
	$db['old_master']['cachedir'] = '';
	$db['old_master']['char_set'] = 'utf8';
	$db['old_master']['dbcollat'] = 'utf8_general_ci';
	$db['old_master']['swap_pre'] = '';
	$db['old_master']['autoinit'] = TRUE;
	$db['old_master']['stricton'] = FALSE;
}

// Slave DB
if (false)
{
	/* Staging DB Env */
	$db['default']['hostname'] = '180.68.204.229';
	$db['default']['username'] = 'adlatte';
	$db['default']['password'] = 'zjajsdy18';
	$db['default']['database'] = 'adlatte_db';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = false;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
} 
// Master DB 2
else if (false)
{
	/* Main Master DB Env */
	$db['default']['hostname'] = '54.249.30.223';
	//$db['default']['hostname'] = '10.0.0.223';
	$db['default']['username'] = 'adlatte';
	$db['default']['password'] = 'zjajsdy18';
	$db['default']['database'] = 'adlatte_db';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = true;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
	
	/* Other Master DB : 분리된 적립 테이블 가지고 있는 DB */
	$db['old_master']['hostname'] = '54.249.30.241';
	//$db['old_master']['hostname'] = '10.0.0.241';
	$db['old_master']['username'] = 'adlatte';
	$db['old_master']['password'] = 'zjajsdy18';
	$db['old_master']['database'] = 'adlatte_db';
	$db['old_master']['dbdriver'] = 'mysql';
	$db['old_master']['dbprefix'] = '';
	$db['old_master']['pconnect'] = true;
	$db['old_master']['db_debug'] = TRUE;
	$db['old_master']['cache_on'] = FALSE;
	$db['old_master']['cachedir'] = '';
	$db['old_master']['char_set'] = 'utf8';
	$db['old_master']['dbcollat'] = 'utf8_general_ci';
	$db['old_master']['swap_pre'] = '';
	$db['old_master']['autoinit'] = TRUE;
	$db['old_master']['stricton'] = FALSE;
	
}
// Master DB 1
else if (false)
{
	/* Staging DB Env */
	$db['default']['hostname'] = '54.249.30.223';
	// $db['default']['username'] = 'root';
	// $db['default']['password'] = 'jump@adlatte@)!@';
	$db['default']['username'] = 'punkage';
	$db['default']['password'] = 'doqeltmzh!QAZ';
	$db['default']['database'] = 'adlatte_db';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = false;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
} 
else if(false)
{
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'root';
	$db['default']['password'] = 'root';
	$db['default']['database'] = 'adlatte';
	$db['default']['dbdriver'] = 'mysql';
	$db['default']['dbprefix'] = '';
	$db['default']['pconnect'] = false;
	$db['default']['db_debug'] = TRUE;
	$db['default']['cache_on'] = FALSE;
	$db['default']['cachedir'] = '';
	$db['default']['char_set'] = 'utf8';
	$db['default']['dbcollat'] = 'utf8_general_ci';
	$db['default']['swap_pre'] = '';
	$db['default']['autoinit'] = TRUE;
	$db['default']['stricton'] = FALSE;
}


/* End of file database.php */
/* Location: ./application/config/database.php */