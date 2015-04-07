<?php
// application/core/MY_Exceptions.php
class MY_Exceptions extends CI_Exceptions {

    public function show_404($page = '', $log_error = true)
    {
        $CI =& get_instance();
        $CI->load->view('rewrite_404.php',Array("showTopAd" => false));

        echo $CI->output->get_output();
        exit;
    }


}