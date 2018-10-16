
$(document).ready(function(){
	


$('.card-header').click(function(){
    $('.card-header').removeClass('active');
    $(this).addClass('active');
});


// for new banner
$('#banner-slide').slick({
  dots: true,
  arrows: true,
  autoplay: true,
  infinite: true,
  speed: 800,
  fade: true,
  cssEase: 'linear',
  swipe: false,
  prevArrow: '<i class="fa fa-chevron-left left_arrow"></i>',
  nextArrow: '<i class="fa fa-chevron-right right_arrow"></i>',
});
// for new banner







$('.testimonial-slide').slick({
  dots: true,
  arrows: false,
  autoplay: true,
  speed: 800,
  slidesToShow: 1,
  slidesToScroll: 1,
});
$('.blog-slide').slick({
  dots: true,
  arrows: false,
  autoplay: false,
  speed: 800,
  slidesToShow: 2,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
    
});
$('.partner-slide').slick({
  dots: false,
  arrows: false,
  autoplay: true,
  speed: 800,
  slidesToShow: 5,
  slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 4,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 3,
      }
    }
  ]
});

$('.venobox').venobox(); 

$('.sample-slide').slick({
  dots: false,
  arrows: true,
  autoplay: false,
  speed: 800,
  slidesToShow: 1,
  slidesToScroll: 1,
    prevArrow: '<i class="fa fa-chevron-left left_arrow"></i>',
    nextArrow: '<i class="fa fa-chevron-right right_arrow"></i>',
    responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 1,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
});

$scrollTop=500;
$('.up-btn').click(function(){
    $('html, body').animate({
        scrollTop: 0
    },1000);
});
$(window).scroll(function(){
    $scrolling=$(this).scrollTop();
    if($scrolling > $scrollTop){
       $('.up-btn').fadeIn();
    }else{
        $('.up-btn').fadeOut();
    }
});


                $('#clock_hou').jClocksGMT(
                {
                    title: 'Bangladesh ( Dhaka )', 
                    offset: '-6',
                    date: false, 
                    skin: 3
                });

                $('#clock_india').jClocksGMT(
                {
                    title: 'USA ( New York )', 
                    offset: '+5.5', 
                    date: false, 
                    skin: 3, 
                });

                $('#clock_korea').jClocksGMT(
                {
                    title: 'Australia ( Sydney )', 
                    offset: '+8', 
                    skin: 3, 
                    date: false
                });

                $('#clock_uk').jClocksGMT(
                {   
                    title: 'UK ( London )',
                    date: false, 
                    skin: 3
                });

         
  
      $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({
          default_offset_pct: 0.5,
            move_slider_on_hover: false, // Move slider on mouse hover?
      });
      $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({
          default_offset_pct: 0.3, orientation: 'vertical',
          
      });
});