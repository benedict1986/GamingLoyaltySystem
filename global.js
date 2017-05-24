$( document ).ready(function(){
    $("#navbar-main").sticky({topSpacing:0});
    $('#navbar-main').on('sticky-start', function() { $('.navbar-brand').text("Gaming Loyalty System") });
    $('#navbar-main').on('sticky-end', function() { $('.navbar-brand').text("") });
    
    $('#navbar a').offsetScroller({offsetPixels: 0, animationSpeed: 500});
    $().offsetScroller.scrollToHash(window.location.hash, {offsetPixels: 92});
    
});

