
//=== footer
jQuery(function($) {
	if ($(".footer_fixed").size() <= 0)
		return;
	
	var is_job = $("body").hasClass("single-job");
	
	if (is_job) {
		var is_visible = true;
		function check_() {
			var is_visible_ = (
					$("#entry_form").size() <= 0 || 
					$("#entry_form").offset().top > $(window).scrollTop() + $(window).innerHeight());
			console.log("check_", is_visible_);
			if (is_visible_ != is_visible) {
				if (is_visible_) {
					$(".footer_fixed").slideDown();
				} else {
					$(".footer_fixed").slideUp();
				}
				is_visible = is_visible_;
			}
		}
		$(window).bind("resize scroll", check_);

	} else {
		var fixed = function() {
			var h = $(".footer_fixed").outerHeight();
			if (h > 0) {
				$("body").css("margin-bottom", h + "px");
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
	}
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

