<?php

class Message_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function post_message()
    {
        //TODO
        if (isset($_SESSION['conversation_id'])) {
            $data[] = array($_SESSION['user_name'], time(), $_POST['message']);
            $file_location = 'application/conversations/' . $_SESSION['conversation_id'] . '.json';
            if (!file_exists($file_location)) {
                fopen($file_location, "w");
            } else {
                $current_data = file_get_contents($file_location);
                $array_data = json_decode($current_data, true);
                //   $profile_pic =  "0."width=\"40\" height=\"40\" />";
                $extra = array(
                    //    <img src="<?php echo base_url('images/profile_pictures/'.$_SESSION['user_picture']
                    'sender_picture' => "test",
                    'sender' => $_SESSION['user_name'],
                    'message' => $_POST["message"]
                );
                $array_data[] = $extra;
                $final_data = json_encode($array_data);
                file_put_contents($file_location, $final_data);
            }
        }
    }

    public function get_conversation_id($my_id)
    {
        //TODO
        //is the current session conversation id set?
        if (isset($_SESSION['conversation_id'])) {
            return $_SESSION['conversation_id'];
        }
        //1. Joining excising chat
        $chat_line = $this->chat_line();
        if (!empty($chat_line)) {
            //setting myself as sender_1 or sender_2
            $data = array(
                'conversation_id' => $chat_line['conversation_id'],
            );
            if ($chat_line['sender_1'] == null) {
                $data['sender_1'] = $my_id;
            } else {
                $data['sender_2'] = $my_id;
            }
            $sql = "call add_current_chat(?,?,?,?)";
            $this->db->query($sql, array($data['conversation_id'], $data['sender_1'], $data['sender_2'], $_SESSION['chat_topic']));
            //   $this->db->insert('current_chats', $data);
            // $this->db->close();
            return $chat_line['conversation_id'];
        }

        //grating new chat

        $conversation_id = rand(1, PHP_INT_MAX);
        //insert it into the db
        //TODO: implement procedure
        $data = array(
            'conversation_id' => $conversation_id,
            'sender_1' => $my_id,
            'sender_2' => null,
            'chat_topic' => $_SESSION['chat_topic'],
        );
        // $query->next_result();
        // $query->free_result();
        $sql = "call add_current_chat(?,?,?,?)";
        $this->db->query($sql, array($data['conversation_id'], $data['sender_1'], $data['sender_2'], $data['chat_topic']));
        // $this->db->insert('current_chats', $data);
        // $this->db->close();
        return $conversation_id;
    }

    public function print_conversation($conversation_id)
    {
        $my_file = strval("application/conversations/" . $conversation_id . ".txt");
        echo "File name: " . strval($my_file);
        if (file_exists($my_file)) {
            echo "file exists";
            $file = fopen($my_file, 'r');

            while (!feof($file)) {
                echo fgets($file) . "<br />";
            }
            fclose($file);
        }
    }


    public function get_chat_file()
    {
        $current_message_Data = file_get_contents("application/conversations/" . $_SESSION['conversation_id'] . ".json");

        print_r($current_message_Data);
        // echo "<script type='text/javascript'> alert('".json_encode($current_message_Data)."') </script>";

        //  return json_encode($current_message_Data);
        return $current_message_Data;

    }


    function get_other_id($my_id, $conversation_id)
    {
      //  mysqli_next_result($this->db->conn_id);
        $sql = "call other_id(?,?)";
        $query = $this->db->query($sql, array($my_id, $conversation_id));
        $result = $query->row_array(); //sender1 and sender2
        if ($result['sender_1'] == $my_id) {
            //   $this->db->close();
            return $result['sender_2'];
        }
        // $this->db->close();
        return $result['sender_1'];
    }

    //TODO: fix this


    function get_other_name($other_sender_id)
    {
        mysqli_next_result($this->db->conn_id);
        if ($other_sender_id == null) {
            return 'Rando, the ultimate user(user_id = null)';
        }
        //return "tere";
        //do we have that id in the database?
        //load model
        $this->load->model('Auth_model');
        if ($this->Auth_model->get_userpicture_name($other_sender_id) == "Nope") {
            return 'Brandon, the almost ultimate user(user not in db)';
        }

        $sql = "call other_name(?)";
        $query = $this->db->query($sql, array($other_sender_id));
        $result = $query->row_array();
        return $result['user_name'];
    }


    public function save_chat()
    {
        $data = array(
            'conversation_id' => $_SESSION['conversation_id'],
            'topic_img' => $_SESSION['topic_pic'],
            'sender_id' => $_SESSION['user_id'],
        );
        $sql = "call save_chat(?,?,?)";
        //  mysqli_next_result($this->db->conn_id);
        $query = $this->db->query($sql, array($data['conversation_id'], $data['topic_img'], $data['sender_id']));
        $message = lang("save_message");
        echo "<script type='text/javascript'>alert('$message');</script>";
        $result = $query->row_array();


        // redirect( '/index.php/Pages/chat');
    }

    function number_of_current_chats()
    {
        $this->db->select("conversation_id");
        $query = $this->db->get("current_chats");
        return $query->num_rows();
    }

    public function log_out_from_chat($sender_id)
    {
        $sql = "call log_out_from_chat(?)";
        //  mysqli_next_result($this->db->conn_id);
        $query = $this->db->query($sql, array($sender_id));
        //  mysqli_next_result($this->db->conn_id);
        // $result = $query->result();

        //  $query->next_result();
        //   $query->free_result();
        //   return $result;
    }

    function sender_names($type)
    {
        //type = sender1 or sender2
        $sql = "call sender_names()";
        $query = $this->db->query($sql, array());

        // mysqli_next_result($this->db->conn_id);

        $result = $query->row_array(); //sender1, sender_1_name, sender2, sender_2_name
        if ($type == "1") {
            return $result['sender_2_name'];
        }
        return $result['sender_1_name'];
    }

    function chat_topics()
    {
        $this->db->select("chat_topic");
        $query = $this->db->get("current_chats");
        $result = $query->row_array();
        return $result["chat_topic"];
    }

    function chat_line()
    {
        mysqli_next_result($this->db->conn_id);
        $sql = "call chat_line()";
        $query = $this->db->query($sql, array());
        mysqli_next_result($this->db->conn_id);
        $res = $query->row_array();
        return $res;
    }

    function getSavedConversations()
    {
        //Returns: topic,sender,conversationid
        $sql = "call load_saved_chats(?)";
        $query = $this->db->query($sql, array($_SESSION['user_id'])); //saved_conversation_id,topic_img,sender_id
        if ($query->num_rows() >= 1) {
            $res = $query->row_array();
            echo "<script type='text/javascript'>alert($query->num_rows());</script>";
            return $res;
        }
        $data = array(
            'saved_conversation_id' => 'sample.json',
            'topic_img' => 'sample.gif',
            'sender_id' => '1113'
        );
        return json_encode($data);
    }

}