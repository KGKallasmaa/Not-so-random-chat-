
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
            var obj =JSON.parse(data) ;
            console.log(obj.length);
			var i;
			var text ="";
			for (i = 0; i < obj.length; i++) { 
				text += obj[i].sender+": "+obj[i].message + "<br>";
			}
        //    console.log(JSON.stringify(data));  // returns ["person", "age"]
            document.getElementById("chat_log").innerHTML = text;
           // document.getElementById("chat_log").innerHTML = data.sender + data.message;
          //  document.getElementById("chat_log").innerHTML = data;
        }
    });
}, 5000);//time in milliseconds

$(document).ready(function(){
	    $.ajax({
        type:"post",
        url:"get_conversation",
        datatype:'JSON',
        success:function(data)
        {



        //    console.log(JSON.parse(data));


          //  var obj = JSON.parse(data);
            var obj =JSON.parse(data) ;
            console.log(obj.length);
			var i;
			var text ="";
			for (i = 0; i < obj.length; i++) { 
				text +="<div class = 'chat_line'>" + obj[i].sender+": "+obj[i].message + "<br>";
			}



        //    console.log(JSON.stringify(data));  // returns ["person", "age"]

            document.getElementById("chat_log").innerHTML = text;
           // document.getElementById("chat_log").innerHTML = data.sender + data.message;
          //  document.getElementById("chat_log").innerHTML = data;
        }
    });
});