<title>Rando||Statistics</title>
<meta name="description" content="Who are our user and what are they up do?">


<div>
    <h2>General user statistics</h2>
    <p> Number of registered users  <?php echo $general_information['number_of_registered_users'] ?></p>
    <p> Number of users currently online  <?php echo $general_information['number_of_users_currently_online'] ?></p>
    <p> Number of chats currently in progress  <?php echo $general_information['number_of_chats_in_progress'] ?></p>
</div>

<div class="container">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>sender_id  </th>
                <th>referer  </th>
                <th>os  </th>
                <th>timezone  </th>
                <th>last time online  </th>
                <th>number of times visited </th>
                <th>number of saved conversations </th>

            <tr>
                <?php foreach ($information as $row) { ?>
                <?php  if ($row->sender_referrer != null){  ?>
                <td><?php echo $row->sender_id; ?></td>
                <td><?php echo $row->sender_referrer; ?></td>
                <td><?php echo $row->sender_os; ?></td>
                <td><?php echo $row->sender_timezone; ?></td>
                <td><?php echo $row->sender_last_time_visited; ?></td>
                <td><?php echo $row->sender_times_visited; ?></td>
                <td><?php echo $row->sender_saved_conversations; ?></td>
            <tr> </tr>
            <?php } ?>
            <?php } ?>
            </tr>
        </table>
    </div>
</div>
