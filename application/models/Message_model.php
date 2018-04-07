<?php

class Message_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

   public function post_message($data){
        //TODO
       /*
        *
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
        */

   }

   public function get_conversation_id($my_id)
   {
       //TODO
       //is the current session conversation id set?
       if (isset($_SESSION['conversation_id'])){
           return $_SESSION['conversation_id'];
       }

       //am I currently in a chat?
       $query = $this->db->query("my_conversation_id(" . $my_id . ")");
       if ($query->num_rows() == 1) {
           //YES
           return $query->result();
       }
       $random = rand(0,1);
       if ($random >= 0.5){
           //Joining excising chat
       }
       //Generating new chat id
       $random = rand(1,PHP_INT_MAX);
       return $random;


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
        //TODO;
       return null;
       /*
        *  $this->db->select("conversation_id");
       $this->db->where(array('sender1' != $my_id,'sender2' != $my_id));
       $this->db->limit(1);
       $query = $this->db->get('current_chats');
       return json_encode($query->result_array());
        */
   }
   public function get_other_id(){
        //TODO;
        return null;
   }

}