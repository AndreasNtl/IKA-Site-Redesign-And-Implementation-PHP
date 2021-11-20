$(document).ready(function() {
	$.dobPicker({
		daySelector: '#dobday_emp', /* Required */
		monthSelector: '#dobmonth_emp', /* Required */
		yearSelector: '#dobyear_emp', /* Required */
		dayDefault: 'Ημέρα', /* Optional */
		monthDefault: 'Μήνας', /* Optional */
		yearDefault: 'Έτος', /* Optional */
		minimumAge: 18, /* Optional */
		maximumAge: 120 /* Optional */
	});
});