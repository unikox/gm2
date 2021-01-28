$('#news').click(function() {
    //alert('NEWS');
    $('.news_item_covid').css('display','none');
    $('#news').css('border-left','#cbd3d9 solid 1px');
    $('#news').css('border-top','#cbd3d9 solid 1px');
    $('#news').css('border-right','#cbd3d9 solid 1px');
    $('.news_item_box').css('display','block');
    }    
);


$('#news_covid').click(function() {
    
    //alert('NEWS COVID');
    $('.news_item_box').css('display','none');
    $('#news_covid').css('border-left','#cbd3d9 solid 1px');
    $('#news_covid').css('border-top','#cbd3d9 solid 1px');
    $('#news_covid').css('border-right','#cbd3d9 solid 1px');
    $('.news_item_covid').css('display','block');
});
