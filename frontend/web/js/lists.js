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
        footer
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