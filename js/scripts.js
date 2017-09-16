( function( $ ) {

    $('#latest_works').mixItUp();

    $('.partner-slider').slick({
  	  slidesToShow: 5,
  	  slidesToScroll: 1,
  	  autoplay: true,
  	  autoplaySpeed: 2000,
  	  dots: false,
  	});

    $('.testimonials-slider').slick({
  	  slidesToShow: 2,
  	  slidesToScroll: 2,
  	  arrows: false,
  	  autoplay: true,
  	  autoplaySpeed: 2000,
  	  dots: true,
  	});

    $('.blog-slider').slick({
  	  slidesToShow: 3,
  	  slidesToScroll: 2,
  	  arrows: true,
  	  autoplay: false,
  	  autoplaySpeed: 2000,
  	  dots: true,
  	});


} )( jQuery );
