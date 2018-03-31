<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 13.03.2018
 * Time: 22:24
 */

class Stat_model extends CI_Model{


    public function add_sender_data($data){
        //How many times has the user visited us before?
        $new_number_of_times_visited = $this->number_of_visits($data['sender_id'])+1;
        //Number of saved conversations?
        $new_number_of_saved_conversations = $this->number_of_conversations($data['sender_id'])+1;

        //updating data_file
        $new_data = array(
            'sender_id' => $data['sender_id'],
            'sender_browser' => $data['browser'],
            'sender_os' => $data['os'],
            'sender_timezone'  => $data['timezone'],
            'sender_times_visited'  => $new_number_of_times_visited,
            'sender_saved_conversations'  => $new_number_of_saved_conversations,
        );
        //open database

        //should I update or insert?
        if ($new_number_of_times_visited == 1){
            //insert
            $this->db->insert('user_statistics', $new_data);
        }
        else{
          //update
            $this->db->set('sender_browser','sender_os','sender_timezone','sender_times_visited', 'sender_saved_conversations');
            $this->db->where('sender_id',$new_data['sender_id']);
            $this->db->update('user_statistics');
        }

    }

    public function get_sender_data($sender_id){
        $query = $this->db->get_where('user_statistics', array('sender_id' => $sender_id));
        return json_encode($query->result_array());
    }

    function number_of_visits($sender_id){
        $this->db->select('sender_times_visited');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics');
        return json_encode($query->result_array());

    }

    function number_of_conversations($sender_id){
        $this->db->select('sender_saved_conversations');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics');
        return json_encode($query->result_array());
    }
}

