<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function week_name($week_index){

	$weeks = Array("日","一","二","三","四","五","六","日");
	return $weeks[$week_index];
}

function is_login(){
	return isset($_SESSION["mem_info"]) && $_SESSION["mem_info"] != null;
}

function _get_user_sn(){
	if(!is_login()){
		return null;
	}
	return $_SESSION["mem_info"]->mem_sn;
}

function pagination($current_page,$pages,$format){ 


	$page_start = $current_page - 3;
	$page_end = $current_page + 3;

	$shift = 0;
	if($page_start < 1){
		$shift = 1 - $page_start ;
		$page_start = 1;

		$page_end = $page_end + $shift;
	}

	if($page_end > $pages){
		$page_end = $pages;
	}

	$padding = true;

	if($page_end < $pages - 2){
		$padding = false;
	}

	$padding_start = $pages - 2;

	if($page_end == $pages){
		$padding_start = $pages + 1;
	}else if($padding_start < $page_end ){
		$padding_start = $page_end + 1;
	}

	?>

	<div class="pages-container">
		<div class="pages">
			<?php if($pages != 1){ ?>
		        <?php if($current_page == 1){  ?>
		        <span class="nextprev disable"> &lt; 上一頁</span>
		        <?php }else{ ?>
		        <a href="<?=str_replace("%s",$current_page-1,$format)?>" class="nextprev"> &lt; 上一頁</a>
		        <?php } ?>
	        <?php }?>

	        <?php if($page_start > 2) { ?>

		        <?php for($page = 1 ; $page <= 2 ; ++$page){ ?>
			        <a href="<?=str_replace("%s",$page,$format)?>"><?=h($page)?></a>
		        <?php } ?>

			        <span>…</span>

	        <?php } ?>
	        <?php 
	        	for($page = $page_start; $page <= $page_end ; ++$page){ 

	        	?>

		        <?php if($page == $current_page){ ?>
		        <span class="current disable"><?=h($page)?></span>
		        <?php }else{ ?>
		        <a href="<?=str_replace("%s",$page,$format)?>"><?=h($page)?></a>
		        <?php } ?>

	        <?php } ?>

	        <?php if(!$padding) { ?>
	        <span>…</span>
	        <?php } ?>

	        <?php if($padding_start > 0 ){ ?>
	        <?php for($page = $padding_start ; $page <= $pages ; ++$page){ ?>
		        <a href="<?=str_replace("%s",$page,$format)?>"><?=h($page)?></a>
	        <?php } ?>
	        <?php } ?>


	        <?php if($pages != 1){ ?>
		        <?php if($current_page == $pages){  ?>
		        <span class="nextprev disable">下一頁 &gt;</span>
		        <?php }else{ ?>
		        <a href="<?=str_replace("%s",$current_page+1,$format)?>" class="nextprev">下一頁 &gt;</a>
		        <?php }?>
	        <?php } ?>

		</div>
	</div>

<?php 
}

//=============URLS end ================

function date_news($date){
	$time = strtotime($date);
//	$time = strtotime("2014/01/1 8:00");
	//2014.08.07 | 06:02 AM 
	return  date("Y.m.d | h:i ",$time). ( date("H",$time) >= 12 ? "PM" : "AM" );
}

function get_ip(){
	$ip = null;
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}


function h($string, $quote_style = null, $charset = null, $double_encode = null) {
	return @htmlspecialchars($string, $quote_style , $charset);
}


function db_current_date($format = "Y-m-d H:i:s"){
	return date("Y-m-d H:i:s");
}

function db_current_gmt_date(){
	return gmdate("Y-m-d\TH:i:s\Z");
}



function _date_gmt($inp_val){

	if($inp_val == null || $inp_val=="0000-00-00 00:00:00"){
		return "";
	}
	if(is_string($inp_val)){
		$val = strtotime($inp_val);
		if($val == -1){
			return "invalid date";
		}
	}else{
		$val = $inp_val;
	}
	return gmdate("Y-m-d\TH:i:s\Z",$val);
}

function _date_format($inp_val,$format = "Y-m-d H:i:s"){
	if($inp_val == null || $inp_val=="0000-00-00 00:00:00"){
		return "";
	}
	if(is_string($inp_val)){
		$val = strtotime($inp_val);
		if($val == -1){
			return "invalid date";
		}
	}else{
		$val = $inp_val;
	}

	return date($format,$val);
}

