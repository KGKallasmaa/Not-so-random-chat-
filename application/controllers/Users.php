<?php
class Users extends CI_Controller{
    public function __construct(){
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }
    public function index(){
        $this->load->view('register.php');
    }
    public function register_user(){
        $user = array(
            'user_name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'user_password'=>md5($this->input->post('"password')),
            'user_repassword'=>$this->input->post('confirm'),
            'agree_to_tos'=>$this->input->post('tos_agree'),
        );
        print_r($user);

        //1. Dose the user agree to out TOS?
        if(agree_to_tos != "agree"){
            $this->session->set_flashdata('error_msg','You must agree to our TOS!');
            redirect('user');
        }
        //2. Is this email valid?

        if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL)){
            $this->session->set_flashdata('error_msg','Entered email is not valid. Please enter a valid email');
            redirect('user');
        }
        //3. Is this email taken?
        $email_check = $this->user_model->email_check($user['user_email']);
        if($email_check){
            $this->session->set_flashdata('error_msg','This email is already taken. Please try another one');
            redirect('user');
        }
        //4. Is this password long enough?
        //TODO: implement better strategy
        if(strlen($user['user_password']) <= 10){
            $this->session->set_flashdata('error_msg','Entered password is too small. Enter a bigger on!');
            redirect('user');
        }
        //5. Are the password and the confirmed password the same?
        if($user['user_password'] != $user['user_repassword']){
            $this->session->set_flashdata('error_msg','Entered password and the confirmed passwords are not the same. Please change them');
            redirect('user');
        }

        //Regitering user
        $user['user_password'] = password_hash($user['user_password']);
        $this->user_model->register_user($user);
        $this->session->set_flashdata('success_msg','Registered successfully. Now login to your account.');
        redirect('user/login_view');
        }

    public function login_view(){
        $this->load->view("login.php");
    }
    function login_user(){
        $user_login = array(
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password'))
        );
        $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
        if($data){
            $this->session->set_userdata('user_id',$data['user_id']);
            $this->session->set_userdata('user_name',$data['user_name']);

            //Loading the chat page
            $this->load->view('chat.php');
        }
        else{
            $this->session->set_flashdata('error.msg','This username is not registered or password is inccorrect');
            $this->load->view("login.php");
        }
    }
    function user_profile(){
        $this->load->view('user_profile.php');
    }
    public function user_logout(){
        $this->session->sess_destroy();
        redirect('user/login_view','refresh');
    }
}