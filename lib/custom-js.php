<?php header("Content-Type: text/javascript"); ?>
/**
  * Custom JS for theme
  * 
  * @package custom2015
  * @since brnm 2.5.0
  * @lastmodified brnm 2.6
 **/


jQuery(document).ready(function($) {

/* Equal height for home callouts
-------------------------------------------------------- */
	function equalHeight(group) {
		var tallest = 0;
		group.each(function() {
			thisHeight = $(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		group.height(tallest);
		
		var wrap = $('.pp-content-wrap');
		wrap.addClass('jsready');
		wrap.css('bottom', -tallest);
	}
	
	//equalHeight($('.front .callout h2'));
	//equalHeight($('.galleries-area .item h4'));


/* Stick nav to the top
-------------------------------------------------------- */
	function sticky() {
		var sticky_container = $('.sticky-container');
		var sticky = $('.sticky');
		var sticky_height = $('.sticky').outerHeight();
		var offset_top_sticky = sticky.offset().top;
		if ($(window).width()>767) {
			if (!$('.sticky > .sticky-container').hasClass('second-sticky')) {
				$(sticky).append($(sticky_container)[0].outerHTML);
			}
			$(sticky).find('>.sticky-container').addClass('second-sticky');
			$(window).scroll(function (){
				if (jQuery(document).scrollTop()>(offset_top_sticky + (2*sticky_height))) {
					$(sticky).addClass('show');
				}else{
					$(sticky).removeClass('show');
				}
				if ($(window).width()<767){
					$(sticky).removeClass('show');
				}
			});
		}else{
			$(sticky).removeClass('show');
			$('.sticky > .sticky-container').remove();
		}	
	}
	
	//sticky();


/* Video & Frame Wrap for responsiveness
 * @since brnm 2.6
-------------------------------------------------------- */
	$('iframe:not(#gform_ajax_frame_1)').wrap('<div class="video-container" />');


/* Nav Click to Open
 * @since brnm 2.6
-------------------------------------------------------- */
	$('#nav-click a').click(function(e) {
		e.preventDefault();
		$('.nav-primary').toggleClass('active');
	});

});
