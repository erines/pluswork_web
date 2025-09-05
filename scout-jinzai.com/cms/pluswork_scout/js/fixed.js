
//=== footer
jQuery(function($) {
	return ; ////// 
	if ($(".footer_fixed").size() <= 0)
		return;
	
	var fixed = function() {
		if ($(".footer_fixed").size() <= 0) {
			$("body").css("margin-bottom", "0");
			return false;
		}
	
		var h = $(".footer_fixed").outerHeight();
		if (h > 0) {
			$("body").css("margin-bottom", h + "px");
		}
		return true;
	};
	
	fixed();
	$(window).bind("resize", fixed);
	
	function check_() {
		if (fixed())
			setTimeout(check_, 1000);
	};
	check_();
/*
	$('<a href="javascript: void(0);" class="close"></a>')
		.appendTo($(".footer_fixed .inner"))
		.click(function() {
			$(".footer_fixed").fadeOut(function() {
				$(".footer_fixed").remove();
				fixed();
			});
		});
	*/
}); 

//=== header
jQuery(function($) {
	if ($(".header_fixed").size() <= 0)
		return;
	
	var $fixed = $(".header_fixed");
	
	var marginTop = 0;
	var fixed = function() {
		var scroll = $(window).scrollTop();
		
		scroll > 20 ? 
			$fixed.addClass("fixed") : 
			$fixed.removeClass("fixed");
		
		var h = $fixed.outerHeight();
		if (marginTop < h) {
			marginTop = h;
			$("body").css("margin-top", marginTop + "px");
		}
	};
	
	setTimeout(function() {
		//$(".header_fixed").css("opacity", 1);
		fixed();
	}, 200);
		
	fixed();
	$(window).bind("resize scroll", fixed);

	function check_() {
		fixed();
		setTimeout(check_, 1000);
	};
	check_();

	(function() {
		return ; // @TODO
		
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

