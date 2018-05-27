<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
?>

<!DOCTYPE html>
<html lang="<?php if($this->session->userdata('site_lang')) ?>" xml:lang="<?php if($this->session->userdata('site_lang')) ?>">
<head>
    <meta name="description" content="Rando is the greatest free messaging application for random people.">
    <meta name="authors" content="Fred Kasemaa, Paul Pung and Karl-Gustav Kallasmaa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico">

    <link rel ="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/chatapp.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/settings.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/landing.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/register.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Rando||The Home of create chats between random people</title>

</head>
<body>
<div class = "container">
