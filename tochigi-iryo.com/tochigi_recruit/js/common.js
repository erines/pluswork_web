
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
	  
	  if ($(".header_fixed").size() > 0) {
		  position -= ($(".header_fixed").outerHeight() + 32);
	  }
	  
	  
      $("html, body").animate({scrollTop:position}, speed, 'swing');
      return false;
   });

	$(".submit a").click(function() {
		$(this).closest("form").submit();
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

// menu
document.write('<style>#header .menu ul { display: none; }</style>');
jQuery(function($) {
	$("#header .show-sub").click(function() {
		$("#header .menu ul").slideToggle();
	});
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
//=== search form
jQuery(function($) {
	if ($(".search_part_area").size() <= 0) {
		return;
	}
	$('.search_part_area .parent input[type="checkbox"]').change(function() {
		var checked = $(this).attr("checked");
		var $children = $(this).closest(".parent").next(".checklist").find('input[type="checkbox"]');
		
		if (checked) {
			$children.removeAttr("checked");
		}
	});
	$('.search_part_area .checklist input[type="checkbox"]').change(function() {
		var checked = $(this).attr("checked");
		var $parent = $(this).closest(".checklist").prev(".parent").find('input[type="checkbox"]');
		
		if (checked) {
			$parent.removeAttr("checked");
		}
	});
});
//=== tab
jQuery(function($) {
	if ($(".search_part_area .tab > ul > li > a").size() <= 0) {
		return;
	}
	
	var $a = $(".search_part_area .tab > ul > li > a");
	var $tab = $(".search_part_area .tab_content");
	
	$tab.hide();
	$tab.eq(0).show();
	
	$a.click(function() {
		var $this = $(this);
		var index = $a.index($this);
		
		$a.removeClass("active");
		$this.addClass("active");
		
		$tab.hide();
		$tab.eq(index).show();
	});
});

// contact form 7
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = 'https://tochigi-iryo.com/lp/complete/';
}, false );