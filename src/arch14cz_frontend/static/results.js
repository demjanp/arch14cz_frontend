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
			$(this).addClass("expanded");
			$(this).off("click");
		});
	});
	
	$('#datings_overview').zoom();
	cookieconsent.run({"notice_banner_type":"simple","consent_type":"express","palette":"dark","language":"en","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"Arch14CZ","website_privacy_policy_url":"?page=cookiepolicy"});
});