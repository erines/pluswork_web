

var scrolltotop = (function($) {
	return {
		startline: 100,
		offsetx : 20,
		offsety : 30,
		state: {
			isvisible:false,
			shouldvisible:false
		},
		scrollup :
			function() {
				var $this = this;

				if(!this.cssfixedsupport) {
					this.$control.css({
						opacity:0
					})
				}
				// 消す
				/* this.$control
					.stop()
					.animate({ opacity:0 }, 100, function() { $(this).hide(); });
				this.state.isvisible = false; */
				this.$body.queue([]).animate(
					{ scrollTop:0 },
					600 , function() {
						$this.$body.scrollTop(0);
						$this.togglecontrol();
					});

			},
		keepfixed:
			function(){
				var $win = $(window);
				var leftpos = $win.scrollLeft() + $win.width()- this.$control.width() - this.offsetx;
				var toppos = $win.scrollTop() + $win.height() - this.$control.height() - this.offsety;
				this.$control.css({
					left: leftpos + "px",
					top: toppos + "px"})
			},
		is_visible : function() {
			var t = $(window).scrollTop();
			return (t >= $("#footer").offset().top - $(window).innerHeight());
		},
		togglecontrol:
			function(){
				var t = $(window).scrollTop();
				if(!this.cssfixedsupport){
					this.keepfixed()
				}
				/*
				this.state.shouldvisible = (t >= this.startline ) ?
							true :
							false;
				*/
				this.state.shouldvisible = this.is_visible();

	//			this.state.shouldvisible = (t >= $('#footer').offset().top - $(window).innerHeight());
	//console.log(t, $('#footer').offset().top, $(window).innerHeight());
				if ( this.state.shouldvisible && !this.state.isvisible) {
					this.$control
						.queue([])
						.css("opacity" , 0)
						.show()
						.animate({ opacity:1 }, 500);
					this.state.isvisible = true;
				} else {
					if ( this.state.shouldvisible == false && this.state.isvisible ) {
						this.$control
							.queue([])
							.animate({ opacity:0 }, 100, function() { $(this).hide(); });
						this.state.isvisible = false;
					}
				}
			},
		init : function() {
			var $this = scrolltotop;
			var a = document.all;
		//	$this.cssfixedsupport = !a || a && document.compatMode == "CSS1Compat" && window.XMLHttpRequest;
			$this.cssfixedsupport = true;
			$this.$body = window.opera ?
								( document.compatMode == "CSS1Compat" ? $("html") : $("body") ) :
								$("html,body");
			$this.$control = ($('.arrow2top').size() > 0 ?
								$('.arrow2top') :
								$('<div class="arrow2top"><a href="javascript: void(0);">PAGE TOP</a></div>'));

			$this.$control
						.css({
						//	position: ($this.cssfixedsupport ? "fixed":"absolute"),
						//	bottom : $this.offsety,
						//	right : $this.offsetx ,
							opacity:0,
							cursor:"pointer"})
						.attr({
							title : "ページトップへ"})
						.hide()
						.appendTo("body");

			$(".arrow2top a")
								.click(
									function() {
										$this.scrollup();
										return false;
									})

			if(document.all && !window.XMLHttpRequest && b.$control.text() != ""){
				b.$control.css({width:b.$control.width()});
			}
			$this.togglecontrol();

			$(window).bind("scroll resize", function(event) {
				$this.togglecontrol();
			});
		}
	};
})(jQuery);

(function ($) {
	$(document).ready(function() {
		scrolltotop.init();
	});
})(jQuery);
