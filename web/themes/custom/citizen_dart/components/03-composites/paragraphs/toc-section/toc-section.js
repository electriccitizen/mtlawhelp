(function ($) {

Drupal.behaviors.tocAnchors = {
	attach: function (context, settings) {
		$(".table-of-contents", context).once('smoothscroll').each(function(){
    	//scroll to anchors
    	$('.toc-section-link').click(function(e){
    		e.preventDefault();
    		//scroll to the anchor
    		var anchor = $(this).attr('href');
    		setTimeout(function(){
    			$('html, body').animate({
            	 scrollTop: $(anchor).offset().top - 200
         	});
    		}, 20);
    	});
   });
  }
};//end toc anchors


})(jQuery);