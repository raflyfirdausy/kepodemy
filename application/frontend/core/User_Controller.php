<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Controller extends MY_Controller
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

    protected function loadViewUser($view = NULL, $local_data = array(), $asData = FALSE)
    {
        if (!file_exists(APPPATH . "views/$view" . ".php")) {
            show_404();
        }

        $local_data["__content"] =  $this->loadView($view, $local_data, TRUE);
        $this->loadView("template/main", $local_data);
    }  
}
