

document.write('<style>' + 
	'.arrow2top { display: none; }' + 
'</style>');

jQuery(function($) {
	var cssNum = function($this, k) {
		var v = $this.css(k);
		try {
			v = parseInt(v);
			return v;
		} catch(e_) {}
		return 0;
	};
	
//	var footer_fixed = [".footer_fixed"];
	var footer_fixed = [];
	var left = 10;
	var bottom = 10;
	var startline = 0; // 常に表示=-1, スクロールしたら表示=0 それ以外=1以上
	
	
	var $body = $("html,body");
	var $arrow2top = null;
	if ($(".arrow2top").size() > 0) {
		$arrow2top = $(".arrow2top");
	} else {
		$arrow2top = $('<div class="arrow2top"><a href="javascript: void(0);">PAGE TOP</a></div>')
					.css({
						"cursor" : "pointer"
					}).attr({
						"title":  "ページトップへ"
					}).appendTo("body");
	}
	$arrow2top.css({
		"position" : "fixed" , 
		"right" : left + "px" , 
		"bottom" : bottom + "20px",
		"opacity" : 0
	}).show();
	
	$arrow2top.find("a").click(function() {
		$body.queue([]).animate(
			{ scrollTop:0 },
			600 , function() {
				$body.scrollTop(0);
			});
			
		return false;
	});
	
	var show_flg = false;
	var check_ = function() {
		// fixed pos 
		var _bottom = 0;
		for (var k in footer_fixed) {
			var $fixed = $(footer_fixed[k]);
			if ($fixed.size() > 0 && 
				$fixed.css("position") == "fixed" && 
				typeof $fixed.css("bottom") !== "undefined") 
			{
				var bottom__ = cssNum($fixed, "bottom");
				var height__ = $fixed.outerHeight();
				
				if (_bottom < bottom__ + height__) {
					_bottom = bottom__ + height__;
				}
			}
		}
		$arrow2top.css("bottom" , (_bottom + bottom) + "px");
		
		// show/hide
		var s = $(window).scrollTop();
		var show_flg_ = (s > startline);
		
		if (show_flg_ != show_flg) {
			if (show_flg_ == true) {
				$arrow2top.queue([]).animate({ opacity:1 }, 500);
			} else {
				$arrow2top.queue([]).animate({ opacity:0 }, 500);
			}
			show_flg = show_flg_;
		}
	};
	var interval_t = 1000;
	/*
	var __check__ = function() {
		check_();
		setTimeout(__check__, interval_t);
		
		//interval_t += 500;
	};
	check_(); */
	check_();
	setInterval(check_ ,interval_t);

	$(window).bind("scroll resize", function(event) {
		check_();
	});
});

