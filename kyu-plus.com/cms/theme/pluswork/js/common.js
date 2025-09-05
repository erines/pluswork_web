
jQuery.fn.cssNum = function(s) {
	var i = 0;
	try {
		i = parseInt(jQuery(this).css(s));
	} catch(e) {}
	return i;
};



jQuery(function($) {
	//$('[data-sp-tel]')
	
	function sp_() {
		try {
			if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) || 
				navigator.userAgent.indexOf('iPod') > 0 || 
				navigator.userAgent.indexOf('Android') > 0) 
			{
				return true;
			}
		} catch(e) {
			console.error(e);
		}
		return false;
	}
	if (sp_()) {
		$('a[data-tel]').each(function() {
			var $this = $(this);
			var tel = $this.attr("data-tel");
			
			$this
				.removeAttr("data-tel")
				.attr("href", "tel:" + tel);
		});
		$('[data-tel]').each(function() {
			var $this = $(this);
			var tel = $this.attr("data-tel");
			
			$this.wrapAll($('<a />').attr("href", "tel:" + n));
		});
	} else {
		/* $("a[data-tel]").click(function() {
			alert('このボタンはスマートフォンで有効です。');
			return false;
		}); */
		$("a[data-tel]")
			.removeClass("op")
			.css({
				"cursor" : "default"
			}).click(function() {
				return false;
			}); 
	}
});

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

// RollOver

jQuery(function($) {
	$('a.on').each(function() {
		var $a = $(this);
		if ($a.find("img.on_target").size() <= 0) {
			$a.find("img").addClass("on_target");
		}
		
		$a.find("img.on_target").each(function() {
			var $image = $(this);
			
			var src = $image.attr("src");
			var ext = src.substr(src.lastIndexOf("."), src.length-1);
			var dst = src.replace(ext, "_on" + ext) + "?" + (new Date().getTime());
			
			new Image().src = dst;
			
			$image.data("src" , src);
			$image.data("dst" , dst);
		});
	}).hover(function() {
			$(this).find("img.on_target").each(function(){
				$(this).attr("src" , $(this).data("dst"));
			});
		}, function(){
			$(this).find("img.on_target").each(function(){
				$(this).attr("src" , $(this).data("src"));
			});
		});
});
 

// RollOver_Opacity

jQuery(function($){
	$('.op .op').removeClass("op");
	
	$(".op").hover(function(){
		var o = $.trim($(this).attr("data-opacity"));
		if (o === "")
			o = 0.6;
		$(this).fadeTo("normal", o); 
	},function(){
		$(this).fadeTo("normal", 1.0);
	});
});




//=== テーブル
jQuery(function($) {
	$('#main table.mainstyle').wrap('<div class="table_wrap"></div>');
});



/**
toFavorite
*/

function toFavorite(toURL,toStr){
	var toURL = toURL || location.href || "";
	var toStr = toStr || document.title || "";
	
	if(navigator.userAgent.indexOf("MSIE") > -1){
		//Internet Explorer
		window.external.AddFavorite(toURL,toStr);
	}else{
		alert("ブラウザ付属のブックマーク機能をご利用ください。");
	}
}
jQuery(function($) {
	$(".add-favorite").click(function() {
		toFavorite();
	});
});


// 高さを合わせる
jQuery(function($) {
	var list = {};
	
	
	// [data-children-same-height]
	// | で区切って
	// .text|.image:3 => 3n
	// .text|.image:3:1 => 3n+1
	var uuid = 0;
	$('[data-children-same-height]').each(function() {
		var selector = $.trim($(this).attr("data-children-same-height"));
		if (!selector || (selector + "").toLowerCase() === "true" ) {
			selector = '> *';
		}
		var len = 0;
		var mod = 0;
		if (selector.indexOf(":")) {
			var tmp = selector.split(':');
			selector = tmp[0];
			try {
				len = parseInt(tmp[1] || "0");
				mod = parseInt(tmp[2] || "0");
			} catch(e_) {}
		}
		
		
		var selectors = selector.split('|');
		for (var i=selectors.length-1; i>=0; i--) {
			var s_ = $.trim(selectors[i]);
			if (! s_) {
				continue;
			}
			var uuid_ = uuid++;
			var k = "same-height-" + uuid_;
			
			var n = 0;
			$(this).find(s_).each(function() {
				var k_ = "" + k;
				if (len > 0) {
					k_ = k_ + "-" + Math.floor((n++  + len - mod)/ len);
				}
				
				$(this).attr("data-same-height", k_);
			}); // .attr("data-same-height", k);
		}
	});
	
	
	$('[data-same-height]').each(function() {
		var $this = $(this);
		var k = $this.attr("data-same-height") || "_";
		
		if (! list[k])
			list[k] = [];
		
		list[k].push($this);
	});
	for (var k in list) {
		var list_ = list[k];
		
		var minHeight = 0;
		for (var i in list_) {
			var $el = list_[i];
			
//			var height_ = $el.innerHeight() - $el.cssNum("padding-top") - $el.cssNum("padding-bottom");
			var height_ = $el.innerHeight();
			if (minHeight < height_) 
				minHeight = height_;
		}
		if (minHeight) {
			for (var i in list_) {
				var $el = list_[i];
				
				var minHeight_ = minHeight - $el.cssNum("padding-top") - $el.cssNum("padding-bottom");
				$el.css("min-height" , minHeight_ + "px");
			}
		}
	} 
});


// swiper 
jQuery(function($) {
	var len = $('.recommend .swiper-container .swiper-slide').size();
	if (len > 5) {
		var swiper = new Swiper('.recommend .swiper-container', {
			//pagination: '.swiper-pagination',
			initialSlide : 2,
			slidesPerView: 4,
			centeredSlides: true,
	//		freeMode: true,
	//		paginationClickable: false,
			spaceBetween: 20,
			nextButton: '.recommend .next a',
			prevButton: '.recommend .prev a',
			loop: true
		});
	} else {
		$(".recommend .prev").hide();
		$(".recommend .next").hide();
	}
	

});