<?php
session_start();

include_once './dbconnect.php';

// set validation error flag as false
$error = false;
$suntakshBool = false;

$tupos0 = false;
$tupos1 = false;
$eggamos = false;
$eggamos1 = false; 
$agamos = false;
$agamos1 = false;

// check if form is submitted
if (isset($_POST['submit'])) {

	$tupos =        mysqli_real_escape_string($con, $_POST['tupos']);
    $days  =        mysqli_real_escape_string($con, $_POST['days']);
 


	if($tupos == 0){
		$tupos0 = true;
	} else if ($tupos == 1){
		$tupos1 = true;
	} 
	
	if($katastasi == 0){
		$eggamos = true;
	} else if ($tupos == 1){
		$eggamos1 = true;
	}  else if ($tupos == 2){
		$agamos = true;
	}  else if ($tupos == 3){
		$agamos1 = true;
	} 

	if (!$error) {

		if($tupos == "0"){
           
		}
		if($tupos == "1"){
           
		}


	$suntakshBool = true;
	$successmsg = "<strong>Η σύνταξη σας υπολογίζεται στα </strong>";
	}		
}
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">
	<style type="text/css">
		body { background: #d0d3d8 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
	</style>

    <title>IKA-ETAM Υπολογισμός μισθού κι ενσήμων</title>
	
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./assets/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="./css/layout.css" rel="stylesheet">
	<link href="./css/dropdownselect.css" rel="stylesheet">

  </head>

  <body>
  
<!-- start of present-in-all-webpages header -->
<header>
	<a href="./index.php" title=""><img style ="width:25%" id="banner" alt="IKA-ETAM" src="./images/ika_logo.jpg" title="IKA-ETAM"></a>  

	<!-- topcorner buttons -->
	<div class="topcorner-buttons">
		<form class="form-signin">
			<?php if (isset($_SESSION['usr_name'])) { ?>
				<p class="text-right">Καλωσήλθατε!<br><a href="./profile.php"><span style="font-size:large;"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['usr_name']; ?></span></a></p>
				<a href="./logout.php" class="btn btn-lg btn-primary btn-block">Έξοδος</a>
			<?php } else { ?>
				<a href="./login.php" class="col-sm6 btn btn-lg btn-primary btn-block">Είσοδος</a>
				<a href="./register.php" class="col-sm6 btn btn-lg btn-primary btn-block">Εγγραφή</a>
			<?php } ?>
		</form>
		<br></br>
		<!-- search button -->
		<button type="button" class="searchButton searchButton-defaults">
      		<span class="glyphicon glyphicon-search"></span> Search
    	</button>
	</div> <!-- /topcorner-buttons -->
	
	<br></br>
				
	<!-- main dropdown menus -->
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<!-- dropdown menu for employers -->
					<li class="dropdown">
						<a class="dropbtn"> <b>Εργοδότες</b> <span class="caret"></span> </a>
						<ul class="dropdown-content">
							<li><a href="./emp-vevaiwsh-apasxolishs-proswpikou.php">Βεβαίωση απασχόλησης προσωπικού(φορολογική χρήση)</a></li>
							<li><a href="./emp-ypologismos-misthou-enshmwn.php"> <b>Υπολογισμός μισθού και ενσήμων</b> </a></li>
							<li><a href="./emp-ypovolh-enshmwn.php">Υποβολή ενσήμων εργαζομένου</a></li>
							<li><a href="./emp-ypovolh-apd.php">Ηλεκτρονική υποβολή ΑΠΔ</a></li>
							<li><a href="./emp-plirofories.php">Πληροφορίες για δικαιώματα και υποχρεώσεις</a></li>
						</ul>
					</li>
					<!-- dropdown menu for secured -->
					<li class="dropdown">
						<a class="dropbtn">Ασφαλισμένοι<span class="caret"></span></a>
						<ul class="dropdown-content">
							<li><a href="./sec-vevaiwsh-asfalistikhs-ikanothtas.php">Βεβαίωση ασφαλιστικής ικανότητας(φορολογική χρήση)</a></li>
							<li><a href="./sec-aithsh-anarwtikhs.php">Αίτηση για αναρρωτική άδεια</a></li>
							<li><a href="./sec-ekdosh-adeias-mhtrothtas.php">Έκδοση άδειας μητρότητας</a></li>
							<li><a href="./sec-ekdosh-bibliariou.php">Έκδοση βιβλιάριου υγείας</a></li>
							<li><a href="./sec-epidoma-astheneias.php">Επίδομα ασθένειας/ατυχήματος</a></li>
							<li><a href="./sec-ypologismos-vasikou-posou.php">Υπολογισμός βασικού ποσού σύνταξης</a></li>
					     	<li><a href="./sec-aithsh-aponomhs-syntaxhs.php">Αίτηση απονομής κύριας σύνταξης</a></li>
							<li><a href="./sec-enhmerwsh-dikaiwmatos-syntaxiodothshs.php">Ενημέρωση δικαιώματος συνταξιοδότησης</a></li>
						</ul>
					</li>
					<!-- dropdown menu for retired -->
					<li class="dropdown">
					    <a class="dropbtn">Συνταξιούχοι<span class="caret"></span></a>
						<ul class="dropdown-content">
							<li><a href="./ret-vevaiwsh-syntaxewn.php">Βεβαίωση συντάξεων(φορολογική χρήση)</a></li>
							<li><a href="./ret-enhmerwsh-kinhshs-syntaxhs.php">Ενημέρωση κίνησης σύνταξης</a></li>
							<li><a href="./ret-plhroforhsh-syntaxiouxwn-exwterikou.php">Πληροφόρηση συνταξιούχων εξωτερικού</a></li>
						</ul>
					</li>
					<!-- dropdown menu for external links -->
					<li class="dropdown">
						<a class="dropbtn">Εξωτερικοί σύνδεσμοι<span class="caret"></span></a>
						<ul class="dropdown-content">
						<!-- -->
						</ul>
					</li>
					<!-- dropdown menu for FAQ -->
					<li class="dropdown">
					    <a class="dropbtn" >Συχνές ερωτήσεις<span class="caret"></span></a>
						<ul class="dropdown-content">
						<!-- -->
						</ul>
					</li>
				</ul>
			</div>
		</div> <!-- /container -->
	</nav> <!-- /navbar navbar-inverse -->

</header>
<!-- end of present-in-all-webpages header -->


	
	<br>
	</br>

<div class="container">
<?php if(!$suntakshBool) { ?> 
	<!-- <form   class="well form-horizontal" action=" " method="post" enctype="multipart/form-data" id="contact_form"> -->
		<fieldset>
<!-- Form Name --> 
			<legend>Υπολογισμός μισθού και ενσήμων</legend>

			<br></br>		
			<div class="form-group">
				<label class="col-md-4 control-label" >Τύπος απασχόλησης </label>
			   <div  class="form-control" style="border-style: none;"  >
					<select  name="tupos" style="margin-left:5%" >
						<option <?php if($tupos0) echo "selected"; ?> value="0">Ολική</option>
						<option <?php if($tupos1) echo "selected"; ?> value="1">Μερική</option>
					</select>
               </div>				   
			</div>	
			 <br></br>
			 <div class="form-group">
				<label class="col-md-4 control-label" >Οικογενειακή κατάσταση </label>
			   <div  class="form-control" style="border-style: none;"  >
					<select  name="katastasi" style="margin-left:5%" >
						<option <?php if($eggamos) echo "selected"; ?> value="0">Έγγαμος/η(με παιδιά)</option>
						<option <?php if($eggamos1) echo "selected"; ?> value="1">Έγγαμος/η(χωρίς παιδιά)</option>
						 <option <?php if($agamos) echo "selected"; ?> value="2">Άγαμος/η(με παιδιά)</option>
						<option <?php if($agamos1) echo "selected"; ?> value="3">Άγαμος/η(χωρίς παιδιά)</option>
					</select>
               </div>				   
			</div>	
			 <br></br>
			 <div class="form-group">
				<label class="col-md-4 control-label" >Ημέρες απασχόλησης </label>
			   <div  class="form-control" style="border-style: none;"  >
				  <div class="multiselect">
					<div class="selectBox" onclick="showCheckboxes()">
					  <select>
						<option>Επιλογή</option>
					  </select>
					  <div class="overSelect"></div>
					</div>
					<div id="checkboxes">
					  <label for="one"> <input type="checkbox" id="one" />Δευτέρα</label>
					  <label for="two"> <input type="checkbox" id="two" />Τρίτη</label>
					  <label for="three"><input type="checkbox" id="three" />Τετάρτη</label>
					  <label for="four"> <input type="checkbox" id="four" />Πέμπτη</label>
					  <label for="five"> <input type="checkbox" id="five" />Παρασκευή</label>
					  <label for="six"><input type="checkbox" id="six" />Σάββατο</label>
					</div>
				  </div>
               </div>	
			</div>
			   	<br></br>

		
<!-- Button -->

			<div class="form-group">
				<label class="col-md-4 control-label" for="submit"></label>
				<div class="col-md-4">
					<input type="submit" name="submit" value="Υπολογισμός" class="btn btn-primary" />
				</div>
			</div>	
		</fieldset>
		<!--
	</form>
	 <?php } ?>
	<span style="font-size: 90%" class="text-success"><?php if (isset($successmsg)) { echo $successmsg; echo $suntaksh; echo '<i class="glyphicon glyphicon-eur"></i>' ; } ?> </span>
-->

</div>
<br></br><br></br>

	<!-- start of present-in-all-webpages footer -->
	<footer class="footer">
      <div class="container">
        <p class="text-muted"><br> Ο δικτυακός τόπος του ΙΚΑ-ΕΤΑΜ υλοποιήθηκε στο πλαίσιο του Ε.Π. Κοινωνία της Πληροφορίας (ΚτΠ)
		<br></br>All rights reserved.  © 2018</p>
      </div>
    </footer>
    <!-- end of present-in-all-webpages footer -->

	<script src="./js/drpdown.js" type="text/javascript"></script>

  </body>
  
	
</html>