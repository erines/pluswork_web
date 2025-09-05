(function($, gmaps) {
	var
		ready = false;

	gmaps.event.addDomListener(window, "load", function() {
		ready = true; $("body").trigger("gmapload");
	});

	$.fn.gmaps = function(option) {
		var
			geocoder = new gmaps.Geocoder(),
			node     = this,
			params   = $.extend({
				zoom: 9,
				lat: 0,
				lng: 0,
				mapTypeId: gmaps.MapTypeId.ROADMAP,
				scaleControl: false,
				centerMarker: true,
				autoShow: true
			}, option);

		return this.extend({
			map : null,
			markers: [],
			init_: function() {
				if (params.autoShow) this.show();

				return this;
			},
			show: function() {
				params.center = this.latlng(params.lat, params.lng);
				this.map = new gmaps.Map(node.get(0), params);

				return this;
			},
			latlng: function(lat, lng) {
				return new gmaps.LatLng(lat, lng);
			},
			addMarker: function(args, address) {
				var _this = this;

				if ($.type(address) == "string") {
					geocoder.geocode({address: address}, function(result, status) {
						if (status == gmaps.GeocoderStatus.OK) {
							var
								object   = result[0],
								address  = object.formatted_address,
								geometry = object.geometry,
								location = geometry.location;

							_this.addMarker($.extend({title: address}, args, {lat: location.lat(), lng: location.lng()}));
						}
					});
				} else {
					var
						zoom   = this.map.getZoom(),
						center = this.map.getCenter();

					args = $.extend({
						title: null,
						lat : center.lat(),
						lng : center.lng(),
						zoom: zoom,
						centerTo: false
					}, args);

					args.position = this.latlng(args.lat, args.lng);
					args.map = this.map;

					var marker = new gmaps.Marker(args);
					this.markers.push(marker);

					if (args.centerTo) {
						this.map.panTo(args.position);

						if ($.isNumeric(args.zoom)) {
							this.map.setZoom(args.zoom);
						}
					}
				}

				return this;
			}
		}).init_();
	};

	$.gmaps = gmaps;

	$.gmaps.ready = function(callback) {
		if (!$.isFunction(callback))
			return;

		if (ready)
			return callback();

		$("body").on("gmapload", callback);

	};

})(jQuery, google.maps);