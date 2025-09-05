jQuery(function($) {
	$("input[type='hidden']").each(function(index, target) {
		var id = null, node = $(target);
		switch (node.attr("name")) {
			case "求人名":
				id = "#form-job-name";
				break;
			case "職種":
				id = "#form-job-type";
				break;
		}

		if (id)
			$(id).text($(node).val());
	});
});