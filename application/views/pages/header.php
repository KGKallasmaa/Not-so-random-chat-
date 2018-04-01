<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

    <link rel ="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/chatapp.css"  type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/landing.css" type="text/css">

</head>
<body>
<div class = "container">
