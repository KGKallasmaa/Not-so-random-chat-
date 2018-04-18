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
        return false;

    }
    function register_user($data){

        $new_userid =  uniqid(rand(), true);
        $new_data = array(
            'user_id' => $new_userid,
            'user_name' => $data['user_name'],
            'user_email' => $data['user_email'],
            'user_password'  => $data['user_password'],
            'user_password'  => $data['user_password'],
            'user_picture' => $data['user_picture']
        );

        $this->db->insert('users', $new_data);

    }

    function email_confirm($email){
        $user_email =  $email;

    }

    function format_email($info, $format){

        //set the root
        $root = $_SERVER['DOCUMENT_ROOT'].'/dev/tutorials/email_signup';

        //grab the template content
        $template = file_get_contents($root.'/signup_template.'.$format);

        //replace all the tags
        $template = ereg_replace('{USERNAME}', $info['username'], $template);
        $template = ereg_replace('{EMAIL}', $info['email'], $template);
        $template = ereg_replace('{KEY}', $info['key'], $template);
        $template = ereg_replace('{SITEPATH}','http://site-path.com', $template);

        //return the html of the template
        return $template;

    }

    function send_email($info){

        //format each email
        $body = format_email($info,'html');
        $body_plain_txt = format_email($info,'txt');

        //setup the mailer
        $transport = Swift_MailTransport::newInstance();
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance();
        $message ->setSubject('Welcome to Site Name');
        $message ->setFrom(array('noreply@sitename.com' => 'Site Name'));
        $message ->setTo(array($info['email'] => $info['username']));

        $message ->setBody($body_plain_txt);
        $message ->addPart($body, 'text/html');

        $result = $mailer->send($message);

        return $result;

    }

    function set_online_status($email, $value){
        $this->db->set("user_online_status", $value);
        $this->db->where('user_email', $email);
        $this->db->update('users');
    }
    function get_userid($email){
        $this->db->select("user_id");
        $this->db->where(array("user_email" => $email));
        $query = $this->db->get('users');
        $result = $query->row_array();
        return $result['user_id'];
    }


    function get_username($email)
    {
        $this->db->select("user_name");
        $this->db->where(array("user_email" => $email));
        $query = $this->db->get('users');
        $result = $query->row_array();
        return $result['user_name'];

    }
    /*
     * TODO: implement
     *  function get_userpicture_name($user_id)
    {
        $this->db->select("user_picture");
        $this->db->where(array("user_id" => $user_id));
        echo "I'm here";
        $this->db->from('users');
        $query = $this->db->get();
        if($query->num_rows() == 0){
            return 'Nope';
        }
        $result = $query->row_array();
        return $result['user_picture'];

    }
     */
    //TODO: shotgun surgery
    function get_userpicture_name($user_id){
        return "default.gif";
    }

    function set_chat_status($user_id,$new_status){
        $sql = "call new_chat_status(?,?)";
        $query = $this->db->query($sql,array($user_id,$new_status));
    }



    function online_users()
    {
        $this->db->select("user_id");
        $this->db->where(array("user_online_status" => true));
        $query = $this->db->get("users");
        $result = $query->row_array();
        return $result['user_id'];
    }

    function number_of_users_online(){
    $this->db->select("user_id");
    $this->db->where(array("user_online_status" => true));
    $query = $this->db->get("users");
    return $query->num_rows();
    }
    function number_of_users_online_and_not_chating(){
        $this->db->select("user_id");
        $this->db->where(array("user_online_status" => true,"user_chat_status" => false));
        $query = $this->db->get("users");
        return $query->num_rows();
    }

    function number_of_registered_users()
    {
        $this->db->select("user_id");
        $query = $this->db->get("users");
        return $query->num_rows();
    }



}