$(document).ready(function(){
	$('#purpose').on('change', function() {
	  if ( this.value == '0') {
	 
		document.getElementById('ergodotis').style.display = 'inline';

		$("#asfalismenos").hide();
	    $("#suntaksiouxos").hide();
	  } else if (this.value == '1'){
		  $("#asfalismenos").show();
	      $("#ergodotis").hide();
		  $("#suntaksiouxos").hide();
	  }	else if (this.value == '2'){
		  $("#suntaksiouxos").show();
		  $("#ergodotis").hide();
		  $("#asfalismenos").hide();
	  } else {
		  $("#ergodotis").hide();
		  $("#asfalismenos").hide();
		  $("#suntaksiouxos").hide();
	   }
	});
});