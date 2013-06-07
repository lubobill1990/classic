//面包屑
$('.crumb li').mouseover(function(){
    $(this).find('.crumb-li-hover').removeClass('none');
    $(this).find('.crumb-li-subnav').removeClass('none');
}).mouseout(function(){
    $(this).find('.crumb-li-hover').addClass('none');
    $(this).find('.crumb-li-subnav').addClass('none');
});