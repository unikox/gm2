function SlowView()
    {
	
	$('#slwvw').fadeOut(1000);
        //$('#nrmvw').fadeIn(1000);
        $('#nrmvw').fadeOut(300);
        $('#special-version-controls').fadeIn(500);}
function SmallView(){
        jQuery("*").css('font-size','18');
        //jQuery("#all_content").children().css('font-size','18');
        jQuery("#mj").css('font-size','32');
	this.LineFix();
}
function MidleView()
    {
        $('#slwvw').fadeOut(1000);
        //$('#nrmvw').fadeIn(1000);
        jQuery("*").css('font-size','22');
        //jQuery("#all_content").children().css('font-size','22');
        jQuery("#mj").css('font-size','36');
	this.LineFix();
    }
function LargeView()
    {

        $('#slwvw').fadeOut(1000);
        //$('#nrmvw').fadeIn(1000);
        //$('div:not(.lBox)')
        jQuery("*").css('font-size','26');
        //jQuery('*:not("#special-version-controls")').css('font-size','26');
        //jQuery("#all_content").children("*").css('font-size','26');
        jQuery("#mj").css('font-size','40');

	    LineFix();
    }

function MonoView(){
            jQuery("*").css({'color' : 'white','background':'black'});
            $('body').css('background', "#000000");
            $('.line4').css({'color' : 'white','background':'black'});
            $('.line5').css({'color' : 'black','background':'white'});
            $('.line6').css({'color' : 'white','background':'black'});
            LineFix();
            $('.line4').css({'color' : 'white','background':'black'});
        }
function AlterMonoView(){
            jQuery("*").css({'color' : 'black','background':'white'});
            $('body').css('background', "#FFFFFF");
            $('.line4').css({'color' : 'black','background':'white'});
            $('.line6').css({'color' : 'white','background':'black'});
            LineFix();
        }        
function LineFix(){
        $('.line1').css('font-size', '18');
        $('.line1').css('background', "#d6d6d6");
		$('.line2').css('font-size', '22');
        $('.line2').css('background', "#d6d6d6");
		$('.line3').css('font-size', '26');
        $('.line3').css('background', "#d6d6d6");
        $('.line7').css('background', "#d6d6d6");
        $('#crfont-style').css('background', "#d6d6d6");
        $('#special-version-controls').css('background', "#d6d6d6");

        
        }
function NormalView()
    {
        //$('#nrmvw').fadeOut(2000);
        $('#slwvw').fadeIn(500);
        $('#special-version-controls').fadeOut(500);
        $('*').fadeOut(300);
        //jQuery("body *").css('font-size','-=1');
        //$('#bzz').css('font-size','-=1');
            //$('#divsz').css('font-size','-=1');
            //jQuery("*").css('font-size','-=10');
        //jQuery("*").css('font-size','12');
        //jQuery("#mj").css('font-size','32');
        location.reload();
    }
$('#font_size1').bind( 'click', SlowView );
$('#font_size2').bind( 'click', MidleView );
$('#font_size3').bind( 'click', LargeView );
$('#normal_view').bind( 'click', NormalView );
$('#mono_view').bind( 'click', MonoView );
