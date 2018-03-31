<?php
//loading model
require_once (APPPATH."/models/Stat_model.php");

$model = new Stat_model();
$results = $model->get_sender_data($_SESSION['sender_id']);



foreach ($results as $value) {
    echo "<td>".$value['user_statistics_id ']."</td>";
    echo "<td>".$value['sender_id']."</td>";
    echo "<td>".$value['sender_browser']."</td>";
    echo "<td>".$value['sender_os']."</td>";
    echo "<td>".$value['sender_timezone']."</td>";
    echo "<td>".$value['sender_times_visited']."</td>";
    echo "<td>".$value['sender_saved_conversations']."</td>";
}


