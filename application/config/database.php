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
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
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
*/


$db_config['hostname'] = '127.0.0.1';
$db_config['username'] = 'root';
$db_config['password'] = '1598753';
$db_config['cms_db'] = 'cms';
$db_config['auth_db'] = 'auth';

$active_group = 'auth';
$active_record = TRUE;

$db['cms']['hostname'] = $db_config['hostname'];
$db['cms']['username'] = $db_config['username'];
$db['cms']['password'] = $db_config['password'];
$db['cms']['database'] = $db_config['cms_db'];
$db['cms']['dbdriver'] = 'mysql';
$db['cms']['port']     = '3306';
$db['cms']['dbprefix'] = '';
$db['cms']['pconnect'] = FALSE;
$db['cms']['db_debug'] = TRUE;
$db['cms']['cache_on'] = FALSE;
$db['cms']['cachedir'] = '';
$db['cms']['char_set'] = 'utf8';
$db['cms']['dbcollat'] = 'utf8_general_ci';
$db['cms']['swap_pre'] = '';
$db['cms']['autoinit'] = FALSE;
$db['cms']['stricton'] = FALSE;

$db['auth']['hostname'] = $db_config['hostname'];
$db['auth']['username'] = $db_config['username'];
$db['auth']['password'] = $db_config['password'];
$db['auth']['database'] = $db_config['auth_db'];
$db['auth']['dbdriver'] = 'mysql';
$db['auth']['port']     = '3306';
$db['auth']['dbprefix'] = '';
$db['auth']['pconnect'] = FALSE;
$db['auth']['db_debug'] = TRUE;
$db['auth']['cache_on'] = FALSE;
$db['auth']['cachedir'] = '';
$db['auth']['char_set'] = 'utf8';
$db['auth']['dbcollat'] = 'utf8_general_ci';
$db['auth']['swap_pre'] = '';
$db['auth']['autoinit'] = FALSE;
$db['auth']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */
