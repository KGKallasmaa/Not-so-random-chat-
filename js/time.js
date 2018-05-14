var display=setInterval(function(){Time()},0);
function Time() {
    var date=new Date();
    var time=date.toLocaleTimeString();
    document.getElementById("currenttime").innerHTML=time;
}