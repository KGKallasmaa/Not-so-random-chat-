<?php
    class Pages extends CI_Controller{
		
        public function view($page = 'home'){
            if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                // Whoops, we don't have a page for that!
                show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
            $this->load->helper('url');
            $this->load->view('pages/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/footer', $data);
        }
        public function chat(){
            $this->load->view('pages/chat');
        }
        public function about(){
            $this->load->view('pages/about');
        }
        public function tos(){
            $this->load->view('pages/tos');
        }
        public function stat(){
            $this->load->view('pages/stat');
        }
        public function history(){
            $this->load->view('pages/history');
        }
        public function settings(){
            $this->load->view('pages/settings');
        }
        public function register(){
            $this->load->view('pages/register');
        }
        public function login(){
            $this->load->view('pages/login');
        }


    }