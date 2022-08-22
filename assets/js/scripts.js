(function($) {

  $(document).ready(function() {
    // Swiper Slider 
    var swiper = new Swiper(".banner-slider-wrapper", {
      // autoplay: {
      //   delay: 2500,
      //   disableOnInteraction: false,
      // },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
    });


    // ajax load More
    var currentPage = 1;
  
    $(".loadmore-button").on("click", function() {
      currentPage++;
      $.ajax({
        type: 'POST',
        url: ajax_posts.ajaxurl,
        data:  {
          action: 'ind_load_more_posts',
          security: ajax_posts.security,
          page: currentPage,
        },
        success: function(res) {
          if( $.trim(res) != '' ) {
            $(".latest-section-content").append(res);
          } else {
            $(".loadmoore-btn").html('<p>No More Posts ..</p>');
          }  
        }
      })

      
    })


  });


})(jQuery)