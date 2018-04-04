<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 13.03.2018
 * Time: 22:24
 */

class Stat_model extends CI_Model {


    public function add_sender_data($data){
        //How many times has the user visited us before?
        $new_number_of_times_visited = $this->number_of_visits($data['sender_id'])+1;
        //Number of saved conversations?
        $new_number_of_saved_conversations = $this->number_of_conversations($data['sender_id'])+1;

        //updating data_file
        $new_data = array(
            'sender_id' => $data['sender_id'],
            'sender_referrer' => $data['referrer'],
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
            $this->db->set('sender_times_visited');

            //Should I update the sender times visited by one?
            if($this->update_in_order($new_data['sender_id'])){
                $this->db->where('sender_id',$new_data['sender_id']);
                $this->db->update('user_statistics');
            }
            //$this->db->where('sender_id',$new_data['sender_id']);
            //$this->db->update('user_statistics');
        }

    }

    public function get_users_data(){
        $this->db->select();
        $query = $this->db->get('user_statistics');
        $visitors = array();

        $i = 0;

        foreach ($query->result_array() as $row){

            $visitors[$i]["sender_id"] = $row["sender_id"];

            $visitors[$i]["sender_referrer"] = $row["sender_referrer"];

            $visitors[$i]["sender_os"] = $row["sender_os"];

            $visitors[$i]["sender_timezone"] = $row["sender_timezone"];

            $visitors[$i]["sender_last_time_visited"] = $row["sender_last_time_visited"];

            $visitors[$i]["sender_times_visited"] = $row["sender_times_visited"];

            $visitors[$i]["sender_saved_conversations"] = $row["sender_saved_conversations"];

            $i++;

        }

        return $visitors;


    }

    function number_of_visits($sender_id){
        $this->db->select('sender_times_visited');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics');
        return json_encode($query->result_array());

    }
    function update_in_order($sender_id){
        $this->db->select('sender_last_time_visited');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics');

        $hour = 00;
        $today = strtotime($hour . ':00:00');
        $yesterday= strtotime('-1 day',$today);


        if(reset($query) <= $yesterday){
            $data = array('sender_last_time_visited' => time());
            $this->db->replace('user_statistics', $data);
            return true;
        }
        $data = array('sender_last_time_visited' => time());
        $this->db->replace('user_statistics', $data);
        return false;



    }

    function number_of_conversations($sender_id){
        $this->db->select('sender_saved_conversations');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics');
        return json_encode($query->result_array());
    }
}

