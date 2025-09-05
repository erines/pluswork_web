
jQuery.fn.cssNum = function(k) {
	var v = $(this).css(k);
	try {
		v = parseInt(v);
		return v;
	} catch(e_) {}
	return 0;
};

jQuery(function($){
   $('a[href^="#"]').click(function() {
      var speed = 400;
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $("html, body").animate({scrollTop:position}, speed, 'swing');
      return false;
   });

	$(".submit a").click(function() {
		$(this).closest("form").submit();
		return false;
	});
});

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
});	

if (location.hash !== "#open") {
	document.write('<style>.opener > .inner { display: none; }</style>');
}
jQuery(function($) {
	// opener
	$('.opener h2 a, .opener h3 a').click(function() {
		var $a = $(this);
		var $opener = $a.closest(".opener");
		
		if (! $opener.hasClass("open")) {
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
	});//.click();
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

// swiper
jQuery(function($) {
		var swiper = new Swiper('.js-swiper-container .swiper-container', {
			//pagination: '.swiper-pagination',
			initialSlide : 0,
			slidesPerView: 3,
			centeredSlides: false,
			spaceBetween: 5,
			loop: true,
      autoplay: 2000
		});
});

jQuery(function($) {
	console.log("a");
	$("form.wpcf7-form").submit(function() {
		var $form = $(this);
		
		if ($form.find('input[type="radio"][name="agree"]').size() > 0) {
			$form.find('input[type="radio"][name="agree"]').closest("dd").find(".wpcf7-not-valid-tip").remove();
				
			if (! $form.find('input[type="radio"][name="agree"][value="1"]').attr("checked")) {
				//alert('個人情報の取扱いに同意してください。');
				console.log("c",$form.find('input[type="radio"][name="agree"]').closest("dd").size());
				setTimeout(function() {
					$form.find('input[type="radio"][name="agree"]').closest("dd")
						.append('<div class="mt10p" style="clear: both;"><span role="alert" class="wpcf7-not-valid-tip">必須項目に入力してください。</span></div>');
				}, 1);
				return false;
			}
		}
	});
});

// contact form 7
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = 'https://tochigi-iryo.com/lp/complete/';
}, false );