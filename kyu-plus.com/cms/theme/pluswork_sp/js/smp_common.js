
jQuery.fn.cssNum = function(k) {
	var v = $(this).css(k);
	try {
		v = parseInt(v);
		return v;
	} catch(e_) {}
	return 0;
};

// ラベル設定
jQuery("label").click(function() {});

//:hover効果
jQuery(function($){
    jQuery( 'a, input[type="button"], input[type="submit"], button' )
      .bind( 'touchstart', function(){
        jQuery( this ).addClass( 'hover' );
    }).bind( 'touchend', function(){
        jQuery( this ).removeClass( 'hover' );
    });
    
    // 続きを読む
    $('.show_continue').click(function() {
    	var $a = $(this);
    	var $continue = $(this).closest("div").find(".continue");
    	if ($continue.is(":visible")) {
    		$continue.slideUp();
    		$a.find(".show").show();
    		$a.find(".hide").hide();
    	} else {
    		$continue.slideDown();
    		$a.find(".show").hide();
    		$a.find(".hide").show();
    	}
    });
    
	$(".submit a").click(function() {
		var $a = $(this);
		var $form = $a.closest("form");
		if ($form.hasClass("wpcf7-form")) {
			if ($form.data("requesting") == true) {
				return false;
			}
			$form.data("requesting" , true);
			$a.closest(".submit").css("opacity","0.1");
			
			$form.append('<div class="wpcf7-please_wait center">送信中...</div>');
		} 
		$form.submit();
		return false;
	});
	
	if ($(".wpcf7-form").size() > 0) {
		var $wpcf7_form = $(".wpcf7-form");
		var $wpcf7_submit = $wpcf7_form.find(".submit");
	//	if ($wpcf7_loader.size() > 0) {
			function check_() {
				var $wpcf7_loader = $wpcf7_form.find(".ajax-loader");
				if ($wpcf7_loader.css("visibility") == "hidden" && $wpcf7_form.data("requesting") == true) {
					$wpcf7_submit.css("opacity","1");
					$wpcf7_form.data("requesting" , false);
					$wpcf7_form.find(".wpcf7-please_wait").remove();
				}
			}
			
			setInterval(check_, 100);
	//	}
	} 
});	


jQuery(function($) {
	// opener
	$('.opener h2 a, .opener h3 a').click(function() {
		var $a = $(this);
		var $opener = $a.closest(".opener");
		
		if ($opener.hasClass("close")) {
			$opener
				.removeClass("close")
				.addClass("open");
			
			$opener.find("> .inner").slideDown();
		} else {
			$opener
				.removeClass("open")
				.addClass("close");
			
			$opener.find("> .inner").slideUp();
		}
	}).click();
});

// メニュー
jQuery(function($) {
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

// 高さを合わせる
jQuery(function($) {
	var list = {};
	
	// [data-children-same-height]
	var uuid = 0;
	$('[data-children-same-height]').each(function() {
		var selector = $.trim($(this).attr("data-children-same-height"));
		if (!selector || (selector + "").toLowerCase() === "true" ) {
			selector = '> *';
		}
		
		var selectors = selector.split('|');
		for (var i=selectors.length-1; i>=0; i--) {
			var s_ = $.trim(selectors[i]);
			if (! s_) {
				continue;
			}
			var uuid_ = uuid++;
			var k = "same-height-" + uuid_;
			
			$(this).find(s_).attr("data-same-height", k);
		}
	});
	
	
	$('[data-same-height]').each(function() {
		var $this = $(this);
		var k = $this.attr("data-same-height") || "_";
		
		if (! list[k])
			list[k] = [];
		
		list[k].push($this);
	});
	
	var interval_ = 10;
	var check_ = function() {
		for (var k in list) {
			var list_ = list[k];
			
			var minHeight = 0;
			for (var i in list_) {
				var $el = list_[i];
				if (minHeight < $el.innerHeight()) 
					minHeight = $el.innerHeight();
			}
			if (minHeight) {
				for (var i in list_) {
					var $el = list_[i];
					var minHeight_ = +minHeight - $el.cssNum("padding-top") - $el.cssNum("padding-bottom");
					
					$el.css("min-height" , minHeight_ + "px");
				}
			}
		} 
		
		if (interval_ < 10000) {
			interval_ += 10;
		}
		if (interval_ > 100) {
			return;
		}
		setTimeout(check_, interval_);
	};
	
	check_();
});
/**
jQuery(function() {
	function fixed_() {
		var marginTop = $('#viewport').innerWidth() * 42 / 770;
		var marginBottom = $('#viewport').innerWidth() * 102 / 770;
		$('#main_image').css({
			"marginTop" : Math.floor(-1 * marginTop) + "px",
			"marginBottom" : Math.floor(-1 * marginBottom) + "px",
		});
	}
	fixed_();
	
	var interval_t = 500;
	var check_ = function() {
		fixed_();
		setTimeout(check_, interval_t);
		
		interval_t += 500;
	};
	check_();
});
**/


