
setInterval(function()
{
    $.ajax({
        type:"post",
        url:"get_conversation",
        datatype:'JSON',
        success:function(data)
        {



        //    console.log(JSON.parse(data));


          //  var obj = JSON.parse(data);
            var obj =$.parseJSON(data) ;
            console.log(typeof obj);



        //    console.log(JSON.stringify(data));  // returns ["person", "age"]

            document.getElementById("chat_log").innerHTML = obj.sender + ", " + obj.message;
           // document.getElementById("chat_log").innerHTML = data.sender + data.message;
          //  document.getElementById("chat_log").innerHTML = data;
        }
    });
}, 10000);//time in milliseconds