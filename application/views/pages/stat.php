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
        //Table logic
        require_once (APPPATH."/views/logic/statistics_table_logic.php")
        ?>
    </table>
</div>