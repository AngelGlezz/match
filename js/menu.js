$(document).ready(function(){
	$(".item_main").click(function(){
		$('.item_main').css({
			'border-bottom': '0px'
		});
		$('.item_main').find('a').css({
			'color': '#fff'
		});
		$(this).css({
			'border-bottom': '1px solid #e9c24e'
		});
		$(this).find('a').css({
			'color': '#e9c24e'
		});
	});

	$( ".image_load" ).load(function() {
  		// Handler for .load() called.
  		console.log("load");
  		$('.fotorama').fotorama();
	});

	//$('.fotorama').fotorama();
});