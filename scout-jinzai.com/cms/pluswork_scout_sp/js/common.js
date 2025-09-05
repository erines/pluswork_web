
jQuery.fn.cssNum = function(s) {
	var i = 0;
	try {
		i = parseInt(jQuery(this).css(s));
	} catch(e) {}
	return i;
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
		$('[data-sp-tel]').each(function() {
			var $this = $(this);
			var n = $this.attr("data-sp-tel");
			$this.wrapAll($('<a />').attr("href", "tel:" + n));
		});
	}
});

//=== フォーム
jQuery(function($) {
	
	$('.search_form dl input[type="checkbox"]').on("change", function() {
		var $checkbox = $(this);
		var checked_ = $checkbox.attr("checked");
		
		if ($checkbox.closest("dt").size() > 0) {
			if (checked_)
				$checkbox.closest("dl").find('dd input[type="checkbox"]').attr("checked","checked");
		} else if ($checkbox.closest("dd").size() > 0) {
			if (! checked_) {
				$checkbox.closest("dl").find('dt input[type="checkbox"]').removeAttr("checked");
			} else {
				if ($checkbox.closest("dd").find('input[type="checkbox"]:not(:checked)').size() <= 0) {
				$checkbox.closest("dl").find('dt input[type="checkbox"]').attr("checked","checked");
				}
			}
		}
	});
});

//=== タブ
jQuery(function($) {
	$(".contents_tab").each(function() {
		var $c = $(this);
		
		var $tabs = $c.find(".tabs > li > a");
		var $contents = $c.find(".tab_contents > li");
		
		$tabs.click(function() {
			var $tab = $(this);
			
			var index = $tabs.index($tab);
			var $content = $contents.eq(index);
			
			$tabs.removeClass("active");
			$tab.addClass("active");
			
			$contents.removeClass("active");
			$content.addClass("active");
		});
	});
});

//=== FAQ
jQuery(function($) {
	$(".faqlist dl dt").click(function() {
		var $dt = $(this);
		var $dd = $dt.next("dd");
		
		if ($dd.size() <= 0) {
			return;
		}
		
		if ($dt.hasClass("active")) {
			$dt.removeClass("active");
			$dd.queue([]).slideUp();
		} else {
			$dt.addClass("active");
			$dd.queue([]).slideDown();
		}
	});
});

//=== トップページ
/*
jQuery(function($) {
	var $c = $("#main_image");
	if ($c.size() <= 0) {
		return;
	}

	var check_ = function() {
		//=== ロゴ
		var height_ = $(window).innerHeight();
		if (height_ < 480)
			height_ = 480;
		
		$c.css("height", height_ + "px");
	};
	check_();
	$(window).bind("resize", check_);
}); */


//=== icatch
/*
jQuery(function($) {
	var $c = $(".page_image");
	if ($c.size() <= 0) {
		return;
	}
	
	var check_ = function() {
		var width_ = $c.find("img").innerWidth();
		var height_ = $c.find("img").innerHeight();
		if (height_ > 0) {
			$c
				.css({
					"height" : height_ + "px",
					"position" : "relative"
				});
			$c.find("img")
				.css({
					"position" : "absolute",
					"top" : "0",
					"left": "50%",
					"margin-left": (-1 * width_ / 2) + "px"
				});
		}
	};
	check_();
	
	setInterval(function() {
		check_();
	}, 1000);
});

*/