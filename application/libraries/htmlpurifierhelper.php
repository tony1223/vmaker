<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(dirname(__FILE__)."/htmlpurifier/HTMLPurifier.auto.php");

class HtmlpurifierHelper
{
	protected 	$ci;
	public function __construct()
	{
        $this->ci =& get_instance();
	}

	

}

/* End of file htmlpurifier.php */
/* Location: ./application/libraries/htmlpurifier.php */

?>