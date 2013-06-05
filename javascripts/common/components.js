//form
$('.form-item').mouseover(function(){
    $(this).find('.form-item-clear').removeClass('none');
    $(this).find('label').addClass('label-focus');
}).mouseout(function(){
    $(this).find('.form-item-clear').addClass('none');
    $(this).find('label').removeClass('label-focus');
});

$('.form-item-clear').click(function(){
    $(this).prev().val('');
    return true;
})