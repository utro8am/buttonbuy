function swapImages() {
    var $current = $('.product img:visible');
    var $next = $current.next();
    if($next.length === 0) {
        $next = $('.product img:first');
    }
    $current.hide();
    $next.show();


}

$(document).ready(function() {
    // Run our swapImages() function every 0.5 secs
    setInterval(swapImages, 10200);
});