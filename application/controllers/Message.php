<?php

class Message extends  CI_Controller{

    function __construct() {
        parent::__construct();
    }

    public function send_message(){

        if($this->input->post('message_sent')!== false){

            //load model
            $this->load->model('Message_model');
            //is the user logged in?
            if (!isset($_SESSION['logged_in'])){
                if (!isset($_SESSION['user_name'])){
                    $random = rand(1,PHP_INT_MAX);
                    $_SESSION['user_name'] = "Unregistered user(".$random.")";
                }
            }

            //Is this the first message in this conversation?
            //TODO

            $data = array(
                'message' => $_POST['message'],
                'sender_name' =>$_SESSION['user_name'],
            );

            //Adding message to the conversation db
            $this->Message_model->post_message($data);
            redirect( '/index.php/Pages/chat','refresh');

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
        echo "I'm here";
        if ($this->input->post('next') !== false) {
            //Is the user logged in?
            if (isset($_SESSION["logged_in"])){
                if ($_SESSION("logged_in")){

                    echo "old conversation_id".$_SESSION['conversation_id'];

                    $data = array(
                        'conversation_id' => $_SESSION['conversation_id'],
                        'other_sender_name' => $_SESSION['other_sender_name'],
                        'topic' => $_SESSION['topic'],
                    );
                    foreach ($data as $key){
                        $this->session->unset_userdata($key);
                    }
                    echo "new conversation_id".$_SESSION['conversation_id'];
                    redirect( '/index.php/Pages/chat','refresh');
                }
                else{
                    redirect( '/index.php/Pages/chat','refresh');
                }
            }
        }
    }
    public function save_message(){
        //loading the model
        $this->load->model('Message_model');
        $this->Message_model->save_message();
    }





}