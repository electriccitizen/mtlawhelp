(function ($) {

Drupal.behaviors.widgetAnchors = {
	attach: function (context, settings) {
		$(".table-of-contents", context).once('smoothscroll').each(function(){

      //mobile toggle
      $('.toc-menu-toggle').click(function(e){
        e.preventDefault();
        if($(window).outerWidth() < 980){
          if($(this).is('.active-nav')){
            $(this).attr('aria-expanded', 'false').removeClass('active-nav').closest('.toc-title').next('#toc-wrapper').attr('aria-hidden', 'true').slideUp(500);
          }else{
            $(this).attr('aria-expanded', 'true').addClass('active-nav').closest('.toc-title').next('#toc-wrapper').attr('aria-hidden', 'false').slideDown(500);
          }
        }
      });

    	$(window).on('resize',  _.debounce( mobileAnchorNav, 10 )).trigger('resize');
    	//scroll to anchors
    	$('a', this).click(function(e){
    		e.preventDefault();
    		//scroll to the anchor
    		var anchor = $(this).attr('href');
    		setTimeout(function(){
    			$('html, body').animate({
            	 scrollTop: $(anchor).offset().top - 100
         	});
    		}, 20);
    	});
   });
  }
};//end widget anchors

function mobileAnchorNav() {
  var wwidth = $(window).outerWidth();
  if (wwidth < 980) {
    $('.toc-menu-toggle').attr('href','#');
    //add aria roles to menu title and wrapper if not already set by click above 
    if(!$('.toc-menu-toggle').attr('aria-controls')){
      $('.toc-menu-toggle').attr({
        'aria-controls': 'toc-wrapper', 
        'aria-expanded': 'false'
      });
      $('#toc-wrapper').attr('aria-hidden', 'true');
    }
  }else{
    $('.toc-menu-toggle').removeAttr('aria-controls aria-expanded role href');
    $('#toc-wrapper').removeAttr('aria-hidden');
  }
};



})(jQuery);