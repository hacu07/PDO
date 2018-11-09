$(document).ready(function(){
	var campos = $(".input_group input");

	campos.each(function(e){
		if($(this).val().length!=0){
			$(this).parent().find("label.label").addClass("label-Active");
		}
		else{
			$(this).parent().find("label.label").removeClass("label-Active");
		}
	});

	campos.focus(function(){
		$(this).parent().find("label.label").addClass("label-Active");
	});

	campos.focusout(function(){
		if($(this).val().length!=0){
			$(this).parent().find("label.label").addClass("label-Active");
		}
		else{
			$(this).parent().find("label.label").removeClass("label-Active");
		}
	});
});