// menu

$(document).on('mouseenter','.menu',function(){
  $('.menu').removeClass('hover');
  $(this).addClass('hover').attr('hover','');
});

$(document).on('mouseleave','.menu',function(){
  var that = $(this).removeAttr('hover');
  setTimeout(function(){
    if(!(that.attr('hover') === '')){
      that.removeClass('hover');
    }
  },200);
});

$(document).on('mouseenter','.menu .sub-menu',function(){
  $('.menu .sub-menu').removeClass('hover');
  $(this).addClass('hover').attr('hover','');
});

$(document).on('mouseleave','.menu .sub-menu',function(){
  var that = $(this).removeAttr('hover');
  setTimeout(function(){
    if(!(that.attr('hover') === '')){
      that.removeClass('hover');
    }
  },200);
});

// slider

$(function(){
  $('.slider').each(function(){
    var maxIndex = parseInt($(this).find('.slider-content li').length / 4);
    var i = 0;
    for(;i < maxIndex + 1;i++){
      $(this).find('.slider-prompt').append('<li data-num="' + i + '"></li>');
    }
    $(this).find('.slider-prompt li').eq(0).addClass('current');
  });

  var to = function($slider, index){
    if($slider.attr('sliding') === ''){
      return;
    }
    var maxIndex = parseInt($slider.find('.slider-content li').length / 4);
    if(index < 0 || index > maxIndex){
      return
    }
    if(index === 0){
      $slider.find('.slider-prev').addClass('off');
    }else{
      $slider.find('.slider-prev').removeClass('off');
    }
    if(index === maxIndex){
      $slider.find('.slider-next').addClass('off');
    }else{
      $slider.find('.slider-next').removeClass('off');
    }
    var $content = $slider.find('.slider-content');
    $slider.attr('current',index);
    $slider.attr('sliding','');
    $content.animate({'left': -index * 103 + "%"},function(){
      $slider.removeAttr('sliding');
    });
    $slider.find('.slider-prompt li').removeClass('current').eq(index).addClass('current');
  }

  $(document).on('click','.slider-prev',function(){
    var $slider = $(this).closest('.slider');
    to($slider, parseInt($slider.attr('current') || 0) - 1);
  });

  $(document).on('click','.slider-next',function(){
    var $slider = $(this).closest('.slider');
    to($slider, parseInt($slider.attr('current') || 0) + 1)
  });

  $(document).on('click','.slider-prompt li',function(){
    var $slider = $(this).closest('.slider');
    to($slider, $(this).data('num'))
  });
});

// float glass

$(document).on('mouseenter','.float-glass-trigger',function(){
  $('.float-glass-trigger').removeClass('hover');
  $(this).addClass('hover').attr('hover','');
});

$(document).on('mouseleave','.float-glass-trigger',function(){
  var that = $(this).removeAttr('hover');
  setTimeout(function(){
    if(!(that.attr('hover') === '')){
      that.removeClass('hover'); 
    }
  },200);
});
