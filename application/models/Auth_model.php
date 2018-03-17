<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 13.03.2018
 * Time: 22:24
 */
class Auth_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }
    function contains_email($email){
        $this->db->select("*");
        $this->db->where('user_email',$email);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){

            return true;
        }
        return false;
    }
    function password_correct($email,$password){
        $this->db->select("*");
        $this->db->where(array('user_email' => $email,'user_password' =>$password));
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return true;
        }
        return false ;

    }
    function register_user($data){
        $new_data = array(
            'user_name' => $data['user_name'],
            'user_email' => $data['user_email'],
            'user_password'  => $data['user_password'],
        );

        $this->db->inser('user', $new_data);

    }




}