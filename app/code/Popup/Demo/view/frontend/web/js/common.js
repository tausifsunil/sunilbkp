require(['jquery', 'jquery/ui', 'slick'], function($) {
    $(document).ready(function() {      
        $(".regular").slick({
            autoplay: true,
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplaySpeed: 1000
        });
    });
});