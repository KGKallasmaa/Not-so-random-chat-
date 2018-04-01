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

        $json = $this->Stat_model->get_users_data();

        $visitors = array();


        $i = 0;

        while($row = json_decode($json)->fetch()){
            $visitors[$i]['sender_id'] = $row['sender_id'];
            $visitors[$i]['sender_browser'] = $row['sender_browser'];
            $visitors[$i]['sender_os'] = $row['sender_os'];
            $visitors[$i]['sender_timezone'] = $row['sender_timezone'];
            $visitors[$i]['sender_times_visited'] = $row['sender_times_visited'];
            $visitors[$i]['sender_saved_conversations'] = $row['sender_saved_conversations'];
            $i++;
        }



        $this->load->view("pages/stat",$visitors);
    }

}