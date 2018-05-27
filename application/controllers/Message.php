<?php

class Message extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function send_message()
    {
        if ($this->input->post('message_sent') !== false) {
            $message = $this->input->post('message');
            $file_name = "application/conversations/".$_SESSION['conversation_id'].".json";

            //0. Do we have that file?
            if (!file_exists($file_name)){
                $file = fopen($file_name,'w');
                fclose($file);
            }

            //1. add new message data to a file
            $current_message_Data = file_get_contents("application/conversations/".$_SESSION['conversation_id'].".json");
            $array_data = json_decode($current_message_Data,true);

            $new_data = array(
                'my_sender_id' => $_SESSION['my_sender_id'],
				'user_name' => $_SESSION['user_name'],
				'sender_picture' => $_SESSION['user_picture'],
                'message' => $message,
            );

            $array_data[] = $new_data;
            $final_data[] = json_encode($array_data);
            if (file_put_contents($file_name,$final_data)){
                ;
            }
            else{
                echo "<script type='text/javascript'>alert('Adding new message data to the file was not successful');</script>";
            }
            redirect('Pages/chat', 'refresh');

        } else {
            redirect('Pages/chat', 'refresh');
        }
        redirect('Pages/chat', 'refresh');
    }
    public function get_conversation()
    {
        //todo
        $sql = "call load_conversation(?)";
        $query = $this->db->query($sql, array($_SESSION['conversation_id']));
        return json_encode($query->row_array());
    }

    public function next_chat()
    {
        $message = "I'm here";
        if ($this->input->post('next') !== false) {

            echo "<script type='text/javascript'>alert('$message');</script>";
            //Is the user logged in?
            if (isset($_SESSION["logged_in"])) {
                $data = array(
                    'conversation_id' => $_SESSION['conversation_id'],
                    'other_sender_name' => $_SESSION['other_sender_name'],
                    'topic' => $_SESSION['topic'],
                );
                foreach ($data as $key) {

                    unset($key);
                    //  $this->session->unset_userdata($key);
                }
                redirect('Pages/chat', 'refresh');
            } else {
                $data = array(
                    'conversation_id' => $_SESSION['conversation_id'],
                    'other_sender_name' => $_SESSION['other_sender_name'],
                );
                foreach ($data as $key) {
                    unset($key);
                    //  $this->session->unset_userdata($key);
                }
                redirect('chat', 'refresh');
            }
        }
        redirect('chat', 'refresh');
    }

    public function save_chat()
    {
        //loading the model
        $this->load->model('Message_model');
        $this->Message_model->save_chat();
    }
    public function getSavedConversations(){}
}