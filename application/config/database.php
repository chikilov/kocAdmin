<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	['dsn']      The full DSN string describe a connection to the database.
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysqli.
|			Currently supported:
|				 cubrid, ibase, mssql, mysql, mysqli, oci8,
|				 odbc, pdo, postgre, sqlite, sqlite3, sqlsrv
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Query Builder class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['encrypt']  Whether or not to use an encrypted connection.
|
|			'mysql' (deprecated), 'sqlsrv' and 'pdo/sqlsrv' drivers accept TRUE/FALSE
|			'mysqli' and 'pdo/mysql' drivers accept an array with the following options:
|
|				'ssl_key'    - Path to the private key file
|				'ssl_cert'   - Path to the public key certificate file
|				'ssl_ca'     - Path to the certificate authority file
|				'ssl_capath' - Path to a directory containing trusted CA certificats in PEM format
|				'ssl_cipher' - List of *allowed* ciphers to be used for the encryption, separated by colons (':')
|				'ssl_verify' - TRUE/FALSE; Whether verify the server certificate or not ('mysqli' only)
|
|	['compress'] Whether or not to use client compression (MySQL only)
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|	['ssl_options']	Used to set various SSL options that can be used when making SSL connections.
|	['failover'] array - A array with 0 or more data for connections if the main should fail.
|	['save_queries'] TRUE/FALSE - Whether to "save" all executed queries.
| 				NOTE: Disabling this will also effectively disable both
| 				$this->db->last_query() and profiling of DB queries.
| 				When you run a query, with this setting set to TRUE (default),
| 				CodeIgniter will store the SQL statement for debugging purposes.
| 				However, this may cause high memory usage, especially if you run
| 				a lot of SQL queries ... disable this to avoid that problem.
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $query_builder variables lets you determine whether or not to load
| the query builder class.
*/
$active_group = 'koc_manage';
$query_builder = TRUE;

