/**
 * Created by Andre on 26/06/2015.
 */
/**
* Javascript para definir sempre no topo a barra de menu
*/
/* affix the navbar after scroll below header */
$('#nav').affix({
    offset: {
        top: $('header').height()-$('#nav').height()
    }
});

/* highlight the top nav as scrolling occurs */
$('body').scrollspy({ target: '#nav' })

/* smooth scrolling for scroll to top */
$('.scroll-top').click(function(){
    $('body,html').animate({scrollTop:0},1000);
})

/* smooth scrolling for nav sections */
$('#nav .navbar-nav li>a').click(function(){
    var link = $(this).attr('href');
    var posi = $(link).offset().top+20;
    $('body,html').animate({scrollTop:posi},700);
})


$('a[href="' + this.location.pathname + '"]').parent().addClass('active');
$('.nav li a').click(function(e) {

    $('.nav li').removeClass('active');

    var $parent = $(this).parent();
    if (!$parent.hasClass('active')) {
        $parent.addClass('active');
    }
});