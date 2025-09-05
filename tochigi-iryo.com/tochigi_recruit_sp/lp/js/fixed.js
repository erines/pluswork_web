
//=== footer
jQuery(function($) {
	if ($(".footer_fixed").size() <= 0)
		return;
	
	var fixed = function() {
		var h = $(".footer_fixed").outerHeight();
		if (h > 0) {
			$("body").css("margin-bottom", h + "px");
//			$(".footer_fixed .sub ul").css("margin-bottom", h + "px");
			$(".arrow2top").css("bottom", h + "px");
		}
	};
	
	setTimeout(function() {
		$(".footer_fixed").css("opacity", 1);
		fixed();
	}, 200);
		
	fixed();
	$(window).bind("resize", fixed);
	
	function check_() {
		fixed();
		setTimeout(check_, 1000);
	};
	check_();

	(function() {
		var $overlay = null;
		var $sub = $(".footer_fixed .sub ul");
		if ($sub.size() <= 0)
			return ;
		
		var $link = $(".footer_fixed .show-sub").click(function() {
			if (! $overlay) {
				$overlay = $('<div class="overlay" />').appendTo("body").click(function(event) {
					$link.click();
					
					try {
						event.stopPropagation();
						event.preventDefault();
					} catch(e) {
					}
					
					return false;
				}).bind("touch", function(event) {
					try {
						event.stopPropagation();
						event.preventDefault();
					} catch(e) {
					}
					
					return false;
				});
				$sub.slideDown();
			} else {
				$overlay.remove();
				$sub.slideUp();
				
				$overlay = null;
			}
			
			return false;
		});
	})();
});

//=== header

jQuery(function($) {
	if ($(".header_fixed").size() <= 0)
		return;
	
	var fixed = function() {
		var h = $(".header_fixed").outerHeight();
		if (h > 0) {
			$("body").css("margin-top", h + "px");
		}
	};
	
	setTimeout(function() {
		$(".header_fixed").css("opacity", 1);
		fixed();
	}, 200);
		
	fixed();
	$(window).bind("resize", fixed);

	function check_() {
		fixed();
		setTimeout(check_, 1000);
	};
	check_();

	(function() {
		var $overlay = null;
		var $sub = $(".header_fixed .sub ul");
		if ($sub.size() <= 0)
			return ;
		
		var $link = $(".header_fixed .show-sub").click(function() {
			if (! $overlay) {
				$overlay = $('<div class="overlay" />').appendTo("body").click(function(event) {
					$link.click();
					
					try {
						event.stopPropagation();
						event.preventDefault();
					} catch(e) {
					}
					
					return false;
				}).bind("touch", function(event) {
					try {
						event.stopPropagation();
						event.preventDefault();
					} catch(e) {
					}
					
					return false;
				});
				$sub.slideDown();
			} else {
				$overlay.remove();
				$sub.slideUp();
				
				$overlay = null;
			}
			
			return false;
		});
	})();
});

