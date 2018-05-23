
setInterval(function()
{
    $.ajax({
        type:"post",
        url:"get_conversation",
       // url:"get_conversation", <- todo: it works!!!!!
        datatype:'json',
        success:function(data)
        {
            var obj = JSON.stringify(data);
            alert(obj);
          //  document.getElementById("chat_log").innerHTML = obj.sender + ", " + obj.message;
            document.getElementById("chat_log").innerHTML = "okk";
        }
    });
}, 10000);//time in milliseconds