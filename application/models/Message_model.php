<?php

class Message_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

   public function post_message($data){

       $new_data = array(
           'message' => $data['message'],
           'conversation' => $data['conversation'],
           'sender_id'  => $data['sender_id'],
       );

       $this->db->insert('posts', $new_data);

   }
   public function print_conversation($conversation_id){
       $this->db->select('*');
       $this->db->where('conversation',$conversation_id);
     //  $this->db->order_by("date", "asc");


       $results = $this->db->get('posts');

        if ($results->num_rows > 0){
            foreach($results as $message) {
                echo $message."<br/>";
                echo "<br/>";
            }
        }

   }

}