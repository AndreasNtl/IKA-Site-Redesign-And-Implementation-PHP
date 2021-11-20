<?php
session_start();
include_once './dbconnect.php';

if(!isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}

$email = $_SESSION['usr_email'];

$result = mysqli_query($con, "SELECT * FROM secured WHERE email = '" . $email. "'");
$result1 = mysqli_query($con, "SELECT * FROM retired WHERE email = '" . $email. "'");
$result2 = mysqli_query($con, "SELECT * FROM employer WHERE email = '" . $email. "'");
$result3 = mysqli_query($con, "SELECT * FROM administrator WHERE email = '" . $email. "'");

if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_name'] = $row['name'];
		$surname = $row['surname'];
		$_SESSION['usr_surname'] = $surname ;
		$_SESSION['usr_email'] = $row['email'];
		$birthdate = $row['birthdate'];
	    $role = "Ασφαλισμένος";
} else if ($row = mysqli_fetch_array($result1)) {
		$_SESSION['usr_name'] = $row['name'];
		$surname = $row['surname'];
	    $_SESSION['usr_surname'] = $surname ;
		$_SESSION['usr_email'] = $row['email'];
		$birthdate = $row['birthdate'];
		$am_dias = $row['AM_DIAS'];
		$residence = $row['residence'];
	    $role = "Συνταξιούχος";
} else if ($row = mysqli_fetch_array($result2)) {
		$_SESSION['usr_name'] = $row['name'];
		$_SESSION['usr_email'] = $row['email'];
		$surname = $row['surname'];
		$_SESSION['usr_surname'] = $surname ;
		$birthdate = $row['birthdate'];
		$ame = $row['AME'];
		$branch_store = $row['branch_store'];
		$address = $row['address'];
		$role = "Εργοδότης";
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

    <title>IKA-ETAM Προφίλ Χρήστη</title>
	
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/layout.css" rel="stylesheet">
    <link href="./css/profile.css" rel="stylesheet">
	
	<!-- Custom js -->
	<script src="./js/profile.js"></script>
	
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
		
      
          <div class="panel panel-info">
            <div class="panel-heading">
				<h3 class="panel-title">&nbsp&nbsp&nbsp&nbsp<?php echo $_SESSION['usr_name']; ?>
				
				<span class="pull-right">
                            <a href="./edit-profile.php" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i>&nbsp&nbspΕπεξεργασία</a>
				</span>
				</h3>
			<br>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
					<img alt="User Pic" src="./images/Placeholder_person.png" width="80%" class="img-circle img-responsive"> 
				</div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
					  <tr>
                        <td>Ιδιότητα χρήστη</td>
                        <td><?php echo $role ?></td>
                      </tr>
				      <tr>
                        <td>Όνομα</td>
                        <td><?php echo $_SESSION['usr_name']; ?></td>
                      </tr>
				      <tr>
                        <td>Επώνυμο</td>
                        <td><?php echo $surname ?></td>
                      </tr>
                      <tr>
                        <td>Ημ. Γέννησης</td>
                        <td><?php echo $birthdate ?></td>
                      </tr>  
				     <?php if (isset($address) && isset($ame) ) { ?>   
                      <tr>
                       <tr>
                        <td>Διεύθυνση</td>
                        <td><?php echo $address ?></td>
                      </tr>

                      <tr>
                        <td>AME</td>
                        <td><?php echo $ame ?></td>
                      </tr>                           
                      </tr>	
					  <?php } ?>
					  
					  <?php if (isset($am_dias) && isset($residence) ) { ?>   
                      <tr>
                       <tr>
                        <td>ΑΜ ΔΙΑΣ</td>
                        <td><?php echo $am_dias ?></td>
                      </tr>

                      <tr>
                        <td>Χώρα</td>
                        <td><?php echo $residence ?></td>
                      </tr>                           
                      </tr>	
					  <?php } ?>
					  
                      <tr>
					  <?php if (isset($branch_store) ) { ?>   
                       <tr>
                        <td>Επωνυμία εταιρείας</td>
                        <td><?php echo $branch_store ?></td>
                      </tr>
					  <?php } ?>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $_SESSION['usr_email']; ?>"><?php echo $_SESSION['usr_email']; ?></a></td>
                      </tr>                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
		</div>
		
    </div>
    <br></br>

	<!-- start of present-in-all-webpages footer -->
	<footer class="footer">
      <div class="container">
        <p class="text-muted"><br> Ο δικτυακός τόπος του ΙΚΑ-ΕΤΑΜ υλοποιήθηκε στο πλαίσιο του Ε.Π. Κοινωνία της Πληροφορίας (ΚτΠ)
		<br></br>All rights reserved.  © 2018</p>
      </div>
    </footer>
    <!-- end of present-in-all-webpages footer -->
	

    <script src="./assets/ie10-viewport-bug-workaround.js"></script>
  </body>
  
	
</html>