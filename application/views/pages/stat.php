<div class="table-responsive">
    <table class="table">
        <tr>
            <th>sender_id</th>
            <th>referer</th>
            <th>os</th>
            <th>timezone</th>
            <th>number of times visited</th>
            <th>number of saved conversations</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>

                <td> <?php echo $row["sender_id"];?></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>