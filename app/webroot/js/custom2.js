//$(document).ready(scr);window.onload=scr;var scred=false;function scr(){if(scred)return;scred=true;
// begin ----------------------------------------


// menu
/*
$( '.menu' ).children('.l').children('.r').children('ul').children( 'li' ).children( 'a' ).mouseover( function(){
	$( this ).addClass( 'sel' );
} );
$( '.menu' ).children('.l').children('.r').children('ul').children( 'li' ).mouseover( function(){
	$( this ).find( 'ul' ).fadeIn( 200 );
} );
$( '.menu' ).children('.l').children('.r').children('ul').children( 'li' ).mouseleave( function(){
	$( this ).find( 'a' ).removeClass( 'sel' );
	$( this ).find( 'ul' ).fadeOut( 200 );
} );
*/
$(document).ready(function(){
// carousel
var container2 = jQuery('#products .logos-move');
var mover2 = container2.find('.mover');
var left2 = 0;
var direc2 = 'l';
var speed2 = 1;
var stop_at_end2 = false;
var view_width2 = container2.width();
var imgs_width2 = container2.find('.mover-in').width();

setInterval ( move_imgs2, 30 );

function move_imgs2(){
	if( direc2 == 'r' ){
		if( left2 >= 100 ){
			left2 = 100;
			direc2 = 'l';
			if(stop_at_end2) speed2 = 0;
		} else {
			left2 += speed2;
			mover2.css( 'left' , left2+'px' );
		}
	} else {
		if( left2 <= - imgs_width2 + view_width2 - 100 ){
			left2 = - imgs_width2 + view_width2 - 100;
			direc2 = 'r';
			if(stop_at_end2) speed2 = 0;
		} else {
			left2 -= speed2;
			mover2.css( 'left' , left2+'px' );
		}
	}
}
	
//container.find( '.left' ).mouseenter( function(){ direc = 'l' } );
//container.find( '.right' ).mouseenter( function(){ direc = 'r' } );

var wra2 = jQuery('#products.logos-move-wrapper');

wra2.find( '.arrow-left' ).mousedown( function(){
	stop_at_end2 = true;
	direc2 = 'l';
	speed2 = 5;
} );
wra2.find( '.arrow-left' ).mouseup( function(){
	speed2 = 1;
	direc2 = 'l';
	stop_at_end2 = false;
} );
wra2.find( '.arrow-left' ).mouseleave( function(){
	speed2 = 1;
	stop_at_end2 = false;
} );

wra2.find( '.arrow-right' ).mousedown( function(){
	direc2 = 'r';
	stop_at_end2 = true;
	speed2 = 5;
} );
wra2.find( '.arrow-right' ).mouseup( function(){
	direc2 = 'r';
	speed2 = 1;
	stop_at_end2 = false;
} );
wra2.find( '.arrow-right' ).mouseleave( function(){
	speed2 = 1;
	stop_at_end2 = false;
} );

	
	
// end all --------------------------------------
//}
});