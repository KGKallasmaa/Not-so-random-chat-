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
       $sql = "call add_current_chat(?,?,?)";
       if ($random >= 0.5){
           //Joining excising chat
           $suitable_conversation_id = $this->chat_to_join($my_id);
           $sender_1 = $this->get_other_id($my_id,$suitable_conversation_id);
         //  sleep(5);
           $query = $this->db->query($sql,array($suitable_conversation_id,$sender_1,$my_id));

           return $suitable_conversation_id;
       }
       //Generating new chat id
       $random = rand(1,PHP_INT_MAX);
       //insert it into the db
       $query = $this->db->query($sql,array($random,$my_id,null));
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
       $sql = "call chat_to_join(?)";
       $query = $this->db->query($sql,array($my_id));
       $result = $query->row_array();
       return $result['conversation_id'];

   }
   function get_other_id($my_id,$conversation_id){
       $sql = "call other_id(?,?)";
       $query = $this->db->query($sql,array($my_id,$conversation_id));
       $result = $query->row_array(); //sender1 and sender2
       if($result['sender_1'] == $my_id){
            return $result['sender_2'];
       }
       return $result['sender_1'];


      // $sql = "call member_add(?,?,?)";
      // $execute = $this->db->query($sql, array('irfan','ashraf','email.com'));
   }

    //TODO: fix this
    /*
     *
     *  function get_other_name ($other_sender_id){
        if ($other_sender_id == null){
            return 'Rando, the ultimate user(user_id = null)';
        }
        //return "tere";
       //do we have that id in the database?
       //load model
       $this->load->model('Auth_model');


       if ($this->Auth_model-> get_userpicture_name($other_sender_id) == "Nope"){
           return 'Brandon, the almost ultimate user(user not in db)';
       }
        $sql = "call other_name(?)";
        $query = $this->db->query($sql,array($other_sender_id));
        $result = $query->row_array();
        return $result['user_name'];
   }
     */
    function get_other_name ($other_sender_id){
        return "Broken";
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
            $this->db->update('saved_conversation',$data);


        }
        //redirecting the user back to chat screen
        //TODO: implement special login and save
        redirect( '/index.php/Pages/test2');
    }

    function number_of_current_chats(){
    $this->db->select("conversation_id");
    $query = $this->db->get("current_chats");
    return $query->num_rows();
    }

    function log_out_from_chat($sender_id){
        $sql = "call log_out_from_chat(?)";
        $query = $this->db->query($sql,array($sender_id));
    }
    function sender_names($type){
        //type = sender1 or sender2
        $sql = "call sender_names()";
        $query = $this->db->query($sql,array());
        $result = $query->row_array(); //sender1, sender_1_name, sender2, sender_2_name
        if($type == "1"){
            return $result['sender_2_name'];
        }
        return $result['sender_1_name'];
    }
    function chat_topics(){
        $this->db->select("chat_topic");
        $query = $this->db->get("current_chats");
        $result = $query->row_array();
        return $result['chat_topic'];
    }


}