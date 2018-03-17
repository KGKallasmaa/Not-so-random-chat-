<?php
/**
 * Created by PhpStorm.
 * User: karl96k
 * Date: 13.03.2018
 * Time: 22:24
 */
class Auth extends  CI_Controller{

    public function login(){

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
                        echo 'you have logged in!!!!';
                        //SUCCESS!
                        $session_data = array(
                          'email' =>  $email
                        );
                        $_SESSION['usser_logged'] = TRUE;
                        $_SESSION['user_email'] = $email;
                        $this->load->view('pages/chat');
                   //     redirect(base_url().'index.php/pages/chat');

                    }
                    $this->session->set_flashdata('error','Incorrect password');
                    $this->load->view('pages/login');

                }
                $this->session->set_flashdata('error','Username dose not exist');
                $this->load->view('pages/login');
            }

          }

    }
    public function register(){
       // $this->load->helper('form');
        //valitating that all inputs are correct
        if($this->input->post('register') !== false){
            echo 'register button clicked';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
         //   $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
         //   $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[5]|matches[password]');

            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required');

            echo "";
            if ($this->form_validation->run() == TRUE){

             //   echo "form valitated";
                //add user to database
                $hashed_password = password_hash('password', PASSWORD_DEFAULT);
                $data = array(
                  'user_name'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'password'=>$_POST[$hashed_password],
                );
                echo "";
                if ($this->Auth_model->contains_email($data['email']) == false){
                    echo 'email is unique';
                    $this->Auth_model->register_user($data);
                    echo 'you have successfully registered !!!';
                    $this->session->set_flashdata('success','Registration successful. You can now login ');
                    $this->load->view('pages/login.php');
                }
                else{
                    $this->session->set_flashdata('error','This email already exists. Please try another one');
                    $this->load->view('pages/register.php');
                }


               // redirect("auth/register","refresh");
              //  header('Location: chat.php');
               // $this->load->view("chat.php");
             //   $this->load->view('pages/login.php');
             //   echo form_open('index.php/Pages/chat');

              //  $this->session->set_flashdata('error','Incorrect password');
            }
        }
        // load view
        // $this->load->view('pages/chat.php');
    }
}