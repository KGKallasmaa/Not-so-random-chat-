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
        $this->db->where('email',$email);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return true;
        }
        return false;
    }
    function password_correct($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        if($query->num_rows() == 1){
            return true;
        }
        return false ;

    }


}