<h1><?php echo lang("Welcome to the sitemap!")?></h1>



<?php

if(!isset($_SESSION['user_id'])){

    echo "<a href='".base_url()."index.php/Pages/home"."'>". lang("home")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/about"."'>". lang("about")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/tos"."'>". lang("terms")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/stat"."'>". lang("statistic")."</a>";
    echo "<br>";
}
else{
    echo "<a href='".base_url()."index.php/Pages/home"."'>". lang("home")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/about"."'>". lang("about")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/tos"."'>". lang("terms")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/stat"."'>". lang("statistic")."</a>";
    echo "<br>";


    echo "<a href='".base_url()."index.php/Pages/chat"."'>". lang("chat")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/history"."'>". lang("history")."</a>";
    echo "<br>";
    echo "<a href='".base_url()."index.php/Pages/setting"."'>". lang("settings")."</a>";



}


?>

