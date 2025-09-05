
jQuery(function($) {
	var SLIDER_PREV = 'iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo5OUIzODFGOTgwMzAxMUUyQjY0MENDMzYxMTkyRjc4NSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo5OUIzODFGQTgwMzAxMUUyQjY0MENDMzYxMTkyRjc4NSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjk5QjM4MUY3ODAzMDExRTJCNjQwQ0MzNjExOTJGNzg1IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjk5QjM4MUY4ODAzMDExRTJCNjQwQ0MzNjExOTJGNzg1Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+nFHVIAAABTNJREFUeNrEV1lMG1cUZcaA2VoocVnMpnxQJLBEA23FohL1K2VTQKrEB1+gonwUkUKh9AdCixAkqEjlp6FURWqRAPGBwvJRRAhCYjHY3VikNFWJ2WxjEZaCAeOl91hv2qk7AxY/Gekyw3vvnjPvzn3nXnMul8vnZVy++MNx3GXrsIAnUzAfno3hwps7ROZkY7IXNut7CaFA5kcWwEzJ/ufZGpDZyc7ITtndJnoJeXaZHYIwkOwa2fXKyspbWq32oclkWjw5OdlxOBw2u91uPTo6MtDYAuZqamrysJb5BDIMTpJTgphj4QwhiwGhwWCYcDqd57T2LzIj2RrZH8yek5kwR2vsWAsf+JK9wrA4T2LO/effbyzsNIgsfHBw8IPi4uJ7CoWCMJ2bW1tbv66srDxdWloy0y5P/fz8eLVaHZiUlBSh0WgSo6OjU3mej6VoKMbHx+/n5eX9QDgvyKws9C45YoH02szMzMeZmZkf0ZyJCKeHhoYW5ufnt41G4/H+/r7NarUCyCcoKEgRFhbmT6TBGRkZ6qKiordjY2Nv0lTU7Ozs19nZ2R30vCsi/x8xzxInfGRkpKygoOAezRn0ev2j7u7un+jaoe9pp91IJgVFhQsJCfFNS0uLqKioSEtPT79NuAmjo6OfFxYW9rCdI/Gc4OTFvtgAfR9Nbm7uZ/RsAmlnZ6d2enp6++Dg4FyO1J3aNIc1WAsf+AIDWMBkkVSIj4vwbXFEXq2tra2jt3dsbm4+wU4XFxctFxFKvQB84AsMYNXV1X0KbMbBiYlxD6iqqkqKj4+/SYm0MTAwsKDT6cwXkU5OTta3tLS8I0UO3/7+fi2w4uLicoDNdIAXEyMEAaWlpfguJxsbGz9TqExCAsmRUhK9T6G8IzUPX8oLM7CACWxGrBAT46wpExIS0ul+TEfmmdlstsrtViClJLHTkftKLuTAWF5e/h2YDFspyLQ41H6hoaFQnVMi3sGRuYy0t7e3rrW19Te5qABjdXXVAkyG/Y/U+oqLgL+/fyjdDyAOUmGmc3lfpVK5v2lHR8edrq6uPy9KNGDQuT9BAAg7TFxceCkHKJLUeHBwsNrFNHZvb++MxIO/alnkRaXNabPZDhAFUqEAKJLn4rt07e7u6vFMBeETUqrXLgIHBmG5iwVh74tLpkCMgXMSgOdIgMTERBVk0BNoamrqxcTExABVp83w8PAbTU1Nd+vr6zVyxMBITk5+HdlM2GvgEEqlQOyup1RZdIhoSkpKYmRkZBBk0BOssbFR19DQUGuxWLRRUVHvlpSUVMtJKDCoeLwBTMLWM8m0+3gU89O+vr5h+oSBdOBvkNZGSYUb1/DwsJkEpuf4+NhAVegbuTCTbkcCC5jAZo2CO2mFIsExLY2gN/uW1OstkrtHzc3NP0J7pc6zUqnkqqurNW1tbUtSu83JyVFTZG7R0bu9vr6uo3P8IU3tINmRoOLkwrk9bG9vf4B6Sg7vlZeXY+cqqZCfnZ255EjhA19gAAuYwGYcLvGO/1MWqZSV5+fnN6K7mJubG+rp6fmFLos3ZTE1NVVVVlb2ZlZWVjHhXh8bG/uCSux3nmXRm0bASGF3NwL0EtuQQalGAIlE69XUsQiNQDQ1Dg9p7MvLGoFLWx8IPmnvU8ggdSVQJJ+YmJhAHBnK3iQkkqj1eUCtz/dyrY+3zd5jNHK09lDU7D1jtsbGDlmz95g1e7EXNXtXbW8t6DpheMYY5qiJyPe2vfUM9VUaeidTJK8bem+Ivf0J42SK5PVPGO5l/Wj7W4ABAEpAd61VLJScAAAAAElFTkSuQmCC';
	var SLIDER_NEXT = 'iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo5OUIzODFGRDgwMzAxMUUyQjY0MENDMzYxMTkyRjc4NSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo5OUIzODFGRTgwMzAxMUUyQjY0MENDMzYxMTkyRjc4NSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjk5QjM4MUZCODAzMDExRTJCNjQwQ0MzNjExOTJGNzg1IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjk5QjM4MUZDODAzMDExRTJCNjQwQ0MzNjExOTJGNzg1Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+aNLHGAAABTNJREFUeNrEV2tIpFUY9ptx3PFSmnvxru2CbXghL7F4AaM/bqay+MP8IQVKsgVi5OrqH4tNRE3QEoLIyD+CioGuN0jMTPAyO1prqWEGu6PjXJxc7zOOc+t55XzLt9M3M2Y/9sDL9znfeZ/nnPe853lfOYfD4fU8BkfEHMd5nAeTwKQC451o5XaYFWZj7253c8rpgZgn84FdgMnZ05v97sWILDAz7JiZRbAIUWIvF6HmGLAv7CLsamVl5dsKheJrnU734PDwUGW1Wo02m+3EZDJt4TclfSsvL79Jc5mPr1NkPBJzbEcvwCIITKVSjdvtdivmHsB0sMewv5g9gmnpG+ZYaC5bQAQsgGFxnkLN79QPFjw6OvpudnZ2jVQqtQFUrdVqF5eWltZWV1e3NBqNyWKx2ENDQ+WJiYkh8fHx1yMiIl6TSCSRiISkv7//XmFh4ffAeQIzstA7XBHzpBenp6crMzIyPsS7Tq1W/zwwMKCcm5vTgPxod3f3xGg0EpCXn5+fNCgoyCcsLMw/LS0tvKCg4AYWkAXc0NnZ2a8yMzO/wLRtAfm/iCUscYKHhoZK8vLyPsU31cLCwv2Ojo5fMLZwtlbsRjQpEBUuICDAOyUl5UpZWVlKamrqLeDGDA8P38vPz+9kO6cEtBOnROhLG8D5JOTk5NTSTom0vb1dMTU1pdnb27O4IqVB32gOzSUf8iUMwiJMFkmp8LrwZyuDvVhdXX2XzhTh/Yl2qlQqDe4IxRZAPuRLGIRVVVVVTdiMgxMS01NeUVFxPSoqKguJtNHT06OYn5/Xi5E2NDTcmJiYqHFHTr69vb0PCCs6OvoNwmY6IBESUwjkxcXFdC6mjY2NX3Gmej6BnAfCdzsyMvItd+Tki3DrCIswCZsRS4XEdNcuxMTEpOJ5hCvzp16vN7oKcV9f35dIEKs7cvIljOXl5TXCZNi86j0TallgYCCpzvHKyoqBroyr3TQ2Nv7W1dVV7YmcMEC8RZgMW+Yc6tMi4OPjE0SLxV01uQozP+rr6x+2trbepncin5mZaRYLN+SUtNsG7EDG90xy/ecB4ZDs7OyYmSA4/P39w8XmyWQyiavq87S0nZyc7NLhQ4V8SZHcEUOlXkLhuEPv29vbCx9hiCyOsCihvIG9JyyZ3sLSBgF4JJfLo+Li4i5DBtcPDg6sYqQ1NTUJubm57wQHByejOqnHx8d7JycnnzjPIymNjY29REkF7MesXNqFxERgRmVZCAkJeTUhIeEVPP+gQiCW2UVFRR9DHq8ZDAZFc3Nz2+DgoF5MQoHhh+IRiz/9gT3PJNMqDDUl0nF3d/cgjssXIpIMzQ1xFe6xsbFvjo6OVBCITjFSPszQ61DCIkzCZk2CTdj6cExLr2Bl30JpXofc3Ufm/kDaK7br2traxLa2tiWz2ewQ221WVlZ4XV3dTWT8rfX19Xnc4/fxia6WkZJRmFx0b/dbWlo+B5EUDm+WlpYmY9WXCMgZvKmp6XdXpORDvoRBWIRJ2IzD4dzsPS2LKGWlSJ5PqLvA/ezv7Ox8uLi4+PdZymJSUtLlkpKSpPT09ALgvjwyMvIZSux3zmXRZSOAIn4HV+YDvGupEUBHocRvGpJBsUaAEglkp40AdkqNQNhZGwGx1uc9tD53+daHBB86vkqSurm5aSIHdBu+dP1wE6iyJZ+19fHU7EWyZu9H1uzts8aOGrw1Znyzt09zaO5Zmr0zt7co5rmsvVVCNAzUUZLR+3na2/M29DKBBpyroT/PvzDewirzv/6FeR7jHwEGAL4NnCwAEoG9AAAAAElFTkSuQmCC';
	var prevImage = new Image();
		prevImage.src = 'data:image/png;base64,' + SLIDER_PREV;
	var $prevImage = $(prevImage);
	
	var nextImage = new Image();
		nextImage.src = 'data:image/png;base64,' + SLIDER_NEXT;
	var $nextImage = $(nextImage);
	
	
	$('.this_slider').each(function() {
		var duration = 500;
		var interval_t = 5000;
		var timer_id = null;
		
		var locked = false;	// タイマーレベル
		var locked2 = false;//	アニメーションレベル
		
		var $slider = $(this);
		
		var $ul = $slider.find("> ul");
		var $li = $slider.find('> ul > li');
		
		var $current = $li.filter(".active");
		if ($current.size() <= 0) {
			$current = $li.eq(0);
		}
		
		var len = $li.size();
		var current = 0;
		
		// nav
		var $prev = $('<a href="javascript: void(0);" class="prev" />')
						.append($prevImage.clone())
						.css({
							"position" : "absolute" , 
							"top" : "50%" , 
							"left"  : "10px", 
							"margin-top" : "-15px"
						})
						.appendTo($slider);
		var $next = $('<a href="javascript: void(0);" class="next" />')
						.append($nextImage.clone())
						.css({
							"position" : "absolute" , 
							"top" : "50%" , 
							"right"  : "10px", 
							"margin-top" : "-15px"
						})
						.appendTo($slider);
		(function() {
			$prev 
				.css("z-index", 6)	
				.css("opacity", 0);
			$next 
				.css("z-index", 6)
				.css("opacity", 0);
			$ul.fadeIn();
		})();
		
		// z-index
		function init() {
			$li
				.css("z-index", 1)
				.css("opacity", 0);
			$current
				.css("z-index", 2)
				.css("opacity" , 1);
		}
		init();
		
		current = $li.index($current);
		
		
		var $target = null;
		var animating = false;
		function move(idx_) {
			if (current == idx_) 
				return;
			
			if (animating) {
				$current
					.queue([]);
				$target
					.queue([])
					.css("z-index", 2)
					.css("opacity", 0);
			}
			animating = true;
			
			$target = $li.eq(idx_);
			
			$target
				.css("opacity", 0)
				.css("z-index", 3);
			$current
				.animate({"opacity" : 0}, duration);
			$target
				.animate({"opacity" : 1}, duration, function() {	
					current = idx_;
					
					$current = $target;
					animating = false;
					
					init();
					
					timer();
				});
		}
		function timer() {
			if (locked) {
				return;
			}
			if (timer_id) {
				clearTimeout(timer_id);
				timer_id = null;
			}
			timer_id = setTimeout(function() {
				timer_id = null;
				
				if (locked) {
					return;
				}
				
				move((current + 1) % len);
			}, interval_t);
		}
		timer();
		
		
		$slider
			.hover(function() {
				locked = true;
				$prev.queue([]).animate({"opacity" : 1}, "fast");
				$next.queue([]).animate({"opacity" : 1}, "fast");
			}, function() {
				locked = false;
				$prev.queue([]).animate({"opacity" : 0}, "fast");
				$next.queue([]).animate({"opacity" : 0}, "fast");
				timer();
			});
		$next
			.hover(function() {
				locked = true;
			}, function() {
				locked = false;
				timer();
			}).click(function() {
				locked = true;
				move((current + 1) % len);
			});
		$prev
			.hover(function() {
				locked = true;
			}, function() {
				locked = false;
				timer();
			}).click(function() {
				locked = true;
				move((current + len - 1) % len);
			});
		/*
		$btns.hover(function() {
			locked = true;
			
			var idx = $btns.index($(this));
			move(idx);
		}, function() {
			locked = false;
			timer();
		}); */
	});
	
	
});
