<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);


/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


define('CACHE_SHORT',	60 * 2 );//2 min
define('CACHE_MEDIUM',	60 * 30 );//30min
define('CACHE_LONG',	60 * 60 * 4 );//4hr

define('ERROR_MEMBER_NOT_VERIFIED',99);
define('ERROR_MEMBER_LOCKED',98);
define('ERROR_MEMBER_PWD_FAIL',97);
define('ERROR_MEMBER_NOT_EXIST',96);


//create cache folders
$news = dirname(__FILE__)."/../cache/news";
if(!file_exists($news)){
	mkdir($news);
}

const TYPE_PROJECT_COVER = 1;
const TYPE_PROJECT_IMAGE = 3;

$news = dirname(__FILE__)."/../../public/media/";
@mkdir($news);

define('SHOW_LOG',false);
define("UPLOAD_FOLDER",dirname(__FILE__)."/../../public/media/");
define("MEDIA_ROOT","/media/");





/* End of file constants.php */
/* Location: ./application/config/constants.php */