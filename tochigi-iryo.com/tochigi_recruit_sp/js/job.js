
// swiper 
jQuery(function($) {
	$.each([".images",".office_images"],function() {
		var s = ".job_detail " + this;
		
		var $c = $(s);
		if ($c.find(".swiper-slide").size() <= 0) {
			return;
		}
		
/*		while ($c.find(".swiper-slide").size() < 6) {
			$c.find(".swiper-wrapper").append($c.find(".swiper-slide").clone());
		} */
		
		
		var swiper = new Swiper(s + " .swiper-container", {
			initialSlide : 2,
			slidesPerView: 2,
			centeredSlides: true,
	//		freeMode: true,
			pagination: s + ' .swiper-pagination',
			paginationClickable: true,
			spaceBetween: 20,
//			nextButton: '.recommend .next a',
//			prevButton: '.recommend .prev a',
			loop: ($c.find(".swiper-slide").size() >= 3)
		});

	});

});