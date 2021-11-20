<?php
session_start();

include_once './dbconnect.php';

$error = false;
$display = false;
$emailerror = false;
$amkaerror = false;

if (isset($_POST['save'])){
	
   $email =          mysqli_real_escape_string($con, $_POST['email']);
   $amka =          mysqli_real_escape_string($con, $_POST['amka']);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$display =  true;
		$emailerror = false;
		$email_error ="Η διεύθυνση που εισάγατε είναι λανθασμένη";
	}else {
		$emailerror = true;
	}
	if (strlen($amka) != 11) {
		$display = true;
		$amkaerror = false;
		$amka_error = "Ένας ΑΜΚΑ αποτελείται απο 11 ψηφία";
	}else {
		$amkaerror = true;
	}
	$error = true;
	
	if($display){
		$display = false;
	} else {
		 $display = true;
		 $result = mysqli_query($con, "SELECT * FROM secured WHERE email = '" . $email . "' and amka = '" . $amka . "'");

		 if($row = mysqli_fetch_array($result)) {
			 $name = $row['name'];
			 $surname = $row['surname'];
			 $birthdate = $row['birthdate'];
			 $amka = $row['AMKA'];
		 } else {
			$display = false;
			$errormsg = "Ο υπάλληλος δεν βρέθηκε στη βάση";
		 }
	}
}

if (isset($_POST['back'])){
	
		$display = false;
	    $error = false;
		$nameerror = false;
		$surnameerror = false;
		$amkaerror = false;
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

    <title>IKA-ETAM Βεβαίωση ασφαλιστικής ικανότητας(φορολογική χρήση)</title>
	
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./assets/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="./css/layout.css" rel="stylesheet">
    <link href="./css/programme.css" rel="stylesheet">
	<script src="./assets/ie-emulation-modes-warning.js"></script>
    <link href="./css/bebaiwsh.css" rel="stylesheet">
	
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
							<li><a href="./sec-vevaiwsh-asfalistikhs-ikanothtas.php"> <b>Βεβαίωση ασφαλιστικής ικανότητας(φορολογική χρήση)</b> </a></li>
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
	<form role="form"  action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" name="print">
		<div  id="printableArea" class="container" style="background-color:white;">
			<h2><strong>ΒΕΒΑΙΩΣΗ</strong></h2>
		  <div class="table-responsive-vertical">
				  <table id="table" class="table table-hover">
					  <?php if (!$display) { ?>
					  <thead>
						<tr>
						   <th>Email ασφαλισμένου</th>
						  <th>ΑΜΚΑ</th>
						</tr>
					  </thead>
					  <tbody>
							<tr>
							  <td data-title="Email ασφαλισμένου"><input required=""  name="email" value="<?php if($error) echo $email; ?>"   </input> </td>
							   <td data-title="ΑΜΚΑ"><input required=""  name="amka" value="<?php if($error) echo $amka; ?>"  </input>  </td>
							</tr>
					  </tbody>
					  <?php } else { ?>
					      <thead>
							<tr>
						      <th>Όνομα</th>
							  <th>Επώνυμο</th>
							  <th>Ημ . Γέννησης</th>
							  <th>Email ασφαλισμένου</th>
							  <th>ΑΜΚΑ</th>
							</tr>
						  </thead>	
                         <tbody>						  
 							<tr>
							   <td data-title="Όνομα"> <?php  echo $name; ?> </td>
							   <td data-title="Επώνυμο"> <?php  echo $surname; ?> </td>
							   <td data-title="Ημ. Γέννησης"> <?php echo $birthdate; ?>  </td>
						  	   <td data-title="Email ασφαλισμένου"> <?php  echo $email; ?> </td>
							   <td data-title="ΑΜΚΑ"> <?php echo $amka; ?>  </td>
							</tr>
			            </tbody>
					  <?php } ?>
				 </table>
				 
				  <div class="bebaiwsh bebaiwsh-keimeno">

						<br>
						<p><strong>Βεβαιώνουμε ότι:&nbsp;&nbsp;&nbsp;&nbsp;</strong>Ο/Η αιτούμενος/η με τα άνωθεν ατομικά στοιχεία είναι ασφαλισμένος στον φορέα ΙΚΑ-ΕΤΑΜ.
						<br>
						<br></br>
						<p><strong>Υπογραφή:&nbsp;&nbsp;&nbsp;&nbsp;</strong>ο αρμόδιος υπάλληλος<p>
						<br></br>
						<p><strong>Σφραγίδα:&nbsp;&nbsp;&nbsp;&nbsp;</strong> <p>
						<br></br>
						<p><strong>Υπογραφή:&nbsp;&nbsp;&nbsp;&nbsp;</strong>ο/η αιτούμενος/η<p>
						
						 <br>
						<br></br>

						 <div id="print" style="margin-left:80%" class="form-group">
					    	 <?php if (!$display) { ?>
							    <input   type="submit" name="save" value="Αποθήκευση" class="btn btn-primary" />
							 <?php } else { ?>
						       <input   type="submit" name="back"  value="Πίσω" class="btn btn-primary" />
							   <a onclick="printDiv('printableArea')" value="Εκτύπωση"  class="btn btn-success btn-lg">
							        <span class="glyphicon glyphicon-print"></span> Εκτύπωση 
						  	   </a>
							 <?php } ?>
						</div>
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span> <br>
						 <span class="text-danger"><?php if (isset($errormsg)) echo $errormsg; ?></span> <br>
						<span class="text-danger"><?php if (isset($amka_error)) echo $amka_error; ?></span> <br>
				 </div>

			</div>

	  </div >
	 </form>

<br></br><br></br>

	<!-- start of present-in-all-webpages footer -->
	<footer class="footer">
      <div class="container">
        <p class="text-muted"><br> Ο δικτυακός τόπος του ΙΚΑ-ΕΤΑΜ υλοποιήθηκε στο πλαίσιο του Ε.Π. Κοινωνία της Πληροφορίας (ΚτΠ)
		<br></br>All rights reserved.  © 2018</p>
      </div>
    </footer>
    <!-- end of present-in-all-webpages footer -->
    
	<script src="./js/print.js"></script>
  </body>
  
	
</html>