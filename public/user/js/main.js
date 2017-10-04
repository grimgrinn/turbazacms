$(document).ready(function(){

	// $('.tur-item').hover(function(){
	//
	// 	$('.tur-item-fader').toggle();
	// 	$(this).find('.tur-item-fader').hide();
	// 	$('img').toggleClass('grayscale-fader');
	// 	$(this).find('img').toggle();
	// 	$(this).find('.tur-item-description').toggle();
	// 	$(this).find('h3').toggleClass('active');
	// 	$(this).find('.tur-item-text').toggleClass('wide');
	//
	// });

	$('.toggle-nav').click(function(){
		$(this).toggleClass('active');
		$('.sidebar').toggleClass('open');
	});

	$('.room-item-cut').click(function(e){
		e.preventDefault();
		console.log($(this).parent().find('.room-item-description'));
		$(this).parent().find('.room-item-description').toggleClass('superopen');
	});

})
