<?php

class Message extends  CI_Controller{

    public function send_message(){
        if($this->input->post('message_sent') !== false){
            //Adding the message to the conversation table

            //is the user logged in?
            if (isset($_SESSION["user_id"])){
                $sender_id = $_SESSION["user_id"];
            }
            else{
                $sender_id = $_COOKIE["sender_id"];
            }

            $data = array(
                'message' => $_POST['message'],
                'conversation' => $_SESSION['conversation_id'],
                'fk_user_id' => $sender_id
            );
            $this->db->insert('posts',$data);
        }
        print_conversation();
    }
    public function print_conversation()
    {
        if ($this->input->post('message_sent') !== false) {
            $messages = get_conversation_messages();
            foreach ($messages as $message) {
                echo $message;
            }
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