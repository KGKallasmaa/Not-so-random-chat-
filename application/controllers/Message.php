<?php

class Message extends  CI_Controller{

    public function send_message($message){

        if($this->input->post('message_sent') !== false){

            //Is this the first message in this conversation?
            if($this->contains_conversations($_SESSION['conversation_id'])){
                //NO
                $this->db->insert($message);
                $this->db->where('conversation_id',$_SESSION['conversation_id']);
                $query = $this->db->get('message');
            }
            else{
                //YES
                $this->db->insert('conversation_id');
                $query = $this->db->get('conversations');
            }


        }
    }
    public function number_of_conversations(){
        $this->db->select("*");
        $query = $this->db->get('conversations');
        return $query->num_rows();
    }
    function contains_conversations($id){
        $this->db->select("*");
         $this->db->where('conversation_id',$id);
        $query = $this->db->get('conversations');

        if ($query->num_rows() >= 1){
            return true;
        }
        return false;
    }
    public function load_conversation(){
        ;
    }

}