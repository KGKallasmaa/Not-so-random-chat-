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
        $new_number_of_times_visited = $this->number_of_visits($data['sender_id']);

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
        //echo $new_number_of_times_visited;
        //echo $this->number_of_visits($data['sender_id']);

        if ($new_number_of_times_visited == 0){
            //insert
            $new_data['sender_times_visited'] = $new_data['sender_times_visited']+1;
            $this->db->insert('user_statistics', $new_data);
        }
        else{
          //update
            $this->db->set('sender_times_visited');

            //Should I update the sender times visited by one?
            if($this->update_in_order($new_data['sender_id'])){
                $this->db->where('sender_id',$new_data['sender_id']);
                $new_data["sender_times_visited"] = $new_data["sender_times_visited"]+1;
                $this->db->update('user_statistics',$new_data);
            }
            //updating the last time the user visited the site
            $this->db->where('sender_id',$new_data['sender_id']);
            $new_data["sender_last_time_visited"] = date("Y-m-d H:i:s", time());
            $this->db->update('user_statistics',$new_data);

        }

    }


    public function get_users_data(){
        $this->db->select();
        $query = $this->db->get('user_statistics');

        return $query->result(); // <- it works
        //return json_encode($query->result());


    }

    function number_of_visits($sender_id){
        $this->db->select('sender_times_visited');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics');
        $result = $query->row_array();
        return $result['sender_times_visited'];

    }
    function update_in_order($sender_id){
        $this->db->select('sender_last_time_visited');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics',true);

        $result = $query->row_array();

       // echo $result['sender_last_time_visited'];


        //if the user has was last online less than 1 day ago, then update is not in order
        $difference = strtotime(date("Y-m-d H:i:s", time())) - strtotime($result['sender_last_time_visited']);


        if($difference < strtotime('1 day')){
            return false;
        }
        else{
            return true;
        }
    }

    function number_of_conversations($sender_id){
        $this->db->select('sender_saved_conversations');
        $this->db->where('sender_id',$sender_id);
        $query = $this->db->get('user_statistics');
        return json_encode($query->result());
    }
}

