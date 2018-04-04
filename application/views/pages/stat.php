<div class="table-responsive">
    <table class="table">
        <tr>
            <th>sender_id  </th>
            <th>referer  </th>
            <th>os  </th>
            <th>timezone  </th>
            <th>number of times visited </th>
            <th>number of saved conversations </th>

        <tr>
            <?php foreach ($information as $row) { ?>
                <td><?php echo $row->sender_id; ?></td>
                <td><?php echo $row->sender_referrer; ?></td>
                <td><?php echo $row->sender_os; ?></td>
                <td><?php echo $row->sender_timezone; ?></td>
                <td><?php echo $row->sender_last_time_visited; ?></td>
                <td><?php echo $row->sender_times_visited; ?></td>
                <td><?php echo $row->sender_saved_conversations; ?></td>
                <tr> </tr>
            <?php } ?>
        </tr>
    </table>
</div>