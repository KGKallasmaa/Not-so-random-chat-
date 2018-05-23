<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Sender(if possible add username)</th>
                    <th scope="col">Conversation</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php foreach ($chat_information as $row) { ?>
                    <td><?php echo $row->topic; ?></td>
                    <td><?php echo $row->sender; ?></td>
                    <td><?php echo $row->conversation; ?></td>
                <tr> </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>