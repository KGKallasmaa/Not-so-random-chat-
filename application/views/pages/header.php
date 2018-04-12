<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Adding lanuage information
$known_langs = array('en','et'); //English+Estonian
//More information: https://www.w3schools.com/tags/ref_language_codes.asp
$user_pref_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

foreach($user_pref_langs as $idx => $lang) {
    $lang = substr($lang, 0, 2);
    if (in_array($lang, $known_langs)) {
        $_SESSION["language"] = $lang;
        break;
    }else{
        $_SESSION["language"] = 'en';
    }
}
?>
<!DOCTYPE html>
<html lang="<?php $_SESSION["language"] ?>" xml:lang="<?php $_SESSION["language"] ?>"">
<head>
    <meta name="description" content="Rando is the greatest free messaging application for random people.">
    <meta name="authors" content="Fred Kasemaa, Paul Pung and Karl-Gustav Kallasmaa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico">

    <link rel ="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/chatapp.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/landing.css" type="text/css">

</head>
<body>
<div class = "container">
