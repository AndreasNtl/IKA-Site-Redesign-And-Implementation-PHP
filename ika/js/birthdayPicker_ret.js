$(document).ready(function() {
	$.dobPicker({
		daySelector: '#dobday_ret', /* Required */
		monthSelector: '#dobmonth_ret', /* Required */
		yearSelector: '#dobyear_ret', /* Required */
		dayDefault: 'Ημέρα', /* Optional */
		monthDefault: 'Μήνας', /* Optional */
		yearDefault: 'Έτος', /* Optional */
		minimumAge: 18, /* Optional */
		maximumAge: 120 /* Optional */
	});
});