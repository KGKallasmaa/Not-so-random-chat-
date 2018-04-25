var chat = {};

chat.fetchMessages = function () {
    $.ajax({
        url: 'application/conversations/908984320.json',
        type: 'POST',
        data: { method: 'fetch' },
        success: function(data) {
            $('#chat_log').html(data);
        }
    });
};

chat.interval = setInterval(chat.fetchMessages, 1000);
chat.fetchMessages();
