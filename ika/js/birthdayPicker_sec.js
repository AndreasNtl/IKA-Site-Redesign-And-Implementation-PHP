$(document).ready(function() {
	$.dobPicker({
		daySelector: '#dobday_sec', /* Required */
		monthSelector: '#dobmonth_sec', /* Required */
		yearSelector: '#dobyear_sec', /* Required */
		dayDefault: 'Ημέρα', /* Optional */
		monthDefault: 'Μήνας', /* Optional */
		yearDefault: 'Έτος', /* Optional */
		minimumAge: 18, /* Optional */
		maximumAge: 120 /* Optional */
	});
});