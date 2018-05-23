
setInterval(function()
{
    $.ajax({
        type:"post",
        url:"get_conversation",
        datatype:'JSON',
        success:function(data)
        {
            console.log(data);
           // document.getElementById("chat_log").innerHTML = obj.sender + ", " + obj.message;
           // document.getElementById("chat_log").innerHTML = data.sender + data.message;
            document.getElementById("chat_log").innerHTML = data;
        }
    });
}, 10000);//time in milliseconds