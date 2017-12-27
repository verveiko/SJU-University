jQuery(document).ready(function($){
            $('.slider').slick({
                arrows: true,
                dots: true,
                autoplay: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplaySpeed: 6000, // speed is in milliseconds
                responsive: [{
                   breakpoint: 900,
                   settings: {
                     slidesToShow: 3
                   },
                   breakpoint: 450,
                   settings: {
                     slidesToShow: 1
                   },
                 
                 }]
            });
         });