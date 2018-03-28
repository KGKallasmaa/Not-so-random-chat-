<?php

class Auth extends  CI_Controller{
	
	function __construct() {
        parent::__construct();

        // Load facebook library
        $this->load->library('facebook');

        //Load facebook user model
        $this->load->model('fbuser');
    }


    public function login()
    {
        //was the login button clicked?
        if ($this->input->post('login') !== false) {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                //load model
                $this->load->model('Auth_model');

                //input variables
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                //1. do we have that email?
                if ($this->Auth_model->contains_email($email) == true) {
                    //2. is the password correct?
                    if ($this->Auth_model->password_correct($email, md5($password)) == true) {

                        //user variable
                      //  $user = $this->Auth_model->get_user($email,md5($password));


                        //changing the user online status on database from false to true
                        $this->Auth_model->set_status($email,true);

                        //SUCCESS!;
                        $_SESSION['logged_in'] = true;
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_name'] = $this->Auth_model->get_username($email);
                        $_SESSION['user_id'] = $this->Auth_model->get_userid($email);

                      redirect( '/index.php/Pages/chat','refresh');
                      //  $this->load->view('pages/login');

                    }
                    $this->session->set_flashdata('error', 'Incorrect password');
                    $this->load->view('pages/login');
              //      redirect( '/index.php/Pages/login','refresh');

                }
                //   $this->session->set_flashdata('error','Username dose not exist');
              //  redirect( '/index.php/Pages/register','refresh');
            }
            redirect( '/index.php/Pages/login','refresh');

        }

    }

    public function logout(){
        //was the logout button clicked?
        if ($this->input->post('logout') !== false) {
            //load model
            $this->load->model('Auth_model');
            //set status

            $this->Auth_model->set_status($_SESSION['user_email'],false);

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

            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                //load model
                $this->load->model('Auth_model');

                //input data

                $data = array(
                    'user_name' => $_POST['username'],
                    'user_email' => $_POST['email'],
                    'user_password' => md5($_POST['password'])
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
                    redirect( '/index.php/Pages/register','refresh');
                    exit();
                    //location: /profile
                }


                // redirect("auth/register","refresh");
                //  header('Location: chat.php');
                // $this->load->view("chat.php");
                //   $this->load->view('pages/login.php');
                //   echo form_open('index.php/Pages/chat');

                //  $this->session->set_flashdata('error','Incorrect password');
            }
            redirect( '/index.php/Pages/register','refresh');

        }
        // load view
        // $this->load->view('pages/chat.php');
    }



    /*
     *  function contains_email($email)
    {
        $this->db->select("*");
        $this->db->where('user_email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }

    }

    function password_correct($email, $password)
    {
        $this->db->select("*");
        $this->db->where(array('user_email' => $email, 'user_password' => $password));
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            return true;
        }
        return false;

    }

    function register_user($data)
    {
        $new_data = array(
            'user_email' => $data['user_email'],
            'user_password' => $data['user_password'],
            'user_name' => $data['user_name']
        );

        $this->db->insert('users', $new_data);

    }

    function get_username($email)
    {
        $this->db->select("user_name");
        $this->db->where(array("user_email" => $email));
        $query = $this->db->get("users");
        return $query;
    }
    function get_userid($email)
    {
        $this->db->select("user_id");
        $this->db->where(array("user_email" => $email));
        $query = $this->db->get("users");
        return $query;
    }

     */

    function online_users($my_id)
    {
        $this->db->select("user_id");
        $this->db->where(array("user_online_status'" => true,"user_chat_status" => false,"user_id" != $my_id));
        $query = $this->db->get("users");
        return $query;
    }

	// facebooki login
	public function fblogin(){
        $userData = array();
        // Check if user is logged in
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
        redirect('/Pages/login');
    }
	
	
	
}



