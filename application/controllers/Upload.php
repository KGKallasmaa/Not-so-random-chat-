<?php
class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('upload_form', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $config['upload_path']          = './images/profile_pictures';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

       // $file_name= basename($_FILES["fileToUpload"]["name"]);
        $file_name= "test";

         echo "<script type='text/javascript'> alert('".json_encode('Hello')."') </script>";


        $this->load->library('upload', $config);


        //1. Upload picture to database
        if ( ! $this->upload->do_upload('userfile'))
        {
          //  $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            echo "Hi!";
            //2. Change user picture name in db
            $this->upload->data();
           // $data = array('upload_data' => $this->upload->data());
            $sql = "call change_profile_picture(?,?)";
            $query = $this->db->query($sql,array($_SESSION['user_id'],$file_name));
        }
        redirect( '/index.php/Pages/settings');


    }
}