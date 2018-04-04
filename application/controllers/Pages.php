<?php
    class Pages extends CI_Controller{

         public function view($page = 'home',$data = null){
            if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                // Whoops, we don't have a page for that!
                show_404();
            }

            $header_data = $this->header_data();


            $this->load->helper('url');
            $this->load->view('pages/header', $header_data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/footer', $data);
        }


        function header_data(){
            //Is the current user logged in?
            if (!isset($_SESSION['user_id'])){
                $random = rand(1,PHP_INT_MAX);
                if (!isset($_SESSION["sender_id"])){
                    $_SESSION['sender_id'] = $random;
                }
            }
            else{
                $_SESSION['sender_id'] = $_SESSION['user_id'];
            }
            //1. user_id
            //sender_id = user_id
            function getOS($userAgent) {
                //Source: https://gist.github.com/philipptempel/4322656
                // Create list of operating systems with operating system name as array key
                $oses = array (
                    'iPhone'            => '(iPhone)',
                    'Windows 3.11'      => 'Win16',
                    'Windows 95'        => '(Windows 95)|(Win95)|(Windows_95)',
                    'Windows 98'        => '(Windows 98)|(Win98)',
                    'Windows 2000'      => '(Windows NT 5.0)|(Windows 2000)',
                    'Windows XP'        => '(Windows NT 5.1)|(Windows XP)',
                    'Windows 2003'      => '(Windows NT 5.2)',
                    'Windows Vista'     => '(Windows NT 6.0)|(Windows Vista)',
                    'Windows 7'         => '(Windows NT 6.1)|(Windows 7)',
                    'Windows NT 4.0'    => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
                    'Windows ME'        => 'Windows ME',
                    'Open BSD'          => 'OpenBSD',
                    'Sun OS'            => 'SunOS',
                    'Linux'             => '(Linux)|(X11)',
                    'Safari'            => '(Safari)',
                    'Mac OS'            => '(Mac_PowerPC)|(Macintosh)',
                    'QNX'               => 'QNX',
                    'BeOS'              => 'BeOS',
                    'OS/2'              => 'OS/2',
                    'Search Bot'        => '(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
                );

                // Loop through $oses array
                foreach($oses as $os => $preg_pattern) {
                    // Use regular expressions to check operating system type
                    if ( preg_match('@' . $preg_pattern . '@', $userAgent) ) {
                        // Operating system was matched so return $oses key
                        return $os;
                    }
                }

                // Cannot find operating system so return Unknown

                return 'n/a';
            }
            //user_agent
            $user_agent = getOS($_SERVER['HTTP_USER_AGENT']);
            //2. browser
            $referrer = $_SERVER['HTTP_REFERER'];
            //3. os
            $os = getOS($user_agent);
            //4. timezone
            $timezone = timezone_version_get();
            //upload data to the db
            $data = array(
                'sender_id' => $_SESSION['sender_id'],
                'referrer' => $referrer,
                'os' => $os,
                'timezone' => $timezone,
            );
             //load_model
            $this->load->model('Stat_model');

            $returns = $this->Stat_model->add_sender_data($data);
            return $returns;
        }
        function stat_data(){
            $this->load->model('Stat_model');
            return $this->Stat_model->get_users_data();
        }
        public function chat(){
            $this->load->view('pages/header');
            $this->load->view('pages/chat');
            $this->load->view('pages/footer');
        }
        public function about(){
            $this->load->view('pages/header');
            $this->load->view('pages/about');
            $this->load->view('pages/footer');
        }
        public function tos(){
            $this->load->view('pages/header');
            $this->load->view('pages/tos');
            $this->load->view('pages/footer');
        }
        public function stat(){
            $this->load->view('pages/header');
            $data['information'] =$this->stat_data();
            $this->load->view('pages/stat',$data);
            $this->load->view('pages/footer');
        }
        public function history(){
            $this->load->view('pages/header');
            $this->load->view('pages/history');
            $this->load->view('pages/footer');
        }
        public function settings(){
            $this->load->view('pages/header');
            $this->load->view('pages/settings');
            $this->load->view('pages/footer');
        }
        public function register(){
            $this->load->view('pages/header');
            $this->load->view('pages/register');
            $this->load->view('pages/footer');
        }
        public function login(){
            $this->load->view('pages/header');
            $this->load->view('pages/login');
            $this->load->view('pages/footer');
        }
		public function test(){
            $this->load->view('pages/test');
        }
		
		public function test2(){
            $this->load->view('pages/header');
            $this->load->view('pages/test2');
            $this->load->view('pages/footer');
        }


    }