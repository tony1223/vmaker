<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find extends MY_Controller {

var $_events = array ( 
	    0 => array ( 'index' => '1', 'start' => '4/8', 'end' => '4/10', 'name' => '國立中興大學附屬臺中高級農業職業學校 ',
	    	'address' => "40146 臺中市東區台中路283號" ,
	    	"lat" => 24.1287304,
    		"lng"=> 120.68517369999995), 
	    1 => array ( 'index' => '2', 'start' => '4/13', 'end' => '4/15 上午', 'name' => '國立沙鹿高級工業職業學校 ', 
	    	'address' => "台中市沙鹿區臺灣大道7段823號",
	    	"lat"=> 24.2385428,
    		"lng"=> 120.5678754
    	), 
	    2 => array ( 'index' => '3', 'start' => '4/15', 'end' => '4/17', 'name' => '國立彰化師範大學附屬高級工業職業學校 ', 
	    	'address' => "50075 彰化市和調里工校街 1 號",
	    	"lat"=> 24.0825928,
    		"lng"=> 120.5559717
	    	), 
	    3 => array ( 'index' => '4', 'start' => '4/20', 'end' => '4/22上午', 'name' => '國立彰化高級商業職業學校 ', 
	    	'address' => '彰化市南郭路一段326號',
	    	"lat"=> 24.0729395, "lng"=> 120.5531255 ) , 
	    4 => array ( 'index' => '5', 'start' => '4/22', 'end' => '4/24', 'name' => '國立溪湖高級中學',
	    	'address' => '51452彰化縣溪湖鎮大溪路二段86號',    
	    	"lat"=> 23.9680344, "lng"=> 120.4871833 ), 
	    5 => array ( 'index' => '6', 'start' => '4/27', 'end' => '4/29', 'name' => '國立嘉義高級家事職業學校 ',
	    	'address' => '嘉義市市宅街57號' ,
	    	"lat"=> 23.4717071, "lng"=> 120.4586978), 
	    6 => array ( 'index' => '7', 'start' => '5/05', 'end' => '5/07', 'name' => '國立新營高級工業職業學校 ',
	    	'address' => '台南市新營區中正路六十八號' ,
	    	   "lat"=> 23.3132755, "lng"=> 120.3168308 
	    	), 
	    7 => array ( 'index' => '8', 'start' => '5/11', 'end' => '5/13', 'name' => '國立臺南高級海事水產職業學校',
	    	'address' => '臺南市安平區世平路ㄧ號',
	    	   "lat"=> 22.9935902, "lng"=> 120.1517736), 
	    8 => array ( 'index' => '9', 'start' => '5/18', 'end' => '5/20上午', 'name' => '國立臺南高級商業職業學校 ',
	    	'address' => '702臺南市南區健康路一段327號',
	    	    "lat"=> 22.9812339, "lng"=> 120.202298
	    	 ), 
	    9 => array ( 'index' => '10', 'start' => '5/20', 'end' => '5/22', 'name' => '國立臺南高級工業職業學校 ',
	    	'address' => '710 台南市永康區中山南路 193 號',
	    	    "lat"=> 23.0145585, "lng"=> 120.2335483
	    	 ), 
	    10 => array ( 'index' => '11', 'start' => '5/25', 'end' => '5/27上午', 'name' => '高雄市私立中華藝術學校 ',
	    	'address' => "804高雄市鼓山區美術館89號",
	    	'url' => "http://www.charts.kh.edu.tw/",
	    	    "lat"=> 22.6546495, "lng"=> 120.2891478
	    	), 
	    11 => array ( 'index' => '12', 'start' => '5/27', 'end' => '5/29', 'name' => '國立東港高級海事水產職業學校 ', 
	    	'url' => "http://www.tkms.ptc.edu.tw/ischool/publish_page/0/",
	    	'address' => "屏東縣東港鎮豐漁街66號",
	    	     "lat"=> 22.4651957, "lng"=> 120.4421104
	    	), 
	    12 => array ( 'index' => '13', 'start' => '6/01', 'end' => '6/03', 'name' => '國立臺中女子高級中學', 
	    	'address' => "403 台中市西區自由路一段 95 號",
	    	'url' => "http://campus.tcgs.tc.edu.tw/web/tcgs/",
	    	 "lat"=> 24.1360434, "lng"=> 120.6777654
	    ), 
	    13 => array ( 'index' => '14', 'start' => '6/08', 'end' => '6/10上午', 'name' => '國立臺灣師範大學附屬高級中學 ',
	    	'address' => "10658 台北市大安區信義路三段 143 號",
	    	'url' => "http://www.hs.ntnu.edu.tw/",
	    	 "lat"=> 25.0339538, "lng"=> 121.5405504
	    	 ), 
	    14 => array ( 'index' => '15', 'start' => '6/10', 'end' => '6/12', 'name' => '臺北市立士林高級商業職業學校',
	    	"address" => "11165  臺北市士林區士商路150號",
	    	"url" => "http://www.slhs.tp.edu.tw/" ,
	    	    "lat"=> 25.0945958,"lng"=> 121.5166109
	    	), 
	    15 => array ( 'index' => '16', 'start' => '6/15', 'end' => '6/16', 'name' => '新北市立淡水高級商工職業學校 ', 
	    	"address" => "251 新北市淡水區商工路307號",
	    	"url" => "http://www.tsvs.ntpc.edu.tw/",
	    	    "lat"=> 25.1867923, "lng"=> 121.4541312
	    	), 
	    16 => array ( 'index' => '17', 'start' => '6/17', 'end' => '6/18', 'name' => '新北市立板橋高級中學 ', 
	    	'address' => " 新北市板橋區文化路一段25號",
	    	"url" => "http://www.pcsh.ntpc.edu.tw/",
	    	    "lat"=> 25.0116783, "lng"=> 121.4590795), 
	    17 => array ( 'index' => '18', 'start' => '6/21', 'end' => '6/23', 'name' => '國立桃園高級農工職業學校',
	    	"address" => "(33047)桃園市成功路二段144號",
	    	"url" => "http://www.tyai.tyc.edu.tw/",
	    	    "lat"=> 25.0367776, "lng"=> 121.1030575
	    	 ) 
	   );

	public function index(){
		$this->load->view("find/index",
			Array(
				"pageTitle" => "行程表與志工報名 | 2015 Fab Truck 3D列印校園巡迴計畫",
				"sub" => "school",
				"events" => $this->_events,
			)
		);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */