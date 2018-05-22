<?php

class Message extends  CI_Controller{

    function __construct() {
        parent::__construct();
    }

    public function send_message(){

        if($this->input->post('message_sent')!== false){
            //conversation_id
            //message
            //sender_id
            $message = $this->input->post('message');

            $sql = "call send_message(?,?)";
            $query = $this->db->query($sql,array($_SESSION['conversation_id'],$_SESSION['user_id'],$message));
        }
        else{
            redirect( '/index.php/Pages/chat','refresh');
        }
        $this->load->view('pages/chat');
    }


    public function display_conversation(){

        if($this->input->post('message_sent')!== false){
            //load model
            $this->load->model('Message_model');
            $this->Message_model->print_conversation($_SESSION['conversation_id']);
        }
    }

    public function next_chat(){
        $message = "I'm here";
        if ($this->input->post('next') !== false) {

            echo "<script type='text/javascript'>alert('$message');</script>";
            //Is the user logged in?
            if (isset($_SESSION["logged_in"])) {
                $data = array(
                    'conversation_id' => $_SESSION['conversation_id'],
                    'other_sender_name' => $_SESSION['other_sender_name'],
                    'topic' => $_SESSION['topic'],
                );
                foreach ($data as $key) {

                    unset($key);
                  //  $this->session->unset_userdata($key);
                }
                redirect('/index.php/Pages/chat', 'refresh');
            }
                else{
                    $data = array(
                        'conversation_id' => $_SESSION['conversation_id'],
                        'other_sender_name' => $_SESSION['other_sender_name'],
                    );
                    foreach ($data as $key){
                        unset($key);
                      //  $this->session->unset_userdata($key);
                    }
                    redirect( '/index.php/Pages/chat','refresh');
                }
            }
        redirect( '/index.php/Pages/chat','refresh');
    }
    public function save_chat(){
        //loading the model
        $this->load->model('Message_model');
        $this->Message_model->save_chat();
    }
}