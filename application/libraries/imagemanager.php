<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(dirname(__FILE__)."/rss/rss_generator_b2b.inc.php");

class ImageManager
{
	protected 	$ci;
	public function __construct()
	{
        $this->ci =& get_instance();
	}

	
	public function recent($last = null,$limit = 30){
		$images = fake_images($limit);
		return $images;
	}

	public function albums($last = null,$limit =10 ){
		$albums = fake_albums( $limit );
		return $albums;
	}

	public function album_images($albumID,$last = null,$limit = 30){
		$images = fake_images( $limit );
		return $images;
	}

}

/* End of file htmlpurifier.php */
/* Location: ./application/libraries/htmlpurifier.php */

