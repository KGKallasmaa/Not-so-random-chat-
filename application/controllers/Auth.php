<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 13.03.2018
 * Time: 22:24
 */
class Auth extends  CI_Controller{

    public function login(){
        echo 'you have logged in!!!! (not yet)';
        //was the login button clicked?
        if($this->input->post('login') !== false){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE){

                //load model
                $this->load->model('Auth_model');

                //input variables
                $email = $this->input->post('email');
                $password = $this->input->post('password');


                //1. do we have that email?
                if ($this->Auth_model->contains_email($email)){

                    $password_hashed =password_hash($password, PASSWORD_DEFAULT);
                    //2. is the password correct?
                    if($this->Auth_model->password_correct($email,$password_hashed)){
                        //SUCCESS!
                        $session_data = array(
                          'email' =>  $email
                        );
                        $this->session->set_userdata($session_data);
                        $this->load->view('pages/chat');
                   //     redirect(base_url().'index.php/pages/chat');

                    }
                    $this->session->set_flashdata('error','Incorrect password');
                    $this->load->view('pages/login');

                }
                $this->session->set_flashdata('error','Username dose not excist');
                $this->load->view('pages/login');
            }

          }

    }
    public function register(){
       // $this->load->helper('form');
        //valitating that all inputs are correct
        if($this->input->post('register') !== false){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[5]|matches[password]');


            if ($this->form_validation->run() == TRUE){
             //   echo "form valitated";
                //add user to database
                $hashed_password = password_hash('password', PASSWORD_DEFAULT);
                $data = array(
                  'username'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'password'=>$_POST[$hashed_password],
                );

                //TODO: fix this
                $this->db->insert('users',$data);
               // redirect("auth/register","refresh");
              //  header('Location: chat.php');
               // $this->load->view("chat.php");
                echo form_open('index.php/Pages/chat');
            }
        }
        // load view
        $this->load->view('pages/chat.php');
    }
}