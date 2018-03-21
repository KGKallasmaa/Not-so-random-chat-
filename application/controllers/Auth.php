<?php

session_start();

class Auth extends  CI_Controller{


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
                if ($this->contains_email($email)) {
                    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                    //2. is the password correct?
                    if ($this->password_correct($email, $password_hashed)) {
                        echo 'you have logged in!!!!';
                        //changing the user online status from false to true
                        set_status($email, true);

                        //SUCCESS!;
                        $_SESSION['user_logged'] = TRUE;
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_name'] = get_username($email);
                        $_SESSION['user_id'] = get_userid($email);
                        //TODO: fix this
                        redirect("<?php echo base_url();?>index.php/Pages/chat'", "refresh");
                        $newURL = "<?php echo base_url();?>index.php/Pages/chat'";
                        header('Location: ' . $newURL);


                    }
                    $this->session->set_flashdata('error', 'Incorrect password');
                    redirect("pages/login", "refresh");

                }
                //   $this->session->set_flashdata('error','Username dose not exist');
                redirect("pages/login", "refresh");
            }

        }

    }

    public function register()
    {
        // $this->load->helper('form');
        //valitating that all inputs are correct
        if ($this->input->post('register') !== false) {
            //    echo 'register button clicked';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            //   $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            //   $this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[5]|matches[password]');

            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required');

            echo "";
            if ($this->form_validation->run() == TRUE) {
                //   echo "form valitated";
                //add user to database

                $data = array(
                    'user_name' => $_POST['username'],
                    'user_email' => $_POST['email'],
                    'user_password' => md5($_POST['password'])
                );
                echo "";
                if ($this->Auth_model->ontains_email($data['email']) == false) {
                    echo 'email is unique';
                    $this->register_user($data);
                    echo 'you have successfully registered !!!';
                    $this->session->set_flashdata('success', 'Registration successful. You can now login ');
                    //  redirect("pages/login","refresh");
                    header('Location: /login');
                } else {
                    $this->session->set_flashdata('error', 'This email already exists. Please try another one');
                    // redirect("pages/register","refresh");
                    header('Location: register.php');
                    //location: /profile
                }


                // redirect("auth/register","refresh");
                //  header('Location: chat.php');
                // $this->load->view("chat.php");
                //   $this->load->view('pages/login.php');
                //   echo form_open('index.php/Pages/chat');

                //  $this->session->set_flashdata('error','Incorrect password');
            }
            header('Location: register.php');

        }
        // load view
        // $this->load->view('pages/chat.php');
    }

    function contains_email($email)
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

    function set_status($email, $value)
    {
        $this->db->update("*");
        $this->db->set("user_online_status" . $value);
        $this->db->where('user_email', $email);
        $query = $this->db->get('users');
        return 0;
    }

    function online_users()
    {
        $this->db->select("user_id");
        $this->db->where(array("user_online_status'" => true));
        $query = $this->db->get("users");
        return $query;
    }
}

