<?php

class Message_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

   public function post_message($data){
        //TODO
       if (isset($_SESSION['conversation_id'])){
           $file_name = strval($_SESSION['conversation_id'].".txt");
           //creating new file
           $file_name = strval($_SESSION['conversation_id'].".txt");

           // echo $file_name;

           $handle = fopen("application/conversations/".$file_name, 'a') or die('Cannot open file:  '.$file_name);
           $message_to_be_written = strval($data['sender_name']." (".date("Y-m-d h:i:sa")."):   ".$data['message']."\n");
           fwrite($handle, $message_to_be_written);
           fclose($handle);
       }

   }

   public function get_conversation_id($my_id)
   {
       //TODO
       //is the current session conversation id set?
       if (isset($_SESSION['conversation_id'])){
           return $_SESSION['conversation_id'];
       }
       //should I join an excisting chat?

       $random = rand(0,1);
       if ($random >= 0.5){
           //Joining excising chat
           $suitable_conversation_id = $this->chat_to_join($my_id);
           $data = array(
               'conversation_id' => $suitable_conversation_id,
               'sender_2' => $my_id,
           );
           $this->db->insert('current_chats', $data);

           return $data['conversation_id'];
       }
       //Generating new chat id
       $random = rand(1,PHP_INT_MAX);
       //insert it into the db
       $data = array(
           'conversation_id' => $random,
           'sender_1' => $my_id,
       );
       $this->db->insert('current_chats', $data);
       return $data['conversation_id'];
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
       $query = $this->db->query("chat_to_join(".$my_id.")");
       $result = $query->row_array();
       return $result['conversation_id'];

   }
   function get_other_id($my_id,$conversation_id){
       $query = $this->db->query("conversation_id(".$conversation_id.")");
       $result = $query->row_array();
       if($result['sender_1'] == $my_id){
            return $result['sender_2'];
       }
       return $result['sender_1'];
   }
   function get_other_name ($other_sender_id){
       $this->db->select("user_name");
       $this->db->where(array("user_id" => $other_sender_id));
       $query = $this->db->get('users');
       $result = $query->row_array();
       if($query->num_rows() == 0){
           //the user has not registered
           return 'Rando, the ultimate user(the user has not registered yet)';
       }
       return $result['user_name'];
   }

    function save_message(){
        //is the user logged in?
        if (isset($_SESSION['logged_in'])){
            //has the other party already save that conversation?
            $data = array(
                'conversation_id' => $_SESSION['conversation_id'],
            );
            $this->db->select("sender_1");
            $this->db->where('saved_conversation_id',$_SESSION['conversation_id']);
            $query = $this->db->get('saved_conversation');
            if($query->num_rows() == 1){
                //yes
                $data['sender_2'] = $_SESSION['my_sender_id'];
            }

            else{
                //no
                $data['sender_1'] = $_SESSION['my_sender_id'];
            }
            //is this conversation_id in the db
            $this->db->where('conversation_id',$data['conversation_id']);
            $this->db->update('saved_conversation',data);


        }
        //redirecting the user back to chat screen
        //TODO: implement special login and save
        redirect( '/index.php/Pages/test2');
    }


}