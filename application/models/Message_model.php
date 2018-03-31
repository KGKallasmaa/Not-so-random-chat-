<?php

class Message_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

   public function post_message($data){

       $new_data = array(
           'conversation' => $data['conversation'],
           'sender_id'  => $data['sender_id'],
       );
       //For every pair of (conversation_id and sender_id) there is only one row in the db
       if ($this->conversation_sender_excists($new_data['conversation'],$new_data['sender_id']) == false){
           $this->db->insert('posts', $new_data);
       }
       $new_data['message'] = $data['message'];
       $new_data['sender_name'] = $data['sender_name'];


       //creating new file
       $file_name = strval($new_data['conversation'].".txt");

      // echo $file_name;


       $handle = fopen("application/conversations/".$file_name, 'a') or die('Cannot open file:  '.$file_name);
       $message_to_be_written = strval($new_data['sender_name']." (".date("Y-m-d h:i:sa")."):   ".$new_data['message']."\n");
       fwrite($handle, $message_to_be_written);
       fclose($handle);
   }
   function conversation_sender_excists($conversation_id,$sender_id){
        $this->db->select("*");
       $this->db->where(array("conversation"=>$conversation_id,"sender_id"=>$sender_id));
       $query = $this->db->get('posts');
       if ($query->num_rows() == 1){
           return true;
       }
       return false;
   }

   public function print_conversation($conversation_id){
        $my_file = strval("application/conversations/".$conversation_id.".txt");
       echo "File name: ".strval($my_file);
        if(file_exists($my_file)){
            echo "file exists";
            $file = fopen($my_file, 'r');

            while(! feof($file))
            {
                echo fgets($file). "<br />";
            }
            fclose($file);
        }
   }
   function chat_to_join($my_id){
       $this->db->select("conversation_id");
       $this->db->where(array('sender1' != $my_id,'sender2' != $my_id));
       $this->db->limit(1);
       $query = $this->db->get('current_chats');
       return json_encode($query->result_array());
   }

}