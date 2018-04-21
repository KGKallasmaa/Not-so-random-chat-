$(document).ready(function(){
	var interestList = ["Kappa", "Mina"];
	var i;
	for (i = 0; i < interestList.length; i++) {
		show(interestList[i]);
	}
	
    $("#addInterest").click(function(){
		var interest = document.getElementById("interest").value;
		show(interest);
		interestList.push(interest);
    });

	$(document).on("click", "#save", function(){
		$("#demo").append(interestList.toString());
	});
	
	$(document).on("click", ".remove-me", function(){
		$(this).remove();
		var interestName = this.id.substring(4,this.id.length);
		$("#" + interestName).remove();
		for(var i = interestList.length - 1; i >= 0; i--) {
			if(interestList[i] === interestName) {
				interestList.splice(i, 1);
			}
		}
	});
	
	function show(interest){
		$("#interestLine").append("<p id="+interest+"> " + interest + " </p>");
		$("#interestLine").append('<button id="btn_' + interest + '" class="btn btn-danger remove-me">x</button></div><div id ="interestLine">');
		
	}
});