$arrDatabase = array(
	'production' => array(

	),
	'staging' => array(
		'login' => array(
			'hostname' => 'rh-login-stage-rds.csd7atpmn088.ap-northeast-1.rds.amazonaws.com',
			'username' => 'webuser',
			'password' => 'dudrud78'
		),
		'log' => array(
			'hostname' => 'rh-log-stage-rds.csd7atpmn088.ap-northeast-1.rds.amazonaws.com',
			'username' => 'webuser',
			'password' => 'dudrud78'
		),
		'stage1' => array(
			'master' => array(
				'hostname' => 'rh-master-stage-rds.csd7atpmn088.ap-northeast-1.rds.amazonaws.com',
				'username' => 'webuser',
				'password' => 'dudrud78'
			),
			'slave' => array(
				'hostname' => 'rh-master-stage-rds.csd7atpmn088.ap-northeast-1.rds.amazonaws.com',
				'username' => 'webuser',
				'password' => 'dudrud78'
			)
		),
		'dev2' => array(
			'master' => array(
				'hostname' => '101.79.109.239',
				'username' => 'root',
				'password' => 'dudrud'
			),
			'slave' => array(
				'hostname' => '101.79.109.239',
				'username' => 'root',
				'password' => 'dudrud'
			)
		)
	)
);
switch (ENVIRONMENT)
{
	case 'production':
		$db['default'] = array();
		$db['koc_manage'] = array();
		$db['koc_play'] = array();
		$db['koc_account'] = array();
		$db['koc_rank'] = array();
		$db['koc_mail'] = array();
	break;
	case 'staging':
		$db['koc_account'] = array(
			'hostname' => $arrDatabase[ENVIRONMENT]['login']['hostname'],
			'username' => $arrDatabase[ENVIRONMENT]['login']['username'],
			'password' => $arrDatabase[ENVIRONMENT]['login']['password'],
			'database' => 'koc_account'
		);

		$db['koc_manage'] = array(
			'hostname' => $arrDatabase[ENVIRONMENT]['login']['hostname'],
			'username' => $arrDatabase[ENVIRONMENT]['login']['username'],
			'password' => $arrDatabase[ENVIRONMENT]['login']['password'],
			'database' => 'koc_manage'
		);

		$db['koc_log'] = array(
			'hostname' => $arrDatabase[ENVIRONMENT]['log']['hostname'],
			'username' => $arrDatabase[ENVIRONMENT]['log']['username'],
			'password' => $arrDatabase[ENVIRONMENT]['log']['password'],
			'database' => 'koc_play'
		);

		$db['koc_play_master'] = array(
			'hostname' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['hostname'] : $arrDatabase[ENVIRONMENT][0]['master']['hostname']),
			'username' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['username'] : $arrDatabase[ENVIRONMENT][0]['master']['username']),
			'password' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['password'] : $arrDatabase[ENVIRONMENT][0]['master']['password']),
			'database' => 'koc_play'
		);

		$db['koc_rank_master'] = array(
			'hostname' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['hostname'] : $arrDatabase[ENVIRONMENT][0]['master']['hostname']),
			'username' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['username'] : $arrDatabase[ENVIRONMENT][0]['master']['username']),
			'password' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['password'] : $arrDatabase[ENVIRONMENT][0]['master']['password']),
			'database' => 'koc_rank'
		);

		$db['koc_record_master'] = array(
			'hostname' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['hostname'] : $arrDatabase[ENVIRONMENT][0]['master']['hostname']),
			'username' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['username'] : $arrDatabase[ENVIRONMENT][0]['master']['username']),
			'password' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['password'] : $arrDatabase[ENVIRONMENT][0]['master']['password']),
			'database' => 'koc_record'
		);

		$db['koc_mail_master'] = array(
			'hostname' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['hostname'] : $arrDatabase[ENVIRONMENT][0]['master']['hostname']),
			'username' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['username'] : $arrDatabase[ENVIRONMENT][0]['master']['username']),
			'password' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['password'] : $arrDatabase[ENVIRONMENT][0]['master']['password']),
			'database' => 'koc_mail'
		);

		$db['koc_ref_master'] = array(
			'hostname' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['hostname'] : $arrDatabase[ENVIRONMENT][0]['master']['hostname']),
			'username' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['username'] : $arrDatabase[ENVIRONMENT][0]['master']['username']),
			'password' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['password'] : $arrDatabase[ENVIRONMENT][0]['master']['password']),
			'database' => 'koc_ref'
		);

		$db['koc_admin_master'] = array(
			'hostname' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['hostname'] : $arrDatabase[ENVIRONMENT][0]['master']['hostname']),
			'username' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['username'] : $arrDatabase[ENVIRONMENT][0]['master']['username']),
			'password' => (array_key_exists('server_name', $_COOKIE) ? $arrDatabase[ENVIRONMENT][json_decode($_COOKIE['server_name'], true)['name']]['master']['password'] : $arrDatabase[ENVIRONMENT][0]['master']['password']),
			'database' => 'koc_ref'
		);
	break;
	default:
		$db['koc_account'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_account'
		);

		$db['koc_manage'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_manage'
		);

		$db['koc_log'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_play'
		);

		$db['koc_play_master'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_play'
		);

		$db['koc_rank_master'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_rank'
		);

		$db['koc_record_master'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_record'
		);

		$db['koc_mail_master'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_mail'
		);

		$db['koc_ref_master'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_ref'
		);

		$db['koc_admin_master'] = array(
			'hostname' => '101.79.109.239',
			'username' => 'root',
			'password' => 'dudrud',
			'database' => 'koc_ref'
		);
}

foreach( $db as $dbkey => $dbrow )
{
	$db[$dbkey]['dsn']				= '';
	$db[$dbkey]['dbdriver']			= 'mysqli';
	$db[$dbkey]['dbprefix']			= '';
	$db[$dbkey]['pconnect']			= FALSE;
	$db[$dbkey]['db_debug']			= (ENVIRONMENT !== 'production');
	$db[$dbkey]['cache_on']			= FALSE;
	$db[$dbkey]['cachedir']			= '';
	$db[$dbkey]['char_set']			= 'utf8';
	$db[$dbkey]['dbcollat']			= 'utf8_general_ci';
	$db[$dbkey]['swap_pre']			= '';
	$db[$dbkey]['encrypt']			= FALSE;
	$db[$dbkey]['compress']			= FALSE;
	$db[$dbkey]['stricton']			= FALSE;
	$db[$dbkey]['failover']			= array();
	$db[$dbkey]['save_queries']		= TRUE;
}
