<?php
session_start();

include_once './dbconnect.php';

// set validation error flag as false
$error = false;
$suntakshBool = false;

$tupos0 = false;
$tupos1 = false;
$tupos2 = false;
// check if form is submitted
if (isset($_POST['submit'])) {

	$tupos =        mysqli_real_escape_string($con, $_POST['tupos']);
    $days  =        mysqli_real_escape_string($con, $_POST['days']);
	$year2008 =       mysqli_real_escape_string($con, $_POST['year2008']);
	$year2009 =       mysqli_real_escape_string($con, $_POST['year2009']);
	$year2010 =        mysqli_real_escape_string($con, $_POST['year2010']);
	$year2011 =       mysqli_real_escape_string($con, $_POST['year2011']);
	$year2012 =       mysqli_real_escape_string($con, $_POST['year2012']);
	$year2013 =        mysqli_real_escape_string($con, $_POST['year2013']);
	$year2014 =       mysqli_real_escape_string($con, $_POST['year2014']);
	$year2015 =       mysqli_real_escape_string($con, $_POST['year2015']);
	$year2016 =        mysqli_real_escape_string($con, $_POST['year2016']);
	$year2017 =       mysqli_real_escape_string($con, $_POST['year2017']);

      if (!preg_match("/^[0-9]/",$days) || (strlen($days) > 6)) {
		$error = true;
		$dayserror = "Εισάγετε μόνο ψηφία";
	}
     if (!preg_match("/^[0-9]/",$year2008)) {
		$error = true;
		$year2008error = "Εισάγετε μόνο ψηφία";
	}
     if (!preg_match("/^[0-9]/",$year2009)) {
		$error = true;
		$year2009error = "Εισάγετε μόνο ψηφία";
	} 
	if (!preg_match("/^[0-9]/",$year2010)) {
		$error = true;
		$year2010error = "Εισάγετε μόνο ψηφία";
	}   
	if (!preg_match("/^[0-9]/",$year2011)) {
		$error = true;
		$year2011error = "Εισάγετε μόνο ψηφία";
	}    
	if (!preg_match("/^[0-9]/",$year2012)) {
		$error = true;
		$year2012error = "Εισάγετε μόνο ψηφία";
	}    
	if (!preg_match("/^[0-9]/",$year2013)) {
		$error = true;
		$year2013error = "Εισάγετε μόνο ψηφία";
	}     
	if (!preg_match("/^[0-9]/",$year2014)) {
		$error = true;
		$year2014error = "Εισάγετε μόνο ψηφία";
	}    
	if (!preg_match("/^[0-9]/",$year2015)) {
		$error = true;
		$year2015error = "Εισάγετε μόνο ψηφία";
	}
 	if (!preg_match("/^[0-9]/",$year2016)) {
		$error = true;
		$year2016error = "Εισάγετε μόνο ψηφία";
	}    
	if (!preg_match("/^[0-9]/",$year2017)) {
		$error = true;
		$year2017error = "Εισάγετε μόνο ψηφία";
	}
	
	if($tupos == 0){
		$tupos0 = true;
	} else if ($tupos == 1){
		$tupos1 = true;
	} else if ($tupos == 2){
		$tupos2 = true;
	}

	if (!$error) {

		if($tupos == "0"){
			$suntaksh = $year2009 +  $year2009 +  $year2010 +  $year2011 +  $year2013 +  $year2014 +  $year2015 +  $year2016 +  $year2017 ;
			$suntaksh = $suntaksh / 6 ;
			$suntaksh += $days * 0.0006 ;
		}
		if($tupos == "1"){
			$suntaksh = $year2009 +  $year2009 +  $year2010 +  $year2011 +  $year2013 +  $year2014 +  $year2015 +  $year2016 +  $year2017 ;
			$suntaksh = $suntaksh / 10 ;
			$suntaksh += $days * 0.0005 ;
		}
		if($tupos == "2"){
			$suntaksh = $year2009 +  $year2009 +  $year2010 +  $year2011 +  $year2013 +  $year2014 +  $year2015 +  $year2016 +  $year2017 ;
			$suntaksh = $suntaksh / 8;
			$suntaksh += $days * 0.0008 ;
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

    <title>IKA-ETAM Υπολογισμός βασικού ποσού σύνταξης</title>
	
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
							<li><a href="./sec-aithsh-anarwtikhs.php">Αίτηση για αναρρωτική άδεια</a></li>
							<li><a href="./sec-ekdosh-adeias-mhtrothtas.php">Έκδοση άδειας μητρότητας</a></li>
							<li><a href="./sec-ekdosh-bibliariou.php">Έκδοση βιβλιάριου υγείας</a></li>
							<li><a href="./sec-epidoma-astheneias.php">Επίδομα ασθένειας/ατυχήματος</a></li>
							<li><a href="./sec-ypologismos-vasikou-posou.php"> <b>Υπολογισμός βασικού ποσού σύνταξης</b> </a></li>
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

<div  class="container">
 <?php if(!$suntakshBool) { ?> 
	<form   class="well form-horizontal" action=" " method="post" enctype="multipart/form-data" id="contact_form">
		<fieldset>
<!-- Form Name --> 
			<legend>Υπολογισμός βασικού ποσού σύνταξης</legend>

			<br></br>		
			<div class="form-group">
				<label class="col-md-4 control-label" >Τύπος σύνταξης </label>
			   <div  class="form-control" style="border-style: none;"  >
					<select  name="tupos" style="margin-left:5%" >
						<option <?php if($tupos0) echo "selected"; ?> value="0">ΓΗΡΑΤΟΣ</option>
						<option <?php if($tupos1) echo "selected"; ?> value="1">ΑΝΑΠΗΡΕΙΑΣ</option>
						<option <?php if($tupos2) echo "selected"; ?> value="2">ΧΗΡΕΙΑΣ</option>
					</select>
               </div>				   
			</div>	
						   	<br></br>
			 <div class="form-group">
				<label class="col-md-4 control-label"  >Σύνολο ημερών εργασίας στην ασφαλιστική ζωή</label>  
				<div class="col-md-4">
					<input name="days" type="text" value="<?php  if (isset($days)) echo $days; ?>" class="form-control input-md" required="">  
					 <span class="text-danger"><?php if (isset($dayserror)) echo $dayserror; ?></span>
				</div>
			</div>
			   	<br></br>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" >Στοιχεία τελευταίας δεκαετίας σε ευρώ</label>    <i class="glyphicon glyphicon-eur  gi-2x col-md-4"></i>
			</div>
<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label"  >2008</label>  
				<div class="col-md-4">
					<input name="year2008" type="text" value="<?php  if (isset($year2008)) echo $year2008; ?>" class="form-control input-md" required=""> 
			        <span class="text-danger"><?php if (isset($year2008error)) echo $year2008error; ?></span>
				</div>
			</div>
			 <div class="form-group">
				<label class="col-md-4 control-label"  >2009</label>  
				<div class="col-md-4">
					<input  name="year2009" type="text" value="<?php  if (isset($year2009)) echo $year2009; ?>"  class="form-control input-md" required="">  
					<span class="text-danger"><?php if (isset($year2009error)) echo $year2009error; ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label"  >2010</label>  
				<div class="col-md-4">
					<input name="year2010" type="text" value="<?php  if (isset($year2010)) echo $year2010; ?>"  class="form-control input-md" required=""> 
					<span class="text-danger"><?php if (isset($year2010error)) echo $year2010error; ?></span>
				</div>
			</div>
		    <div class="form-group">
				<label class="col-md-4 control-label"  >2011</label>  
				<div class="col-md-4">
					<input name="year2011" type="text" value="<?php  if (isset($year2011)) echo $year2011; ?>"  class="form-control input-md" required=""> 
					<span class="text-danger"><?php if (isset($year2011error)) echo $year2011error; ?></span>
				</div>
			</div>
			 <div class="form-group">
				<label class="col-md-4 control-label"  >2012</label>  
				<div class="col-md-4">
					<input  name="year2012" type="text"  value="<?php  if (isset($year2012)) echo $year2012; ?>"  class="form-control input-md" required="">  
					<span class="text-danger"><?php if (isset($year2012error)) echo $year2012error; ?></span>
				</div>
			</div>
						<div class="form-group">
				<label class="col-md-4 control-label"  >2013</label>  
				<div class="col-md-4">
					<input  name="year2013" type="text" value="<?php  if (isset($year2013)) echo $year2013; ?>" class="form-control input-md"  required="">  
					<span class="text-danger"><?php if (isset($year2013error)) echo $year2013error; ?></span>
				</div>
			</div>
						<div class="form-group">
				<label class="col-md-4 control-label"  >2014</label>  
				<div class="col-md-4">
					<input  name="year2014" type="text" value="<?php  if (isset($year2014)) echo $year2014; ?>"  class="form-control input-md" required="">
				    <span class="text-danger"><?php if (isset($year2014error)) echo $year2014error; ?></span>
				</div>
			</div>
						<div class="form-group">
				<label class="col-md-4 control-label"  >2015</label>  
				<div class="col-md-4">
					<input name="year2015" type="text" value="<?php  if (isset($year2015)) echo $year2015; ?>"  class="form-control input-md" required=""> 
					<span class="text-danger"><?php if (isset($year2015error)) echo $year2015error; ?></span>
				</div>
			</div>
			 <div class="form-group">
				<label class="col-md-4 control-label"  >2016</label>  
				<div class="col-md-4">
					<input name="year2016" type="text" value="<?php  if (isset($year2016)) echo $year2016; ?>"  class="form-control input-md" required=""> 
					<span class="text-danger"><?php if (isset($year2016error)) echo $year2016error; ?></span>
				</div>
			</div>
			 <div class="form-group">
				<label class="col-md-4 control-label"  >2017</label>  
				<div class="col-md-4">
					<input name="year2017" type="text" value="<?php  if (isset($year2017)) echo $year2017; ?>"  class="form-control input-md" required=""> 
					<span class="text-danger"><?php if (isset($year2017error)) echo $year2017error; ?> </span>
				</div>
			</div>

			


<!-- Button -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="submit"></label>
				<div class="col-md-4">
					<input type="submit" name="submit" value="Υπολογισμός" class="btn btn-primary" />
				</div>
			</div>	
		</fieldset>
	</form>
	 <?php } ?>
	<span style="font-size: 90%" class="text-success"><?php if (isset($successmsg)) { echo $successmsg; echo $suntaksh; echo '<i class="glyphicon glyphicon-eur"></i>' ; } ?> </span>

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