<div class="table-responsive">
    <table class="table">
        <tr>
            <th>sender_id</th>
            <th>browser</th>
            <th>os</th>
            <th>timezone</th>
            <th>number of times visited</th>
            <th>number of saved conversations</th>
        </tr>
        <?php
        //loading model
        $this->load->model('Stat_model');
        $results = $this->Stat_model->get_sender_data($_SESSION['sender_id']);


        foreach ($results as $value) {
            echo "<td>".$value['user_statistics_id ']."</td>";
            echo "<td>".$value['sender_id']."</td>";
            echo "<td>".$value['sender_browser']."</td>";
            echo "<td>".$value['sender_os']."</td>";
            echo "<td>".$value['sender_timezone']."</td>";
            echo "<td>".$value['sender_times_visited']."</td>";
            echo "<td>".$value['sender_saved_conversations']."</td>";
        }

        //
        ?>
    </table>
</div>