<?php
session_start();

if(isset($_SESSION['usr_name'])) {
	header("Location: index.php");
}

include_once './dbconnect.php';

//set validation error flag as false
$ergodotiserror = false;
$suntaksiouxoserror = false;
$asfalismenoserror = false;

$ergodotisuser = false;
$suntaksiouxosuser = false;
$asfalismenosuser = false;

//check if form is submitted
if (isset($_POST['signup_emp'])) { //emp stands for employer
 
	$ergodotisemail =        mysqli_real_escape_string($con, $_POST['ergodotisemail']);
	$result = mysqli_query($con, "SELECT * FROM employer WHERE email = '" . $ergodotisemail. "'");
	$ergodotisuser = true;
	if($row = mysqli_fetch_array($result)) {
		$ergodotiserrormsg = "Ο χρήστης υπάρχει ήδη!";
	} else {
	
		$ergodotisame =          mysqli_real_escape_string($con, $_POST['ergodotisame']);
		$ergodotisname =         mysqli_real_escape_string($con, $_POST['ergodotisname']);
		$ergodotissurname =      mysqli_real_escape_string($con, $_POST['ergodotissurname']);
		$ergodotisday =          mysqli_real_escape_string($con, $_POST['ergodotisday']);
		$ergodotismonth =        mysqli_real_escape_string($con, $_POST['ergodotismonth']);
		$ergodotisyear =         mysqli_real_escape_string($con, $_POST['ergodotisyear']);
		$ergodotisbranch_store = mysqli_real_escape_string($con, $_POST['ergodotisbranch_store']);
		$ergodotistown =         mysqli_real_escape_string($con, $_POST['ergodotistown']);
		$ergodotispassword =     mysqli_real_escape_string($con, $_POST['ergodotispassword']);
		$ergodotiscpassword =    mysqli_real_escape_string($con, $_POST['ergodotiscpassword']);


		if (strlen($ergodotisame) != 10) {
			$ergodotiserror = true;
			$ergodotisame_error = "Ένας ΑΜΕ αποτελείται απο 10 ψηφία";
		}
		if (!preg_match("/^[a-zA-Z]+$/",$ergodotisname)) {
			$ergodotiserror = true;
			$ergodotisname_error = "Το όνομα μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if (!preg_match("/^[a-zA-Z]+$/",$ergodotissurname)) {
			$ergodotiserror = true;
			$ergodotissurname_error = "Το επώνυμο μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if(!filter_var($ergodotisemail,FILTER_VALIDATE_EMAIL)) {
			$ergodotiserror = true;
			$ergodotisemail_error = "Η διεύθυνση που εισάγατε είναι λανθασμένη";
		}
		if (!preg_match("/^[0-9]+$/",$ergodotisday) || !preg_match("/^[0-9]+$/",$ergodotismonth) || !preg_match("/^[0-9]+$/",$ergodotisyear) ) {
			$ergodotiserror = true;
			$ergodotisbirthdate_error = "Συμπληρώστε την ημερομηνία";
		} else {
			$ergodotisbirthdate = $ergodotisyear . '/' . $ergodotismonth . '/' . $ergodotisday ;
		} 
		if (!preg_match("/^[a-zA-Z]+$/",$ergodotisbranch_store)) {
			$ergodotiserror = true;
			$ergodotisbranch_store_error = "Η εταιρεία μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if(strlen($ergodotispassword) < 6) {
			$ergodotiserror = true;
			$ergodotispassword_error = "Ο κωδικός πρέπει να αποτείται από τουλάχιστον 6 ψηφία";
		}
		if($ergodotispassword != $ergodotiscpassword) {
			$ergodotiserror = true;
			$ergodotiscpassword_error = "Οι κωδικοί δεν ταιριάζουν";
		}

		if (!$ergodotiserror) {
			if(mysqli_query($con, "INSERT INTO employer(AME,name,surname,birthdate,branch_store,address,email,password) VALUES('" . $ergodotisame . "', '" . $ergodotisname . "', '" . $ergodotissurname . "', '" . $ergodotisbirthdate . "', '" . $ergodotisbranch_store . "', '" . $ergodotistown . "', '" . $ergodotisemail . "', '" . md5($ergodotispassword) . "')")) {
				$ergodotissuccessmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
			} else {
				$ergodotiserrormsg = "Error in registering...Please try again later!";
			}
		}
	}
}



