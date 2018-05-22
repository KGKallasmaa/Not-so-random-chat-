$(document).ready(function(){
        refreshTable();
    });
function refreshTable(){
    $('#chat_log').load('index.php/Message/my_conversation', function(){
        setTimeout(refreshTable, 5000);
    });
}
$(document).on("click", "#message_sent", function(){
    $("#chat_log").append(interestList.toString());
});