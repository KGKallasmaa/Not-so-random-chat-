$(document).ready(function(){
	var next = 1;
    $("#lisaHuvi").click(function(){
		var huvi = document.getElementById("huvi").value;
		$("#huvid").append("<b>"+huvi+ "  </b>");

    });
});