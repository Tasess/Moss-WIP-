//Makes the body have the .loaded class after 3 seconds

    (function($) {

    setTimeout(function(){
        $('body').addClass('loaded');
        $('h1').css('color','#222222');
    },2500);

})(jQuery);

//Grid Javascript
$('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: 160,
    gutter: 20
});
