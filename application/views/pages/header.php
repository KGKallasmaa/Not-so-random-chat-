<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>


    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.css"  type="text/css" />
    <meta name="description" content="Rando is the greatest free messaging application for random people.">
    <meta name="authors" content="Fred Kasemaa, Paul Pung and Karl-Gustav Kallasmaa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" />

    <link rel = "stylesheet" href="bootstrap.min.css"/>
    <link rel="stylesheet" href="css/chatapp.css"  type="text/css">
    <link rel="stylesheet" href="css/landing.css" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
<div class = "container">

    <div class="user_stat">
        <?php
        //1. user_id
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
        $browser = get_browser(null, true);


        //3. os
        $os = getOS($user_agent);


        //4. timezone
        $timezone = timezone_version_get();



        //upload data to the db
        $data = array(
            'sender_id' => $_SESSION['sender_id'],
            'browser' => $browser,
            'os' => $os,
            'timezone' => $timezone,
        );

        //load model
        //$this->load->model('Stat_model');
        //TODO

        require_once(APPPATH."/models/Stat_model.php");
        $model = new Stat_model;
        //saving data to database
        $model->add_sender_data($data);

        ?>

    </div>