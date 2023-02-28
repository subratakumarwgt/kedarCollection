$(document).ready(function() {
  $('.slider').each(function() {
      var minValue = Number($(this).find('.min-value').attr('data-selected-value')),
          maxValue = Number($(this).attr('data-max')),
          value = Number($(this).attr('data-value')),
          step = Number($(this).attr('data-step')),
          $this = $(this);
      
      $this.slider({
        range: true,
        values: [minValue, maxValue],
        slide: function(event, ui) {
          var selectedMin = ui.values[0],
              selectedMax = ui.values[1],
              currentValueMin = selectedMin,
              currentValueMax = selectedMax;
          
          $this.find('.min-value').html(currentValueMin).attr('data-selected-value', selectedMin);
          $this.find('.max-value').html(currentValueMax).attr('data-selected-value', selectedMax);
        }
        
      });
      
      var currentValueMin = minValue,
          currentValueMax = maxValue;
      
      $this.find('span[tabindex]:first-of-type .value').html(currentValueMin).attr('data-selected-value', minValue);
      $this.find('span[tabindex]:last-of-type').append('<span class="value max-value" data-selected-value></span>').find('.value').html(currentValueMax).attr('data-selected-value', maxValue);
    });
});




$('.slider').each(function() {
  var minValue = Number($(this).attr('data-min')),
      maxValue = Number($(this).attr('data-max')),
      value = Number($(this).attr('data-value')),
      step = Number($(this).attr('data-step')),
      $this = $(this);
  
  $this.slider({
    range: 'min',
    value: value,
    min: minValue,
    max: maxValue,
    step: step,
    slide: function(event, ui) {
      var currentValue = ui.value;
      $(this).find('.value').html(currentValue).attr('data-selected-value', ui.value);
    }
  });
  
  var sliderHandle = $this.find('.ui-slider-handle'),
      currentValue = sliderHandle.parent().attr('data-value');
  sliderHandle.append('<span class="value min-value" data-selected-value="'+ currentValue +'"></span>');
  
  $this.find('.value').html(value);
});





$(function(){
    $('.minus').click(function(){
      quantityField = $(this).next();
      if (quantityField.val() != 0) {
         quantityField.val(parseInt(quantityField.val(), 10) - 1);
      }
    });
    $('.plus').click(function(){
      quantityField = $(this).prev();
      quantityField.val(parseInt(quantityField.val(), 10) + 1);
    });
});


$(function(){
    $('.product_view_item img').click(function(){
        let link = $(this).attr('src');
        $('.product_view_large img').attr('src', link)
    })

    new WOW().init({
        offset: 100,
        mobile: false,
    }); 
});


$(document).ready(function () {
    $(function(){
        function navfix() {
            var scroll_top = $(window).scrollTop();
            if (scroll_top > 40 ) {
                $('.header_main').addClass('scolled');
            } else {
                $('.header_main').removeClass('scolled')
            }
        }
        $(window).scroll(function(){
            navfix()
        })
        navfix()
    })

    $('.menu-toggle').click(function(){
        $(this).toggleClass('active');
        $('.nav_wrap').toggleClass('active');
    });
    

    // owl causes
    $('.home_banner').owlCarousel({
        autoplay:false,
        loop:true,
        dots: true,
        nav:false,
        items: 1,
    })
    $('.clctn_slide').owlCarousel({
        autoplay:false,
        loop:true,
        dots: true,
        nav:true,
        items: 1,
    })

    $('.products_slide').owlCarousel({
        autoplay:true,
        loop:true,
        dots: false,
        nav:true,
        items: 2,
        margin: 20,
        responsive: {
          0: {
            items: 1
          },
          480: {
            items: 2
          }
        }
    })
    $('.product_view').owlCarousel({
        autoplay:false,
        loop:false,
        dots: true,
        nav:true,
        items: 3,
        mouseDrag: false,
        touchDrag: false,
    })
});
        
    
