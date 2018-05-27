<h1><?php echo lang("Welcome to the sitemap!") ?></h1>

<?php

if (!isset($_SESSION['user_id'])) {

    echo "<a href='" . base_url() . "home" . "'>" . lang("home") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "Pages/register" . "'>" . lang("register") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "Pages/login" . "'>" . lang("login") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "about" . "'>" . lang("about") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "tos" . "'>" . lang("terms") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "Pages/stat" . "'>" . lang("statistic") . "</a>";
    echo "<br>";
} else {
    echo "<a href='" . base_url() . "home" . "'>" . lang("home") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "about" . "'>" . lang("about") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "tos" . "'>" . lang("terms") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "Pages/stat" . "'>" . lang("statistic") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "Pages/chat" . "'>" . lang("chat") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "Pages/history" . "'>" . lang("history") . "</a>";
    echo "<br>";
    echo "<a href='" . base_url() . "Pages/settings" . "'>" . lang("settings") . "</a>";
}
?>

