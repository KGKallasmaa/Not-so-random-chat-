
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
			console.log(obj[i].sender_picture);
				text +="<div class = 'chat_line'> <img src='http://localhost/rando/Not-so-random-chat-/images/profile_pictures/" + obj[i].sender_picture + "' alt='Avatar'>" + obj[i].user_name+": "+obj[i].message + "</div>";
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
			console.log(obj[i].sender_picture);
				text +="<div class = 'chat_line'> <img src='http://localhost/rando/Not-so-random-chat-/images/profile_pictures/" + obj[i].sender_picture + "' alt='Avatar'>" + obj[i].sender_name+": "+obj[i].message + "</div>";
			}
        //    console.log(JSON.stringify(data));  // returns ["person", "age"]
            document.getElementById("chat_log").innerHTML = text;
           // document.getElementById("chat_log").innerHTML = data.sender + data.message;
          //  document.getElementById("chat_log").innerHTML = data;
        }
    });
});