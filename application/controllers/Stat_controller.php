<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 01.04.2018
 * Time: 1:17
 */
class Stat_controller extends CI_Controller {


    function __construct(){
        parent::__construct();
    }
    public function add_sender_data($data){

        //load model
        $this->load->model('Stat_model');

        $return = $this->Stat_model->add_sender_data($data);

        $this->load->view("pages/header",$return);
    }
    public function get_users_data(){
        //load model
        $this->load->model('Stat_model', '', TRUE);
        $data = $this->Stat_model->get_users_data();
        return $data;
    }

}