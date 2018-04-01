<?php

class Message extends  CI_Controller{

    public function send_message(){
        if($this->input->post('message_sent')!== false){
            //load model
            $this->load->model('Message_model');
            //is the user logged in?
            if (isset($_SESSION['logged_in'])){
                $sender_name = $_SESSION['user_name'];
            }
            else{
                $sender_name = "Unregistered user";
            }

            //Is this the first message in this conversation?
            //TODO


            $data = array(
                'message' => $_POST['message'],
                'conversation' => $_SESSION['conversation_id'],
                'sender_name' => $sender_name,
                'sender_id' => $_SESSION['sender_id'],
            );
            

            //Adding message to the conversation db
            $this->load->Message_model->post_message($data);

        }
        else{
            $this->load->view('pages/chat');
            exit();
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

    public function chat_to_join($myid){
        //TODO: fix this
        if(5>4){
            //load model
            $this->load->model('Message_model');

            $chats_available_json = $this->Message_model->chat_to_join($myid);
            $_SESSION['joined_id'] = $chats_available_json['conversation_id'][0];
            return $chats_available_json['conversation_id'];
        }
    }





}