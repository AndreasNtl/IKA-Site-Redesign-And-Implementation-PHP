<?php
session_start();
include_once './dbconnect.php';

if(!isset($_SESSION['usr_name'])) {
	header("Location: index.php");
}


//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['submit'])) {
	if (isset($_POST['submit'])) {
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$surname = mysqli_real_escape_string($con, $_POST['surname']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
		
		
		
		//name can contain only alpha characters and space
		if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$name_error = "Το όνομα μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
			$error = true;
			$surname_error = "Το όνομα μπορεί να περιλαμβάνει μόνο λατινικούς χαρακτήρες";
		}
		if(strlen($password) < 6) {
			$error = true;
			$password_error = "Ο κωδικός πρέπει να αποτείται από τουλάχιστον 6 ψηφία";
		}
		if($password != $cpassword) {
			$error = true;
			$cpassword_error = "Οι κωδικοί δεν ταιριάζουν";
		}
		
		$_SESSION['usr_name'] = $name;
		$email = $_SESSION['usr_email'];
		$password = md5($password);
		if (!$error && $_SESSION['usr_role'] == "employer") {
			if(mysqli_query($con, "UPDATE employer SET name = '$name', surname = '$surname', password = '$password' WHERE email = '$email';")) {
				$successmsg = "Successfully Updated your info! <a href='profile.php'>View your profile.</a>";
				header("Location: profile.php");
			} else {
				$errormsg = "Error in updating your info...Please try again!";
			}
		}
		if (!$error && $_SESSION['usr_role'] == "retired") {
			if(mysqli_query($con, "UPDATE retired SET name = '$name', surname = '$surname', password = '$password' WHERE email = '$email';")) {
				$successmsg = "Successfully Updated your info! <a href='profile.php'>View your profile.</a>";
				header("Location: profile.php");
			} else {
				$errormsg = "Error in updating your info...Please try again!";
			}
		}
		if (!$error && $_SESSION['usr_role'] == "secured") {
			if(mysqli_query($con, "UPDATE secured SET name = '$name', surname = '$surname', password = '$password' WHERE email = '$email';")) {
				$successmsg = "Successfully Updated your info! <a href='profile.php'>View your profile.</a>";
				header("Location: profile.php");
			} else {
				$errormsg = "Error in updating your info...Please try again!";
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

    <title>IKA-ETAM Επεξεργασία Προφίλ</title>
	
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/layout.css" rel="stylesheet">
    <link href="./css/edit-profile.css" rel="stylesheet">
	
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
<form class="well form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="contact_form">
    <fieldset>
	<h1>Επεξεργασία προφίλ</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="./images/Placeholder_person.png" width="80%" class="img-circle img-responsive">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Πραγματοποιείστε τις επιθυμητές τροποποιήσεις και μετά σώστε τις αλλαγές.
        </div>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Όνομα:</label>
            <div class="col-lg-8">
				<input class="form-control" type="text"  name="name" value="<?php echo $_SESSION['usr_name']; ?>" required/>
				<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
			</div>
          </div>
		   <div class="form-group">
            <label class="col-lg-3 control-label">Επώνυμο:</label>
            <div class="col-lg-8">
				<input class="form-control" type="text"  name="surname" value="<?php echo $_SESSION['usr_surname']; ?>" required/>
				<span class="text-danger"><?php if (isset($surname_error)) echo $surname_error; ?></span>
			</div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo $_SESSION['usr_email']; ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Νέος Κωδικός:</label>
            <div class="col-md-8">
              <input class="form-control" name = "password" type="password" required value="11111122333">
			  <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Επιβεβαίωση κωδικού:</label>
            <div class="col-md-8">
              <input class="form-control" name = "cpassword" type="password" required value="11111122333">
			  <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>

</fieldset>
</form> 
<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
</div>
 

 <br></br>
 <br></br>
	
    

	<!-- start of present-in-all-webpages footer -->
	<footer class="footer">
      <div class="container">
        <p class="text-muted"><br> Ο δικτυακός τόπος του ΙΚΑ-ΕΤΑΜ υλοποιήθηκε στο πλαίσιο του Ε.Π. Κοινωνία της Πληροφορίας (ΚτΠ)
		<br></br>All rights reserved.  © 2018</p>
      </div>
    </footer>
    <!-- end of present-in-all-webpages footer -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./assets/ie10-viewport-bug-workaround.js"></script>
  </body>
  
	
</html>