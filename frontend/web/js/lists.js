/**
 * Created by kox on 15.11.2020.
 */
 function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}
 $( document ).ready(function() {
    //если включен режим для слабовидящих, включаем чернобелые фильтры
    if (getCookie("Slow_view_mode")=='Enabled'){
        $( ".gm2container" ).css( "filter", "grayscale(100%)" );
        $( ".footer" ).css( "filter", "grayscale(100%)" );
        
    }
});
 show_menu=false;
 $( ".HatMobMenu" ).click(function() {
    if(show_menu){
        show_menu=false;
        $( ".ContentItemBox" ).css( "display", "none" );
        $( ".ContentItemMenu" ).css( "display", "none" );
    } 
    else{
        show_menu=true;
        $( ".ContentItemBox" ).css( "display", "block" );
        $( ".ContentItemMenu" ).css( "display", "block" );
    }
});
//Размер шрифта
function unselect_fonts() {
    $( ".size-normal" ).css('border', 'unset')
    $( ".size-medium" ).css('border', 'unset')
    $( ".size-large" ).css('border', 'unset')
}
$( ".size-normal" ).click(function() {
    unselect_fonts()
    $( ".size-normal" ).css('border', '1px solid')
    $( ".size-normal" ).css('height', '26px')
    $('body').css('fontSize', '19px')
    $('span').css('fontSize', '19px')
  });
$( ".size-medium" ).click(function() {
    unselect_fonts()
    $( ".size-medium" ).css('border', '1px solid')
    $( ".size-normal" ).css('height', '24px')
    $('body').css('fontSize', '24px')
    $('span').css('fontSize', '24px')
});
$( ".size-large" ).click(function() {
    unselect_fonts()
    $( ".size-large" ).css('border', '1px solid')
    $( ".size-normal" ).css('height', '29px')
    $('body').css('fontSize', '29px')
    $('span').css('fontSize', '29px')
    
});
//Цвет сайта
$( ".color-normal" ).click(function() {
    $( ".gm2container" ).css( "filter", "unset" );
    $( ".footer" ).css( "filter", "unset" );    
    $( ".gm2container" ).css( "filter", "grayscale(100%)" );
    $( ".footer" ).css( "filter", "grayscale(100%)" );
    $( ".gm2container" ).css( "background-color", "white" );
    $( ".footer" ).css( "background-color", "white" );
    $( ".site-index" ).css( "background-color", "white" );
    $( ".index-box" ).css( "background-color", "white" );
    $( "body" ).css( "background-color", "#484c51" );
    $( " a.accordion-toggle.collapsed" ).css( "background-color", "white" );
    $( ".gm2container" ).css( "color", "black" );
    $( ".footer" ).css( "color", "black" );
    $( ".site-index" ).css( "color", "black" );
    $( ".index-box" ).css( "color", "black" );
    console.log('color-normal')
});
$( ".color-invert" ).click(function() {
   
    $( ".gm2container" ).css( "filter", "unset" );
    $( ".footer" ).css( "filter", "unset" ); 
    $( ".gm2container" ).css( "filter", "grayscale(100%)" );
    $( ".footer" ).css( "filter", "grayscale(100%)" );
    $( ".gm2container" ).css( "background-color", "black" );
    $( ".footer" ).css( "background-color", "black" );
    $( ".site-index" ).css( "background-color", "black" );
    $( ".index-box" ).css( "background-color", "black" );
    $( "body" ).css( "background-color", "#0d0b0b" );
    $( " a.accordion-toggle.collapsed" ).css( "background-color", "black" );
    $( ".gm2container" ).css( "color", "white" );
    $( ".footer" ).css( "color", "white" );
    $( ".site-index" ).css( "color", "white" );
    $( ".index-box" ).css( "color", "white" );    
    

    console.log('color-invent')
});
$( ".color-chromatic" ).click(function() {
    $( ".gm2container" ).css( "filter", "bluescale(100%)" );
    console.log('color-chromatic')
});
//Изображения
$( ".image-switcher-off" ).click(function() {
    $('img').css('display', 'none')
    $('.HatSlider').css('display', 'none')
    
    $( ".image-switcher-on" ).css('border', 'unset')
    $( ".image-switcher-off" ).css('border', '1px solid')
});
$( ".image-switcher-on" ).click(function() {
    $('img').css('display', 'block')
    $('.HatSlider').css('display', 'block')
    $( ".image-switcher-off" ).css('border', 'unset')
    $( ".image-switcher-on" ).css('border', '1px solid')
});

function unselect_fonts_interval() {
    $( ".spacing-normal" ).css('border', 'unset')
    $( ".spacing-medium" ).css('border', 'unset')
    $( ".spacing-large" ).css('border', 'unset')
}
//Интервал между буквами
$( ".spacing-normal" ).click(function() {
    unselect_fonts_interval() 
    $( ".spacing-normal" ).css('border', '1px solid')
    $( "html" ).css('letter-spacing', 'normal')
});
$( ".spacing-medium" ).click(function() {
    unselect_fonts_interval() 
    $( ".spacing-medium" ).css('border', '1px solid')
    $( "html" ).css('letter-spacing', '1px')
});
$( ".spacing-large" ).click(function() {
    unselect_fonts_interval() 
    $( ".spacing-large" ).css('border', '1px solid')
    $( "html" ).css('letter-spacing', '2px')
});
//Шрифт
$( ".font-arial" ).click(function() {
    $( ".font-times" ).css('border', 'unset')
    $( ".font-arial" ).css('border', '1px solid')
    $( "html" ).css('font-family', 'Arial')
    $( "div" ).css('font-family', 'Arial')
    $( "span" ).css('font-family', 'Arial')
    $( "a" ).css('font-family', 'Arial')

});
$( ".font-times" ).click(function() {
    $( ".font-arial" ).css('border', 'unset')
    $( ".font-times" ).css('border', '1px solid')
    $( "html" ).css('font-family', 'Times')
    $( "div" ).css('font-family', 'Times')
    $( "span" ).css('font-family', 'Times')
    $( "a" ).css('font-family', 'Times')

});

jQuery(function($){
    // событие клика по веб-документу
	$(document).mouseup( function(e){ 
		var div = $( ".ContentItemMenu" ); 
        width = $(window).width();
        if(width<600){
            if ( !div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
                //div.hide(); // скрываем его
                show_menu=false;
                $( ".ContentItemBox" ).css( "display", "none" );
                $( ".ContentItemMenu" ).css( "display", "none" );
            }
        }
	});
});

$(function() {
    var ul = document.querySelectorAll('.treeline > li:not(:only-child) ul, .treeline ul ul');
    for (var i = 0; i < ul.length; i++) {
        var div = document.createElement('div');
        div.className = 'drop';
        div.innerHTML = '+';
        ul[i].parentNode.insertBefore(div, ul[i].previousSibling);
        div.onclick = function() {
            this.innerHTML = (this.innerHTML == '+' ? '−' : '+');
            this.className = (this.className == 'drop' ? 'drop dropM' : 'drop');
        }
    }
});