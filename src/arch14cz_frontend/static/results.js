$(document).ready(function() {
	$("#results > tbody > tr > td > div").on("click", function(e) {
		e.preventDefault();
		if ($(this).css("height") == "14px") {
			var h = "auto";
		} else {
			var h = "14px";
		}
		$(this).closest("tr").find("div").each(function() {
			$(this).css("height", h);
		});
	});
});
