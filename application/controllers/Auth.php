<?php

class Auth extends  CI_Controller{
	
	function __construct() {
        parent::__construct();

        // Load facebook library
        $this->load->library('facebook');

        //Load facebook user model
        $this->load->model('fbuser','',TRUE);

    }

    public function login()
    {
        //was the login button clicked?
        if ($this->input->post('login') !== false) {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run() !== FALSE){

                    //load model
                    $this->load->model('Auth_model');

                //input variables
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                //1. do we have that email?
                if ($this->Auth_model->contains_email($email) == true) {
                    //2. is the password correct?
                    if ($this->Auth_model->password_correct($email, md5($password)) == true) {


                        //changing the user online status on database from false to true
                        $this->Auth_model->set_online_status($email,true);

                        //SUCCESS!;
                        $_SESSION['logged_in'] = true;
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_name'] = $this->Auth_model->get_username($email);
                        $_SESSION['user_id'] = $this->Auth_model->get_userid($email);
                        $_SESSION['user_picture'] = $this->Auth_model->get_userpicture_name($_SESSION['user_id']);


                     redirect( '/index.php/Pages/test2');
                      //  $this->load->view('pages/login');

                    }
                    $this->session->set_flashdata('error', 'Incorrect password');
                    $this->load->view('pages/login');
              //      redirect( '/index.php/Pages/login','refresh');

                }
               else{
                   //   $this->session->set_flashdata('error','Username dose not exist');
                   redirect( '/index.php/Pages/register','refresh');
               }
            }
            else{
                // validation not ok, send validation errors to the view
                redirect( '/index.php/Pages/login');

                }

        }

    }

    public function logout(){
        //was the logout button clicked?
        if ($this->input->post('logout') !== false) {

            //Log out from current chats
            //loading the model
            $this->load->model('Message_model');
            $this->Message_model->log_out_from_chat($_SESSION['user_id']);



            //loading the model
            $this->load->model('Auth_model');


            //set status
            $this->Auth_model->set_online_status($_SESSION['user_email'],false);

            $this->Auth_model->set_chat_status($_SESSION['user_id'],false);

            $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                    $this->session->unset_userdata($key);
                }
            }
            $this->session->sess_destroy();


            redirect( '/','refresh');
          //  redirect( '/index.php/Pages/','refresh');
        }
    }

    public function register(){
        if ($this->input->post('register') !== false) {
            //$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            //$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            //$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[4]');
            //$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
            //$this->form_validation->set_rules('agree_to_tos', 'agree_to_tos', 'trim|required|xss_clean');

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('agree_to_tos', 'agree_to_tos', 'required');


            if ($this->form_validation->run() !== false){

                //load model
                $this->load->model('Auth_model');


                $data = array(
                    'user_name' => $_POST['username'],
                    'user_email' => $_POST['email'],
                    'user_password' => md5($_POST['password']),
                    'user_picture' => 'default.gif'
                );


                if ($this->Auth_model->contains_email($data['email']) == false) {

                    $this->Auth_model->register_user($data);

                    $this->session->set_flashdata('success', 'Registration successful. You can now login ');
                    //  redirect("pages/login","refresh");
                    redirect( '/index.php/Pages/login','refresh');

                } else {
                    $this->session->set_flashdata('error', 'This email already exists. Please try another one');
                    // redirect("pages/register","refresh");
                  //  header('Location: register.php');
                   // redirect( '/index.php/Pages/register','refresh');
                    redirect('/index.php/Pages/register');
                    //location: /profile
                }
                redirect( '/index.php/Pages/register','refresh');


                //  $this->session->set_flashdata('error','Incorrect password');
            }
           else{
              // redirect( '/index.php/Pages/register','refresh');
               redirect( '/index.php/Pages/register','refresh');
           }


        }
        // load view
    }



	//Facebook login
	public function fblogin(){
        //load Facebook


        $userData = array();
        // Check if user is logged

        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];

            // Insert or update user data
            $userID = $this->user->checkUser($userData);

            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
               $data['userData'] = array();
            }
			$this->load->view('pages/chat',$data);
            // Get logout URL
            $data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
			redirect($this->facebook->login_url());
        }
        
    }
	
    public function fblogout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('userData');

        // Redirect to login page
        redirect('/index.php/Pages/login');

     }
	
	
	
}



