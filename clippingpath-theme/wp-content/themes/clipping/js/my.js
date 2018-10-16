  $(function(){
      $(".twentytwenty-container-2[data-orientation!='vertical']").twentytwenty({
          default_offset_pct: 0.5,
            move_slider_on_hover: true, // Move slider on mouse hover?
      });
      $(".twentytwenty-container-2[data-orientation='vertical']").twentytwenty({
          default_offset_pct: 0.3, orientation: 'vertical',
          
      });
    });