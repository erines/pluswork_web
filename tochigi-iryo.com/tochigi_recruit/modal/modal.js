

(function($) {
	var requestAnimationFrame = window.requestAnimationFrame ||
								window.mozRequestAnimationFrame ||
								window.webkitRequestAnimationFrame ||
								window.msRequestAnimationFrame || 
								(function() {
									return function(callback) {
										setTimeout(callback, 600);
									};
								})();
	// window.requestAnimationFrame = requestAnimationFrame;

	var modalWindow = function(params) {
		if (!(this instanceof modalWindow)) 
			return new modalWindow(params);
		
		var defaults = {};
		var params = $.extend(defaults, params);
		
		this.params = params;
		this.show();
	};
	modalWindow.prototype = modalWindow.prototype || {};
	modalWindow.prototype.show = function() {
		this.$overlay = $('<div class="modal-overlay"></div>').appendTo("body");
		this.$window = $('<div class="modal-window"></div>').appendTo("body");
		this.$window.data("modalWindow" , this);
		
		if (this.params.title) {
			this.$title = $('<div class="modal-title"></div>').appendTo(this.$window);
			this.$title.html(this.params.title);
		}
		
		this.$contents = $('<div class="modal-contents"></div>').appendTo(this.$window);
		if (this.params.contents) 
			this.$contents.html(this.params.contents);
		
		if (this.params.footer) {
			this.$footer = $('<div class="modal-footer"></div>').appendTo(this.$window);
			this.$footer.html(this.params.footer);
		}
		
		var self = this;
		this.$overlay.click(function() {
			self.hide();
		});
		
		this.observe();
	};
	modalWindow.prototype.hide = function() {
		this.$overlay.remove();
		this.$window.remove();
		
		this.$overlay = null;
		this.$window = null;
		
		if (this.$title) {
			this.$title.remove();
			this.$title = null;
		}
		this.$contents.remove();
		this.$contents = null;
		if (this.$footer) {
			this.$footer.remove();
			this.$footer = null;
		}
	};
	modalWindow.prototype.observe = function() {
		if (! this.$window || this.$window.size() <= 0) {
			return;
		}
		var w0 = $(window).innerWidth();
		var h0 = $(window).innerHeight();
		
		//var w_ = Math.floor(w0 * 0.8);
		//var h_ = Math.floor(h0 * 0.8);
		
		var w_ = this.$window.outerWidth();
		var h_ = this.$window.outerHeight();
		
		this.$window.css({
			"width" : (w_ + "px") , 
			"height" : (h_ + "px") , 
			"margin-left" : "auto" ,
			"margin-right" : "auto" ,
			"margin-top" : Math.floor((h0 - h_) / 2) + "px"
		});
		
		if (this.params.observe) {
			this.params.observe.call(this, this.$window);
		}
		
		var self = this;
		requestAnimationFrame(function() {
			self.observe();
		});
	};
	window.modalWindow = modalWindow;

	$(this).delegate('.modal-window a.submit', 'click', function(){
		var $window = $(this).closest(".modal-window");
		var $form = $window.find(".modal-contents form");
		
		if ($form.size() > 0) {
			$form.submit();
			if ($window.data("modalWindow"))
				$window.data("modalWindow").hide();
		}
	});
})(jQuery);

jQuery(function($) {
	$(".search_part_area a").click(function() {
		var area = $(this).text();
		
		modalWindow({
			"title" : "エリアから探す (" + area + ")",
			'contents' : '<form action="#" class="cl"><label><input type="checkbox" value="1" />テキストテキスト市</label><label><input type="checkbox" value="1" />テキストテキスト市</label><label><input type="checkbox" value="1" />テキストテキスト市</label><label><input type="checkbox" value="1" />テキストテキスト市</label><label><input type="checkbox" value="1" />テキストテキスト市</label></form>',
			"footer" : '<a href="javascript: void(0);" class="submit">検索する</a>',
			"observe" : function($window) {
				
			}
		});
		return false;
	});
});
