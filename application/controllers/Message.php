<?php

class Message extends  CI_Controller{

    public function send_message(){
        if($this->input->post('message_sent')!== false){

            //load model
            $this->load->model('Message_model');


            //is the user logged in?
            if (isset($_SESSION['user_id'])){
                //TODO: it dose not work
                $sender_id = $_SESSION['user_id'];
            }
            else{
                $sender_id = $_COOKIE["sender_id"];
            }

            $data = array(
                'message' => $_POST['message'],
                'conversation' => $_SESSION['conversation_id'],
                'sender_id' => $sender_id,
            );



            //Adding message to the conversation db
            $this->Message_model->post_message($data);
            //TODO: implmenent this
          //  $this->print_conversation();
        }
        else{
            $this->load->view('pages/chat');
            exit();
        }
        $this->load->view('pages/chat');



    }
    public function display_conversation(){
        //load model
        $this->load->model('Message_model');

        $this->Message_model->print_conversation($_SESSION['conversation_id']);

    }





}