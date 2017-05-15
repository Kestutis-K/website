$(document).ready(function() {

/*$('h1').click(function() {
$(this).css('background-color', '#ff0000');
});
    */


//------------------------------------
//    Sticky navigation
//------------------------------------

    $('.js-section-nav-act').waypoint(function(direction) {
        if (direction == "down") {
            $('nav').addClass('sticky');
        } else {
            $('nav').removeClass('sticky');
        }
        }, {
            offset: '60px'
    });


//------------------------------------
//    Scroll on click
//------------------------------------


$('.js-scroll-to-contact').click(function() {
    $('html, body').animate({scrollTop: $('.js-section-contact').offset().top}, 1000)

});

$('.js-scroll-to-eziukai').click(function() {
    $('html, body').animate({scrollTop: $('.js-section-nav-eziukai').offset().top}, 1000)

});


//------------------------------------
//    Animations on scroll
//------------------------------------
    $('.js-wp-1').waypoint(function(direction) {
        $('.js-wp-1').addClass('animated fadeIn');
    }, {offset: '50%'})



    $('.js-wp-2').waypoint(function(direction) {
        $('.js-wp-2').addClass('animated fadeInUp');
    }, {offset: '50%'})



    $('.js-wp-3').waypoint(function(direction) {
        $('.js-wp-3').addClass('animated fadeIn');
    }, {offset: '50%'})


    $('.js-wp-4').waypoint(function(direction) {
        $('.js-wp-4').addClass('animated pulse');
    }, {offset: '50%'})
});


//------------------------------------
//    Mobile navigation
//------------------------------------

    $('.js--nav-icon').click(function() {
        var nav = $('.js--main-nav');
        var icon = $('.js--nav-icon i');

        nav.slideToggle(200);
        if  (icon.hasClass('ion-navicon-round')) {
            icon.addClass('ion-close-round');
            icon.removeClass('ion-navicon-round');
        } else {
            icon.addClass('ion-navicon-round');
            icon.removeClass('ion-close-round');
        }


    });


function openModal() {
    document.getElementById('myModal').style.display = "block";
}

function closeModal() {
    document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
}