function _date_format_ms($inp_val,$format = "Y-m-d H:i:s"){
	if($inp_val == null || $inp_val=="0000-00-00 00:00:00"){
		return "";
	}
	if(is_string($inp_val)){
		$val = strtotime($inp_val);
		if($val == -1){
			return "invalid date";
		}
	}else{
		$val = $inp_val/1000;
	}

	return date($format,$val);
}

function _display_date_with_fulldate_ms($inp_val,$format = null,$linebreak = "<Br />"){
	if($inp_val == null || $inp_val=="0000-00-00 00:00:00"){
		return "";
	}
	if($format == null){
		 $format = "Y-m-d H:i:s";
	}
	if(is_string($inp_val)){
		$val = strtotime($inp_val);
		if($val == -1){
			return "invalid date";
		}
	}else{
		$val = intval($inp_val / 1000,10);
	}

	return _display_date_with_fulldate($val,$format,$linebreak);
}

function _display_date_with_fulldate($inp_val,$format = "Y-m-d H:i:s",$linebreak = "<Br />"){
	if($inp_val == null || $inp_val=="0000-00-00 00:00:00"){
		return "";
	}
	if(is_string($inp_val)){
		$val = strtotime($inp_val);
		if($val == -1){
			return "invalid date";
		}
	}else{
		$val = $inp_val;
	}
	$diff = time() - $val;
	if ($diff < 0) {
		return date($format,$val);
	} elseif ($diff < 60) {
		return date($format,$val).$linebreak.$diff . ' 秒前';
	} elseif ($diff < 3600) {
		return date($format,$val).$linebreak.floor($diff/60) . ' 分鐘前';
	} elseif ($diff < 86400) {
		return date($format,$val).$linebreak.floor($diff/3600) . ' 小時前';
	} elseif ($diff < 604800) {
		return date($format,$val).$linebreak.floor($diff/86400) . ' 天前';
	} else {
		return date($format,$val);
		//return floor($diff/604800) . '週前';
	}
}


/**
 * Returns the values from a single column of the input array, identified by
 * the $columnKey.
 *
 * Optionally, you may provide an $indexKey to index the values in the returned
 * array by the values from the $indexKey column in the input array.
 *
 * @param array $input A multi-dimensional array (record set) from which to pull
 *                     a column of values.
 * @param mixed $columnKey The column of values to return. This value may be the
 *                         integer key of the column you wish to retrieve, or it
 *                         may be the string key name for an associative array.
 * @param mixed $indexKey (Optional.) The column to use as the index/keys for
 *                        the returned array. This value may be the integer key
 *                        of the column, or it may be the string key name.
 * @return array
 */
if(!function_exists("array_column")){
	function array_column($input = null, $columnKey = null, $indexKey = null)
	{
		// Using func_get_args() in order to check for proper number of
		// parameters and trigger errors exactly as the built-in array_column()
		// does in PHP 5.5.
		$argc = func_num_args();
		$params = func_get_args();
	
		if ($argc < 2) {
			trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
			return null;
		}
	
		if (!is_array($params[0])) {
			trigger_error('array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING);
			return null;
		}
	
		if (!is_int($params[1])
		&& !is_float($params[1])
		&& !is_string($params[1])
		&& $params[1] !== null
		&& !(is_object($params[1]) && method_exists($params[1], '__toString'))
		) {
			trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
			return false;
		}
	
		if (isset($params[2])
		&& !is_int($params[2])
		&& !is_float($params[2])
		&& !is_string($params[2])
		&& !(is_object($params[2]) && method_exists($params[2], '__toString'))
		) {
			trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
			return false;
		}
	
		$paramsInput = $params[0];
		$paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
	
		$paramsIndexKey = null;
		if (isset($params[2])) {
			if (is_float($params[2]) || is_int($params[2])) {
				$paramsIndexKey = (int) $params[2];
			} else {
				$paramsIndexKey = (string) $params[2];
			}
		}
	
		$resultArray = array();
	
		foreach ($paramsInput as $row) {
	
			$key = $value = null;
			$keySet = $valueSet = false;
	
			if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
				$keySet = true;
				$key = (string) $row[$paramsIndexKey];
			}
	
			if ($paramsColumnKey === null) {
				$valueSet = true;
				$value = $row;
			} elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
				$valueSet = true;
				$value = $row[$paramsColumnKey];
			}
	
			if ($valueSet) {
				if ($keySet) {
					$resultArray[$key] = $value;
				} else {
					$resultArray[] = $value;
				}
			}
	
		}
	
		return $resultArray;
	}
}

