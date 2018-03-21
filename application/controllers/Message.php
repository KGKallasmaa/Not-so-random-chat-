<?php

class Message extends  CI_Controller{

    public function send_message(){
        if($this->input->post('message_sent')!== false){


            //is the user logged in?
            if (isset($_SESSION["user_id"])){
                $sender_id = intval($_SESSION["user_id"]);
            }
            else{
                $sender_id = intval($_COOKIE["sender_id"]);
            }

            $data = array(
                'message' => $_POST['message'],
                'conversation' => $_SESSION['conversation_id'],
                'sender_id' => $sender_id
            );
            $this->db->insert('posts',$data);
            //TODO: implmenent this
          //  $this->print_conversation();
        }
        else{
            $this->load->view('pages/chat');
            exit();
        }
        $this->load->view('pages/chat');



    }
    function print_conversation(){
        $results = ($this->get_conversation_messages());

        foreach($results as $message) {
                echo $message."<br/>";
                echo "<br/>";
            }
        }


    public function get_conversation_messages(){
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('conversation',$_SESSION['conversation_id']);
        $this->db->order_by("date", "asc");
        $query = $this->db->get();
        return $query->result();
    }



}