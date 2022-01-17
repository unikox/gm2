/**
 * Created by kox on 15.11.2020.
 */
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
})();