if(!function_exists("object_column")){
	function object_column($input = null, $columnKey = null, $indexKey = null)
	{
		// Using func_get_args() in order to check for proper number of
		// parameters and trigger errors exactly as the built-in array_column()
		// does in PHP 5.5.
		$argc = func_num_args();
		$params = func_get_args();
	
		if ($argc < 2) {
			trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
			return null;
		}
	
		if (!is_array($params[0])) {
			trigger_error('array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING);
			return null;
		}
	
		if (!is_int($params[1])
		&& !is_float($params[1])
		&& !is_string($params[1])
		&& $params[1] !== null
		&& !(is_object($params[1]) && method_exists($params[1], '__toString'))
		) {
			trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
			return false;
		}
	
		if (isset($params[2])
		&& !is_int($params[2])
		&& !is_float($params[2])
		&& !is_string($params[2])
		&& !(is_object($params[2]) && method_exists($params[2], '__toString'))
		) {
			trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
			return false;
		}
	
		$paramsInput = $params[0];
		$paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
	
		$paramsIndexKey = null;
		if (isset($params[2])) {
			if (is_float($params[2]) || is_int($params[2])) {
				$paramsIndexKey = (int) $params[2];
			} else {
				$paramsIndexKey = (string) $params[2];
			}
		}
	
		$resultArray = array();
	
		foreach ($paramsInput as $row) {
	
			$key = $value = null;
			$keySet = $valueSet = false;
	
			if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
				$keySet = true;
				$key = (string) $row->$paramsIndexKey;
			}
	
			if ($paramsColumnKey === null) {
				$valueSet = true;
				$value = $row;
			} elseif ( array_key_exists($paramsColumnKey, $row)) {
				$valueSet = true;
				$value = $row->$paramsColumnKey;
			}


	
			if ($valueSet) {

				if ($keySet) {
					$resultArray[$key] = $value;
				} else {
					$resultArray[] = $value;
				}
			}
	
		}
	
		return $resultArray;
	}
}

function startsWith($haystack, $needle)
{
	return !strncmp($haystack, $needle, strlen($needle));
}


function _current_uri(){
	$gets = http_build_query($_GET, '', "&");
	if(!empty($gets)){
		$gets = '?'.$gets;
	}
	return "/".(uri_string().$gets);
}


function _truncate($string, $limit, $break=".", $pad="......")
{
	$string = str_replace("&nbsp;", " ", $string);

	//TODO: review this
	//special exception 
	$string = str_replace("&nbsp", " ", $string);
	
	//

	$string= trim(html_entity_decode($string));
	// return with no change if string is shorter than $limit
	if(mb_strlen($string) <= $limit) return $string;
	return mb_substr($string,0,$limit).$pad;
}


function array_first_item($array){
	if(count($array) > 0 ){
		return $array[0];
	}else{
		return null;
	}
}


