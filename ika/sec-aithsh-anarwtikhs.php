<?php
session_start();

include_once './dbconnect.php';

// set validation error flag as false
$error = false;

// check if form is submitted
if (isset($_POST['submit'])) {

	$astheneia =       mysqli_real_escape_string($con, $_POST['astheneia']);
	$dateFrom =        mysqli_real_escape_string($con, $_POST['dateFrom']);
	$dateTo =          mysqli_real_escape_string($con, $_POST['dateTo']);

    $dateFrom=date("Y-m-d",strtotime($dateFrom));
	$dateTo=date("Y-m-d",strtotime($dateTo));
 
	if (!$error) {
		if (isset($_SESSION['usr_id']) && ($_SESSION['usr_role'] == "secured" )){
		    $id = $_SESSION['usr_id'];
			$name = $_SESSION['usr_name'];
			$email = $_SESSION['usr_email'];
			$amka = $_SESSION['usr_amka'];
		    if(mysqli_query($con, "INSERT INTO secured_applications(name, AMKA, email, astheneia, dateFrom, dateTo, standBy, approval, secured_id ) VALUES('" . $name . "', '" . $amka . "', '" . $email . "', '" . $astheneia . "', '" . $dateFrom . "', '" . $dateTo . "', 'false', 'false', '" . $id . "')")) {
				$successmsg = "<strong>Successfully submitted into your profile in our database!</strong>";
			} else {
			$errormsg = "Error ... Please try again.";
		    }
		} else {
			$name =       mysqli_real_escape_string($con, $_POST['name']);
			$email =        mysqli_real_escape_string($con, $_POST['email']);
			$amka =          mysqli_real_escape_string($con, $_POST['amka']);
			$id = 1;

			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//query the database to see if there already exists an entry in table "secured" with id=1
			$result = mysqli_query($con, "SELECT * FROM secured WHERE id=1");

			if(   !   ($row = mysqli_fetch_array($result))   ) {
				//if no such entry exists,create one
				if(   !   ( mysqli_query($con, "INSERT INTO secured(id,AMKA,name,surname,birthdate,email,password) VALUES('1','00000000000','no','profile','00-00-0000','noprofile@gmail.com','" . md5("000000") . "')") )   ){
					$error=1;
				}
			}
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			if (!preg_match("/^[a-zA-Z]/",$name)) {
				$error = true;
				$name_error = "Το όνομα μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
			}
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$error = true;
				$email_error = "Η διεύθυνση που εισάγατε είναι λανθασμένη";
			}
			if (strlen($amka) != 11) {
				$error = true;
				$amka_error = "Ένας ΑΜΚΑ αποτελείται απο 11 ψηφία";
			}
			
		    if(!$error && mysqli_query($con, "INSERT INTO secured_applications(name, AMKA, email, astheneia, dateFrom, dateTo, standBy, approval, secured_id ) VALUES('" . $name . "', '" . $amka . "', '" . $email . "', '" . $astheneia . "', '" . $dateFrom . "', '" . $dateTo . "', 'false', 'false', '" . $id . "')")) {
				$successmsg = "<strong>Successfully submitted into our database!</strong>";
			} else {
			$errormsg = "Error... Please try again.";
	    	}
		}
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

    <title>IKA-ETAM Αίτηση για αναρρωτική άδεια</title>
	
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./assets/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="./css/layout.css" rel="stylesheet">
    <link href="./css/aitiseis.css" rel="stylesheet">
	<script href="./js/online-submission"></script>
	<link href="./css/pikaday.css" rel="stylesheet" type="text/css" />
    <script src="./assets/ie-emulation-modes-warning.js"></script>
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
						<a class="dropbtn">Εργοδότες<span class="caret"></span> </a>
						<ul class="dropdown-content">
							<li><a href="./emp-vevaiwsh-apasxolishs-proswpikou.php">Βεβαίωση απασχόλησης προσωπικού(φορολογική χρήση)</a></li>
							<li><a href="./emp-ypologismos-misthou-enshmwn.php">Υπολογισμός μισθού και ενσήμων</a></li>
							<li><a href="./emp-ypovolh-enshmwn.php">Υποβολή ενσήμων εργαζομένου</a></li>
							<li><a href="./emp-ypovolh-apd.php">Ηλεκτρονική υποβολή ΑΠΔ</a></li>
							<li><a href="./emp-plirofories.php">Πληροφορίες για δικαιώματα και υποχρεώσεις</a></li>
						</ul>
					</li>
					<!-- dropdown menu for secured -->
					<li class="dropdown">
						<a class="dropbtn"> <b>Ασφαλισμένοι</b> <span class="caret"></span></a>
						<ul class="dropdown-content">
							<li><a href="./sec-vevaiwsh-asfalistikhs-ikanothtas.php">Βεβαίωση ασφαλιστικής ικανότητας(φορολογική χρήση)</a></li>
							<li><a href="./sec-aithsh-anarwtikhs.php"> <b>Αίτηση για αναρρωτική άδεια</b> </a></li>
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
	<form class="well form-horizontal" action=" " method="post" enctype="multipart/form-data" id="contact_form">
		<fieldset>
<!-- Form Name -->
			<?php if (!isset($_SESSION['secured']) ) { ?>   
			<legend>Βήμα 1 : Προσδιορίστε τα προσωπικά σας δεδομένα</legend>
<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" >'Ονομα</label>  
				<div class="col-md-4">
					<?php if (isset($_SESSION['secured'])) { ?>
					<input id="name" name="name" type="text" value="<?php echo $name; ?>" class="form-control input-md" disabled>	
					<?php } else { ?>
					<input id="name" name="name" type="text" value="<?php if (isset($name)) echo $name; ?>" placeholder="Συμπληρώστε το όνομά σας" class="form-control input-md" required="">
					 <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					<?php } ?>
				</div>
			</div>
<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label"  >Email</label>  
				<div class="col-md-4">
					<?php if (isset($_SESSION['secured'])) { ?>
					<input id="email" name="email" type="text" value="<?php echo $email; ?>" class="form-control input-md" disabled>	
					<?php } else { ?>
					<input id="email" name="email" type="text" value="<?php  if (isset($email)) echo $email; ?>" placeholder="Συμπληρώστε το email σας" class="form-control input-md" required="">
					<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					<?php } ?>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label"  >AMKA</label>   
				<div class="col-md-4">
					<?php if (isset($_SESSION['secured'])) { ?>
					<input id="amka" name="amka" type="text" value="<?php  echo $amka; ?>" class="form-control input-md" disabled>	
					<?php } else { ?>
					<input id="amka" name="amka" type="text" value="<?php if (isset($amka)) echo $amka; ?>" placeholder="Συμπληρώστε το amka σας(11 ψηφία)" class="form-control input-md" required="">
					<span class="text-danger"><?php if (isset($amka_error)) echo $amka_error; ?></span>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
			<br></br>			<br></br>
			
			<legend>Βήμα 2 : Προσδιορίστε τον τύπο ασθένειας<br></legend>

			<div class="form-group">
				<label class="col-md-4 control-label" >Τύπος ασθένειας </label>
			   <div  class="form-control" style="border-style: none;"  >
					<select  name="astheneia" style="margin-left:5%" >
						<option value="vraxeias diarkeias">βραχείας διαρκείας</option>
						<option value="makras diarkeias">μακράς διαρκείας</option>
					</select>
               </div>				
			</div>	
			

			
			<br></br>			<br></br>
			<legend>Βήμα 3 : Προσδιορίστε το διάστημα για το οποίο θέλετε να πάρετε άδεια<br></legend>
			
			<div class="form-group">
				<label class="col-md-4 control-label"  >Από </label>
				<div class="col-md-4">
				    <input  type="text"  name="dateFrom" id="start"  class="form-control input-md" required=""/>
				</div>
			</div>
			
						
			<div class="form-group">
				<label class="col-md-4 control-label" for="InputFile">Μέχρι </label>
				<div class="col-md-4">
				 <input   type="text"  name="dateTo" id="end" class="form-control input-md" required=""/>
				</div>
			</div>

<!-- Button -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="submit"></label>
				<div class="col-md-4">
					<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				</div>
			</div>	
		</fieldset>
	</form>
	<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
	<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
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
 
	<script src="./js/pikaday.js" type="text/javascript"></script>
    <script src="./js/date.js" type = "text/javascript"></script>
    <script src="./assets/ie10-viewport-bug-workaround.js"></script>
  </body>
  
	
</html>