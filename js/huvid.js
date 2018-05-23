$(document).ready(function(){

	
    $("#addInterest").click(function(){
		var contains = 0;
		var interest = document.getElementById("interest").value;
		if (interest != ""){
			for(var i = interestList.length - 1; i >= 0; i--) {
			if(interestList[i] == interest) {
				contains = 1;
			}
		}
			if(contains == 0){
				show(interest);
				interestList.push(interest);
			}
		}
		document.getElementById("interest").value = "";
    });

	$(document).on("click", "#save", function(){
		$("#demo").append(interestList.toString());
	});
	
	$(document).on("click", ".remove-me", function(){
		$(this).remove();
		var interestName = this.id.substring(4,this.id.length);
		$("#" + interestName).remove();
		for(var i = interestList.length - 1; i >= 0; i--) {
			if(interestList[i] == interestName) {
				interestList.splice(i, 1);
			}
		}
	});
	function show(interest){
		$("#interestLine").append("<b id="+interest+"> " + interest + " </b>");
		$("#interestLine").append('<button id="btn_' + interest + '" class="btn btn-danger remove-me">x</button>');
		
	}
});