//check if form is submitted
if (isset($_POST['signup_sec'])) { //sec stands for secured
 
	$asfalismenosuser = true;
	$asfalismenosemail =  mysqli_real_escape_string($con, $_POST['asfalismenosemail']);
	$result = mysqli_query($con, "SELECT * FROM secured WHERE email = '" . $asfalismenosemail. "'");
 
	if($row = mysqli_fetch_array($result)) {
		$asfalismenoserrormsg = "Ο χρήστης υπάρχει ήδη!";
	} else {
		
		$amka =         mysqli_real_escape_string($con, $_POST['amka']);
		$asfalismenosname =         mysqli_real_escape_string($con, $_POST['asfalismenosname']);
		$asfalismenossurname =      mysqli_real_escape_string($con, $_POST['asfalismenossurname']);
		$asfalismenosday =          mysqli_real_escape_string($con, $_POST['asfalismenosday']);
		$asfalismenosmonth =        mysqli_real_escape_string($con, $_POST['asfalismenosmonth']);
		$asfalismenosyear =         mysqli_real_escape_string($con, $_POST['asfalismenosyear']);
		$asfalismenospassword =     mysqli_real_escape_string($con, $_POST['asfalismenospassword']);
		$asfalismenoscpassword =    mysqli_real_escape_string($con, $_POST['asfalismenoscpassword']);


			
		if (strlen($amka) != 11) {
			$asfalismenoserror = true;
			$amka_error = "Ένας ΑΜΚΑ αποτελείται απο 11 ψηφία";
		}
		if (!preg_match("/^[a-zA-Z]+$/",$asfalismenosname)) {
			$asfalismenoserror = true;
			$asfalismenosname_error = "Το όνομα μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if (!preg_match("/^[a-zA-Z]+$/",$asfalismenossurname)) {	
			$asfalismenoserror = true;
			$asfalismenossurname_error = "Το επώνυμο μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if(!filter_var($asfalismenosemail,FILTER_VALIDATE_EMAIL)) {
			$asfalismenoserror = true;
			$asfalismenosemail_error = "Η διεύθυνση που εισάγατε είναι λανθασμένη";
		}
		if (!preg_match("/^[0-9]+$/",$asfalismenosday) || !preg_match("/^[0-9]+$/",$asfalismenosmonth) || !preg_match("/^[0-9]+$/",$asfalismenosyear) ) {
			$asfalismenoserror = true;
			$asfalismenosbirthdate_error = "Συμπληρώστε την ημερομηνία";
		} else {
			$asfalismenosbirthdate  = $asfalismenosyear . '/' . $asfalismenosmonth . '/' . $asfalismenosday ;
		}
		if(strlen($asfalismenospassword) < 6) {
			$asfalismenoserror = true;
			$asfalismenospassword_error = "Ο κωδικός πρέπει να αποτείται από τουλάχιστον 6 ψηφία";
		}
		if($asfalismenospassword != $asfalismenoscpassword) {
			$asfalismenoserror = true;
			$asfalismenoscpassword_error = "Οι κωδικοί δεν ταιριάζουν";
		}
		
		if (!$asfalismenoserror) {
			if(mysqli_query($con, "INSERT INTO secured(AMKA,name,surname,birthdate,email,password) VALUES('" . $amka . "', '" . $asfalismenosname . "', '" . $asfalismenossurname . "', '" . $asfalismenosbirthdate . "', '" . $asfalismenosemail . "', '" . md5($asfalismenospassword) . "')")) {
				$asfalismenossuccessmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
			} else {
				$asfalismenoserrormsg = "Error in registering...Please try again later!";
			}
		}
	}
}



