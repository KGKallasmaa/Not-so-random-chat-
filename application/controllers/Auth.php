<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 13.03.2018
 * Time: 22:24
 */
class Auth extends  CI_Controller{

    public function login(){
        echo 'login page';
    }
    public function register(){

        //valitating that all inputs are correct
        if($this->input->post('register') !== false){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[5]|matches[password]');


            if ($this->form_validation->run() == TRUE){
                echo "form valitated";
                //add user to database
                $data = array(
                  'username'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'password'=>$_POST['password'],
                );
                $this->db->insert('users',$data);
               // redirect("auth/register","refresh");
                header('Location: chat.php');
                $this->load->view("chat.php");
            }
        }
        // load view
        $this->load->view("register.php");
    }
}