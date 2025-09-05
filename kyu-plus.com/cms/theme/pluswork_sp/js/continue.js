/**
<div class="toggle_continue">
	<div class="continue">
		...
	</div>
</div>
*/

document.write('<style>.toggle_continue .continue { display: none; }</style>');
jQuery(function($) {
	$(".toggle_continue").each(function() {
		var $this = $(this);
		var $continue = $this.find(".continue").hide();
		
		var $_show = $('<span />').text('> 続きを読む');
		var $_hide = $('<span />').text('< 続きを隠す').css("display", "none");
		var $a = $('<a href="javascript: void(0);" />')
						.append($_show)
						.append($_hide)
						.appendTo($this);
		
		$a.click(function() {
			$_show.toggle();
			$_hide.toggle();
			
			$continue.slideToggle();
		});
	});
});