//check if form is submitted
if (isset($_POST['signup_ret'])) { //ret stands for retired

	$email =  mysqli_real_escape_string($con, $_POST['email']);
	$result = mysqli_query($con, "SELECT * FROM retired WHERE email = '" . $email. "'");
	 $suntaksiouxosuser = true;
	if($row = mysqli_fetch_array($result)) {
		$errormsg = "Ο χρήστης υπάρχει ήδη!";
	} else {
		$am_dias =      mysqli_real_escape_string($con, $_POST['am_dias']);
		$name =         mysqli_real_escape_string($con, $_POST['name']);
		$surname =      mysqli_real_escape_string($con, $_POST['surname']);
		$day =          mysqli_real_escape_string($con, $_POST['day']);
		$month =        mysqli_real_escape_string($con, $_POST['month']);
		$year =         mysqli_real_escape_string($con, $_POST['year']);
		$residence =    mysqli_real_escape_string($con, $_POST['residence']);
		$password =     mysqli_real_escape_string($con, $_POST['password']);
		$cpassword =    mysqli_real_escape_string($con, $_POST['cpassword']);


		
		if (strlen($am_dias) != 15) {
			$suntaksiouxoserror = true;
			$am_dias_error = "Ένας ΑΜ ΔΙΑΣ αποτελείται απο 15 ψηφία";
		}
		if (!preg_match("/^[a-zA-Z]+$/",$name)) {
			$suntaksiouxoserror = true;
			$name_error = "Το όνομα μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if (!preg_match("/^[a-zA-Z]+$/",$surname)) {
			$suntaksiouxoserror = true;
			$surname_error = "Το επώνυμο μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$suntaksiouxoserror = true;
			$email_error = "Η διεύθυνση που εισάγατε είναι λανθασμένη";
		}
		if (!preg_match("/^[0-9]+$/",$day) || !preg_match("/^[0-9]+$/",$month) || !preg_match("/^[0-9]+$/",$year) ) {
			$suntaksiouxoserror = true;
			$birthdate_error = "Συμπληρώστε την ημερομηνία";
		} else {
			$birthdate  = $year . '/' . $month . '/' . $day ;
		}
		if (!preg_match("/^[a-zA-Z]+$/",$residence)) {
			$suntaksiouxoserror = true;
			$residence_error = "Η χώρα κατοικίας μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if(strlen($password) < 6) {
			$suntaksiouxoserror = true;
			$password_error = "Ο κωδικός πρέπει να αποτείται από τουλάχιστον 6 ψηφία";
		}
		if($password != $cpassword) {
			$suntaksiouxoserror = true;
			$cpassword_error = "Οι κωδικοί δεν ταιριάζουν";
		}

		if (!$suntaksiouxoserror) {
			if(mysqli_query($con, "INSERT INTO retired(AM_DIAS,name,surname,birthdate,residence,email,password) VALUES('" . $am_dias . "', '" . $name . "', '" . $surname . "', '" . $birthdate . "', '" . $residence . "', '" . $email . "', '" . md5($password) . "')")) {
				$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
			} else {
				$errormsg = "Error in registering...Please try again later!";
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

    <title>IKA_ETAM Εγγραφή</title>
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
	
	<!-- Location Picker Javascript and JQuery  -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="./js/locationpicker.jquery.js"></script> 
	
	<!-- Birthday Picker Javascript -->
	<script src="./js/dobPicker.min.js"></script>
	
	<link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/layout.css" rel="stylesheet">	
	
	<script src="./js/sign_up_display.js"></script>
	
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
				<a href="./register.php" class="col-sm6 btn btn-lg btn-primary btn-block"> <b>Εγγραφή</b> </a>
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
	



<div  class="container">
 
	<legend>Επιλέξτε ομάδα χρηστών</legend>
 
	<select id='purpose'>
		<option  value="0" <?php if($ergodotisuser) echo "selected"; ?> >Εργοδότης</option>
		<option  value="1" <?php if($asfalismenosuser) echo "selected"; ?> >Ασφαλισμένος</option>
		<option  value="2" <?php if($suntaksiouxosuser) echo "selected"; ?> >Συνταξιούχος</option>
	</select> 

	<br></br>	<br></br>

   	<div  <?php if($suntaksiouxosuser || $asfalismenosuser) echo "style='display:none;'";   ?>  id='ergodotis' class="row" >	
		<div class="col-md-4 col-md-offset-4 well" style="width:50%; margin-left:20%">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform" >
				<fieldset>
					<legend>Εγγραφή</legend>
     
					<div class="form-group">
						<label for="name">ΑΜΕ</label>
						<input type="text" name="ergodotisame" placeholder="Αριθμός Μητρώου Εργοδότη(10 ψηφία)" required value="<?php if($ergodotiserror) echo $ergodotisame; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($ergodotisame_error)) echo $ergodotisame_error; ?></span>
					</div>
					
				    <div class="form-group">
						<label for="name">Όνομα</label>
						<input type="text" name="ergodotisname" placeholder="π.χ. Alexandros" required value="<?php if($ergodotiserror) echo $ergodotisname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($ergodotisname_error)) echo $ergodotisname_error; ?></span>
					</div>
					 <div class="form-group">
						<label for="surname">Επώνυμο</label>
						<input type="text" name="ergodotissurname" placeholder="π.χ. Xrhstou" required value="<?php if($ergodotiserror) echo $ergodotissurname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($ergodotissurname_error)) echo $ergodotissurname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="ergodotisemail" placeholder="π.χ. alex@di.gr" required value="<?php if($ergodotiserror) echo $ergodotisemail; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($ergodotisemail_error)) echo $ergodotisemail_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Ημ. Γέννησης</label>
						<div  class="form-control" >
					    		<select id="dobday_emp"  name="ergodotisday" ></select>
								<select id="dobmonth_emp" name="ergodotismonth"></select>
								<select id="dobyear_emp"   name="ergodotisyear"></select>
						</div>
				     	<span class="text-danger"><?php if (isset($ergodotisbirthdate_error)) echo $ergodotisbirthdate_error; ?></span>
						<span class="text-danger"><?php if (isset($ergodotisbirthdate)) echo $ergodotisbirthdate; ?></span>
					</div>
 
					<div class="form-group">
						<label for="name">Επωνυμία Εταιρείας</label>
						<input type="text" name="ergodotisbranch_store" placeholder="π.χ. KAction" required value="<?php if($ergodotiserror) echo $ergodotisbranch_store; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($ergodotisbranch_store_error)) echo $ergodotisbranch_store_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Διεύθυνση</label>		
						
						 <input value="<?php if($ergodotiserror) echo $ergodotistown; ?>" name="ergodotistown"  type="text" class="form-control" id="us3-address" />
						 <div id="us3" class="form-control" style="width: 100; height: 250px;"></div>	

					</div>

					<div class="form-group">
						<label for="name">Κωδικός</label>
						<input type="password" name="ergodotispassword" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($ergodotispassword_error)) echo $ergodotispassword_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Επιβεβαίωση κωδικού</label>
						<input type="password" name="ergodotiscpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($ergodotiscpassword_error)) echo $ergodotiscpassword_error; ?></span>
					</div>
					<div class="form-group">
						<input id="ergodotisBtn"   type="submit" name="signup_emp" value="Εγγραφή" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($ergodotissuccessmsg)) { echo $ergodotissuccessmsg; } ?></span>
			<span class="text-danger"><?php if (isset($ergodotiserrormsg)) { echo $ergodotiserrormsg; } ?></span>
		</div>
	</div>

	<div  <?php if($asfalismenosuser) echo "style='display:inline;'"; else echo "style='display:none;'" ?>  id='asfalismenos' class="row">
	<!-- <div id='asfalismenos' class="row"> -->
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Εγγραφή</legend>
					
					<div class="form-group">
						<label for="name">ΑΜΚΑ</label>
						<input type="text" name="amka" placeholder="Αριθμός Μητρώου Κοινωνικής Ασφάλισης(11 ψηφία)" required value="<?php if($asfalismenoserror) echo $amka; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($amka_error)) echo $amka_error; ?></span>
					</div>
					
				    <div class="form-group">
						<label for="name">Όνομα</label>
						<input type="text" name="asfalismenosname" placeholder="π.χ. Alexandros" required value="<?php if($asfalismenoserror) echo $asfalismenosname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($asfalismenosname_error)) echo $asfalismenosname_error; ?></span>
					</div>
					 <div class="form-group">
						<label for="surname">Επώνυμο</label>
						<input type="text" name="asfalismenossurname" placeholder="π.χ. Xrhstou" required value="<?php if($asfalismenoserror) echo $asfalismenossurname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($asfalismenossurname_error)) echo $asfalismenossurname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="asfalismenosemail" placeholder="π.χ. alex@di.gr" required value="<?php if($asfalismenoserror) echo $asfalismenosemail; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($asfalismenosemail_error)) echo $asfalismenosemail_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Ημ. Γέννησης</label>
						<div  class="form-control" >
					    		<select id="dobday_sec"  name="asfalismenosday" ></select>
								<select id="dobmonth_sec"   name="asfalismenosmonth"></select>
								<select id="dobyear_sec"   name="asfalismenosyear"></select>
						</div>
				     	<span class="text-danger"><?php if (isset($asfalismenosbirthdate_error)) echo $asfalismenosbirthdate_error; ?></span>
						<span class="text-danger"><?php if (isset($asfalismenosbirthdate)) echo $asfalismenosbirthdate; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Κωδικός</label>
						<input type="password" name="asfalismenospassword" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($asfalismenospassword_error)) echo $asfalismenospassword_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Επιβεβαίωση κωδικού</label>
						<input type="password" name="asfalismenoscpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($asfalismenoscpassword_error)) echo $asfalismenoscpassword_error; ?></span>
					</div>
					<div class="form-group">
						<input id="asfalismenosBtn"  type="submit" name="signup_sec" value="Εγγραφή" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($asfalismenossuccessmsg)) { echo $asfalismenossuccessmsg; } ?></span>
			<span class="text-danger"><?php if (isset($asfalismenoserrormsg)) { echo $asfalismenoserrormsg; } ?></span>
		</div>
	</div>
	
	<div  <?php if($suntaksiouxosuser) echo "style='display:inline;'"; else echo "style='display:none;'" ?>  id='suntaksiouxos' class="row">
	<!-- <div id='suntaksiouxos' class="row"> -->
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form"  action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" name="signupform">
				<fieldset>
					<legend>Εγγραφή</legend>
					
					<div class="form-group">
						<label for="name">ΑΜ ΔΙΑΣ</label>
						<input type="text" name="am_dias" placeholder="Αριθμό Μητρώου ΔΙΑΣ(15 ψηφία)" required value="<?php if($suntaksiouxoserror) echo $am_dias; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($am_dias_error)) echo $am_dias_error; ?></span>
					</div>
					
				    <div class="form-group">
						<label for="name">Όνομα</label>
						<input type="text" name="name" placeholder="π.χ. Alexandros" required value="<?php if($suntaksiouxoserror) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					 <div class="form-group">
						<label for="surname">Επώνυμο</label>
						<input type="text" name="surname" placeholder="π.χ. Xrhstou" required value="<?php if($suntaksiouxoserror) echo $surname; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($surname_error)) echo $surname_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="π.χ. alex@di.gr" required value="<?php if($suntaksiouxoserror) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Ημ. Γέννησης</label>
						<div  class="form-control" >
					    		<select id="dobday_ret" name="day" ></select>
								<select id="dobmonth_ret"   name="month"></select>
								<select id="dobyear_ret"  name="year"></select>
						</div>
				     	<span class="text-danger"><?php if (isset($birthdate_error)) echo $birthdate_error; ?></span>
						<span class="text-danger"><?php if (isset($birthdate)) echo $birthdate; ?></span>
					</div>
 
					<div class="form-group">
						<label for="name">Χώρα Κατοικίας</label>
						<input type="text" name="residence" placeholder="π.χ. Greece" required value="<?php if($suntaksiouxoserror) echo $residence; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($residence_error)) echo $residence_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Κωδικός</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Επιβεβαίωση κωδικού</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>
					<div class="form-group">
						<input id="suntaksiouxosBtn" type="submit" name="signup_ret" value="Εγγραφή" class="btn btn-primary" />
					</div>
					
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>

	<div style='display:none;' id="row" class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Είστε ήδη χρήστης; <a href="login.php">Είσοδος</a>
		</div>
	</div>
	
</div>
	


	<!-- start of present-in-all-webpages footer -->
	<footer class="footer">
      <div class="container">
        <p class="text-muted"><br> Ο δικτυακός τόπος του ΙΚΑ-ΕΤΑΜ υλοποιήθηκε στο πλαίσιο του Ε.Π. Κοινωνία της Πληροφορίας (ΚτΠ)
		<br></br>All rights reserved.  © 2018</p>
      </div>
    </footer>
    <!-- end of present-in-all-webpages footer -->
    
	    <!-- Location Picker Javascript -->
	<script src="./js/locationpicker.js"></script>
	    <!-- Birthday Picker Javascript -->
	<!-- <script src="./js/birthdayPicker.js"></script>-->
	<script src="./js/birthdayPicker_emp.js"></script>
	<script src="./js/birthdayPicker_sec.js"></script>
	<script src="./js/birthdayPicker_ret.js"></script> 
  
</html>