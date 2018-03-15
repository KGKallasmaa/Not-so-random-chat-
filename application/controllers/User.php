<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 15.03.2018
 * Time: 9:36
 */
class User extends  CI_Controller{
    public function __construct(){
        parent::__construct();
       if (isset($_SESSION['user_logged'])){
           //TODO: this may be a problem
           $this->session->set_flashdata("error","Please login first to view this page");
           redirect("auth/login");

       }
    }

    public function profile(){
        $this->load->view('pages/profile');
    }
}