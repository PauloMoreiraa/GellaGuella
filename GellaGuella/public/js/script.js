// NavBar Effect

const navbar = document.querySelector('nav');

window.onscroll = () => {
    this.scrollY > 20 
        ? navbar.classList.add("sticky") 
        : navbar.classList.remove("sticky");
}

// Flickity.js

$('.slide-brands').flickity({
    cellAlign: 'center',
    contain: true,
    prevNextButtons: false,
    pageDots: false,
    autoplay: 3000,
    wrapAround: true,
    infinite: true
});

// Scroll Animate (Left to Right)

var $target = [
    $('.anime-top'),
    $('.anime-left'),
    $('.anime-right')
]

function animeScrool(){
	var documentTop = $(document).scrollTop()
	var offset = $(window).height() * 3 / 4
    
    for(let i = 0; i < $target.length; i++){
        $target[i].each(function(){
            var itemTop = $(this).offset().top
            if(documentTop > itemTop - offset) $(this).addClass('anime-start')
            else $(this).removeClass('anime-start')
        })
    }
}

$(document).scroll(function(){
	animeScrool()
})

// To top

$(document).ready(function(){
    $('#logo-anchor').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
})