function calendar_schema($year,$month){

	$first_date = mktime(0, 0, 0, $month, 1, $year);
	$first_weekday = intval(date("w",$first_date),10);


	$last_time = mktime(0, 0, 0, $month -1, 1, $year);
	$last_days = date("t",$last_time);

	$last_month = date("m",$last_time);
	$last_year = date("Y", $last_time);

	$next_time = mktime(0, 0, 0, $month +1, 1, $year);
	$next_month = date("m",$next_time);
	$next_year = date("Y", $next_time);


	$this_days = date("t",$first_date);


	$cells = Array();
	$week_days = Array();

	$week = 0 ;
	for($ind = 1 ; $ind <= $first_weekday ; ++$ind){
		$week_days[] =  Array("day" => $last_days - $first_weekday + $ind , 
				"year" => $last_year,"month" => $last_month,
				"enable" => false,"week" => $week);

		$week = ($week + 1) %7;
		if($week == 0 ){
			$cells [] =$week_days;
			$week_days = Array();
		}
	}
	for($ind = 1; $ind <= $this_days ;++$ind ){
		$week_days[] =  Array("day" => $ind, 
				"year" => $year,"month" => $month,
				"enable" => true,"week" => $week);
		$week = ($week + 1) %7;
		if($week == 0 ){
			$cells [] =$week_days;
			$week_days = Array();
		}
	}

	$shifts = 7 - $week;
	$last_day = 1;
	for($ind = 0 ; $ind <= $shifts ; ++ $ind){
		$last_day = $ind +1;
		$week_days[] =  Array("day" => $ind +1, 
			"year" => $next_year,"month" => $next_month,
			"enable" => false,"week" => $week);
		$week = ($week + 1) %7;
		$last_day++;
		
		if($week == 0 ){
			$cells [] =$week_days;
			$week_days = Array();
		}
	}

	if(count($cells) < 6){
		for($ind = 0 ; $ind < 7  ; ++ $ind){
			$week_days[] =  Array("day" => $ind + $last_day, 
				"year" => $next_year,"month" => $next_month,
				"enable" => false,"week" => $week);
			$week = ($week + 1) %7;
			if($week == 0 ){
				$cells [] = $week_days;
				$week_days = Array();
			}
		}		
	}
	
	return $cells;
}

/**
 * Supplementary json_encode in case php version is < 5.2 (taken from http://gr.php.net/json_encode)
 */
if (!function_exists('json_encode'))
{
    function json_encode($a=false)
    {
        if (is_null($a)) return 'null';
        if ($a === false) return 'false';
        if ($a === true) return 'true';
        if (is_scalar($a))
        {
            if (is_float($a))
            {
                // Always use "." for floats.
                return floatval(str_replace(",", ".", strval($a)));
            }

            if (is_string($a))
            {
                static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
                return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
            }
            else
            return $a;
        }
        $isList = true;
        for ($i = 0, reset($a); $i < count($a); $i++, next($a))
        {
            if (key($a) !== $i)
            {
                $isList = false;
                break;
            }
        }
        $result = array();
        if ($isList)
        {
            foreach ($a as $v) $result[] = json_encode($v);
            return '[' . join(',', $result) . ']';
        }
        else
        {
            foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
            return '{' . join(',', $result) . '}';
        }
    }
}



function _percent($a,$b){
	$num = intval(($a / ($a + $b)) * 100,10);
	if($num < 10){
		return "0".$num."%";
	}
	return $num."%";
}


function _diff_days($time1,$time2){
	if($time1 > $time2){
		return 0;
	}

	return intval(($time2 - $time1) / 86400,10) ;
}

function _padding_zero($num){
	if($num < 10){
		return "0".$num;
	}
	return $num;
}

function _diff_hours($time1,$time2){
	if($time1 > $time2){
		return 0;
	}

	$times = ($time2 - $time1) % 86400 ;

	$hours = intval($times/3600,10);
	$minutes = intval(($times%3600)/60,10);

	return _padding_zero($hours).":"._padding_zero($minutes);
}

function get_client_ip() {
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP'])){
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	}else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else if(isset($_SERVER['HTTP_X_FORWARDED'])){
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	}else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	}else if(isset($_SERVER['HTTP_FORWARDED'])){
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	}else if(isset($_SERVER['REMOTE_ADDR'])){
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	}else{
		$ipaddress = 'UNKNOWN';
	}

	return $ipaddress;
}

function auto_link_text($text) {
    $pattern  = '#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#';
    return preg_replace_callback($pattern, 'auto_link_text_callback', $text);
}

function auto_link_text_callback($matches) {
    $max_url_length = 50;
    $max_depth_if_over_length = 2;
    $ellipsis = '&hellip;';

    $url_full = $matches[0];
    $url_short = '';

    if (strlen($url_full) > $max_url_length) {
        $parts = parse_url($url_full);
        $url_short = $parts['scheme'] . '://' . preg_replace('/^www\./', '', $parts['host']) . '/';

        $path_components = explode('/', trim($parts['path'], '/'));
        foreach ($path_components as $dir) {
            $url_string_components[] = $dir . '/';
        }

        if (!empty($parts['query'])) {
            $url_string_components[] = '?' . $parts['query'];
        }

        if (!empty($parts['fragment'])) {
            $url_string_components[] = '#' . $parts['fragment'];
        }

        for ($k = 0; $k < count($url_string_components); $k++) {
            $curr_component = $url_string_components[$k];
            if ($k >= $max_depth_if_over_length || strlen($url_short) + strlen($curr_component) > $max_url_length) {
                if ($k == 0 && strlen($url_short) < $max_url_length) {
                    // Always show a portion of first directory
                    $url_short .= substr($curr_component, 0, $max_url_length - strlen($url_short));
                }
                $url_short .= $ellipsis;
                break;
            }
            $url_short .= $curr_component;
        }

    } else {
        $url_short = $url_full;
    }

    return "<a rel=\"nofollow\" target=\"_blank\" href=\"$url_full\">$url_short</a>";
}


