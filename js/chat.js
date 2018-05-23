
setInterval(function()
{
    $.ajax({
        type:"post",
        url:"get_conversation",
        datatype:'json',
        success:function(data)
        {
             var obj = JSON.parse(data);
             alert("tere");
           // document.getElementById("chat_log").innerHTML = obj.sender + ", " + obj.message;
            document.getElementById("chat_log").innerHTML = "okk";
        }
    });
}, 10000);//time in milliseconds