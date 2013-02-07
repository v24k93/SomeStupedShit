$(function(){
	var count = $("#slider img").length, i = 1;
	alert(count);
	
	for(int o = 1; o <= count; o++)
		$('#slide_' + i).css("display","block").hide();
		
	setInterval(function(){
		var old_slide = $('#slide_' + i);
		if(i >= count)
			i = 0;
			
		var new_slide = $('#slide_' + (i + 1));
		old_slide.fadeOut(300);
		setTimeout(function(){
			new_slide.fadeIn(300);
			i++;
		}, 300);
	}, 3000);
});