/**
 * nl2p()
 * convert multiple new lines to p tags with an optional class assigned to the p tags
 * @param mixed $string
 * @param string $class
 * @return
 */
function nl2p($string, $class='') {
    $class_attr = ($class!='') ? ' class="'.$class.'"' : '';
    return
        '<p'.$class_attr.'>'
        .preg_replace('#(<br\s*?/?>\s*?){2,}#', '</p>'."\n".'<p'.$class_attr.'>', nl2br($string))
        .'</p>';
}

//only used in newsml
function getTime($strTime,$op="-",$day=0,$hr=8,$min=0)
{
  $time = strtotime($strTime);
  if($op=='+')
  {
    $getTime = $time+($day*24*60*60+$hr*60*60+$min*60);
  }
  else if($op=='-')
  {
    $getTime = $time-($day*24*60*60+$hr*60*60+$min*60);
  }
  return $getTime;
}


function _time_diff($label,$time,$show = false){
	$time_end = microtime(true);

	if(SHOW_LOG || (isset($_GET["profile"]) && $_GET["profile"] == "tonyq")){
		$show = true;
	}
	if($show){
		echo $label.":".($time_end - $time)."<br />";
	}
}

function mkdirs($dir, $mode = 0777, $recursive = true) {
  if( is_null($dir) || $dir === "" ){
    return FALSE;
  }
  if( is_dir($dir) || $dir === "/" ){
    return TRUE;
  }
  if( mkdirs(dirname($dir), $mode, $recursive) ){
    return mkdir($dir, $mode);
  }
  return FALSE;
}

function is_mobile_or_specify($pcview,$detect){
	if($pcview != ""){
		return $pcview == "1" ? false : true;
	}

	if ( $detect->isMobile() && !$detect->isTablet()) {
		return true;
	}
	return false;
		
}

function _get_category_by_key($key){
	$cats = _project_category();

	foreach($cats as $cat){
		if($cat["key"] == $key){
			return $cat;
		}
		foreach($cat["childs"] as $child){
			if($child["key"] == $key){
				return $child;
			}
		}
	}	
	return Array("name" => "其他 / OTHER","key" => "other");
}

function _project_category(){
	$categorys = Array();

	$category[] = Array(
		"name" => "電子 / Electronics",
		"key" => "electronics",
		"childs" => Array(
			Array("name" => "開發板 / Arduino","key" => "arduino"),
			Array("name" => "電腦 / computers","key" => "computers"),
			Array("name" => "行動設備 / Mobile","key" => "mobile"),
			Array("name" => "Raspberry Pi","key" => "raspberrypi"),
			Array("name" => "機器人 / Robotics","key" => "robotics"),
		)
	);

	$category[] = Array(
		"name" => "工藝 / CRAFT",
		"key" => "craft",
		"childs" => Array(
			Array("name" => "針織 / KNITTING","key" => "knitiing"),
			Array("name" => "紙藝 / PAPER CRAFT","key" => "paper-craft"),
			Array("name" => "裁縫 / SEWING","key" => "sewing"),
		)
	);
	$category[] = Array(
		"name" => "V-MAKER 活動 / ACTIVITIES",
		"key" => "activity",
		"childs" => Array(
			Array("name" => "自造活動 / EVENT","key" => "events"),
			Array("name" => "自造者卡車 / FAB TRUCK","key" => "fab-truck"),
			Array("name" => "創客英雄 / HERO","key" => "hero"),
		)
	);
	$category[] = Array(
		"name" => "其他 / OTHER",
		"key" => "craft",
		"childs" => Array(
			Array("name" => "其他 / OTHER","key" => "other"),
		)
	);
	return $category;
}
