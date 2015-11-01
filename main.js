var intervalHandle = null;

function swapImages() {
    var $current = $('.product img:visible');
    var $next = $current.next();
    if($next.length === 0) {
        $next = $('.product img:first');
    }

    var $price = $('.product').attr('data-content', 'PRICE: ' + (Math.floor(Math.random()*20)+5) + '$');
    $current.hide();
    $next.show();


}

$(document).ready(function() {
    // Run our swapImages() function every 10.2 secs
    intervalHandle = setInterval(swapImages, 10200);
    $('.product').attr('data-content', 'PRICE: ' + (Math.floor(Math.random()*20)+5) + '$');

    $('body').one('click', function(e) {

    	$(this).find('.timer').remove();
    	$(this).find('.container').append('<div class="confirmation">Congratulations!</div>');
    	clearInterval(intervalHandle);
    	$(this).find('.container').append('<div class="continue">Continue Shopping</div>');

    	$('.continue').one('click', function() {
			location.reload();
			$(this).closest('.container').append('<div class="timer"><img src="timer_small.gif" /></div>');
			$(this).closest('.container').find('.confirmation').remove();
			$(this).closest('.container').find('.continue').remove();
		})
    });

});