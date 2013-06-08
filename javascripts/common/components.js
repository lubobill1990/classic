//面包屑
$('.crumb li').mouseover(function(){
    $(this).find('.crumb-li-hover').removeClass('none');
    $(this).find('.crumb-li-subnav').removeClass('none');
}).mouseout(function(){
    $(this).find('.crumb-li-hover').addClass('none');
    $(this).find('.crumb-li-subnav').addClass('none');
});

//slide
$('.slide-prev').click(function(){
    var current_prompt = $('.slide-prompt').find('.current');
    var current_num = current_prompt.data('number');
    if(current_num>0){
        //更新右上角提示符
        current_prompt.removeClass('current');
        current_prompt.prev().addClass('current');

        //移动ul
        var offset = parseInt($('.slide-ul-wrapper').css('left').replace('px',''))+509;
        $('.slide-ul-wrapper').animate({'left':offset+"px"});
    }

    //重置按钮
    $('.slide-next').removeClass('off');
    $('.slide-prev').removeClass('off');
    if(current_num<=1){
        $(this).addClass('off');
    }
});
$('.slide-next').click(function(){
    var current_prompt = $('.slide-prompt').find('.current');
    var current_num = current_prompt.data('number');
    if(current_num<3){
        //更新右上角提示符
        current_prompt.removeClass('current');
        current_prompt.next().addClass('current');

        //移动ul
        var offset = parseInt($('.slide-ul-wrapper').css('left').replace('px',''))-509;
        $('.slide-ul-wrapper').animate({'left':offset+"px"});
    }

    //重置按钮
    $('.slide-next').removeClass('off');
    $('.slide-prev').removeClass('off');
    if(current_num>=2){
        $(this).addClass('off');
    }
});