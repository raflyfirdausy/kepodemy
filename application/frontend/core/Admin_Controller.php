<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
    public $userData;
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->has_userdata(SESSION)) {
        //     redirect(base_url("auth/login"));
        // }        
        // $this->userData = $this->session->userdata(SESSION);
    }

    protected function coba()
    {
        return "waawaw";
    }

    protected function loadViewAdmin($view = NULL, $local_data = array(), $asData = FALSE)
    {
        if (!file_exists(APPPATH . "views/$view" . ".php")) {
            show_404();
        }

        $local_data["__content"] =  $this->load->view($view, $local_data, TRUE);
    
        $this->loadView("template/main", $local_data);
        // $this->loadView("template/header", $local_data, $asData);
        // $this->loadView("template/sidebar", $local_data, $asData);
        // $this->loadView($view, $local_data, $asData);
        // $this->loadView("template/footer", $local_data, $asData);
    }

    private function loadKonten($view)
    {
        //GAJADI AOWKOAW
        return $this->load->view($view, NULL, TRUE);
	}
	
	// protected function config($lokasiArsip,$namafilebaru){
	// 	$config  = [
    //         "upload_path"       => $lokasiArsip,
    //         "allowed_types"     => 'gif|jpg|jpeg|png',
    //         "max_size"          => 10240,
    //         "file_ext_tolower"  => FALSE,
    //         "overwrite"         => TRUE,
    //         "remove_spaces"     => TRUE,
    //         "file_name"         => $namafilebaru
	// 	];
		
	// 	return $config;
	// }
}
