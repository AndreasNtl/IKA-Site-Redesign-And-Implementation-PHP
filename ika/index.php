<?php
session_start();
include_once './dbconnect.php';
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
    <title>IKA-ETAM</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/layout.css" rel="stylesheet">
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
	


	<br></br>

	<div class="well well-index">
			<div class="container">
					<div class="leftSideBar" >
						<div class="leftBorder" >  
						<h2 style="font-size: 17px;"  class="sideHeader"> Τελευταία Νέα </h2>
							<div class="menu" >
							   <li>
									<a href="http://www.ika.gr/gr/infopages/keao/2016_d_trim_keao.pdf">"4η ΤΡΙΜΗΝΙΑΙΑ ΕΚΘΕΣΗ ΠΡΟΟΔΟΥ έτους 2016 του ΚΕΑΟ"</a>
							   </li>
							   <li>
									<a href="http://www.ika.gr/gr/infopages/news/20161230.cfm">"Χαιρετισμός Διοικητή"</a>
							   </li>
							   <li>
									<a href="http://www.ika.gr/gr/infopages/news/apasxolisi_04_2016.pdf">"Μηνιαία Στοιχεία Απασχόλησης"</a>
							   </li>
							   <li>
									<a href="http://www.ika.gr/gr/infopages/news/20161212.cfm">"ΑΝΑΚΟΙΝΩΣΗ ΔΩΡΟΣΗΜΟΥ Γ' ΤΕΤΡΑΜΗΝΟΥ 2017"</a>
							   </li>
							   <li>
									<a href="http://www.ika.gr/gr/infopages/news/apasxolisi_03_2016.pdf">"Μηνιαία Στοιχεία Απασχόλησης Μαρτίου 2016"</a>
							   </li>
							</div>
						</div>
					</div>
		 
					
					<div class="centerBar" >
					  <div class="leftBorder" >  
						 <h2  style="font-size: 17px;"  class="sideHeader"> Εξερεύνησε τα οφέλη σου</h2>
							<a href="http://www.ika.gr/gr/infopages/asf/20150529_odhgos_asfalismenou.pdf">  <img src="./images/searchBenefits.jpg" height="220"   style= "width:95%"  >  </a>
						</div>
					</div>
					
					<div class="rightSideBar" >
						<div class="rightBorder" >  
						<h2   style="font-size: 17px;" class="sideHeader"> Χρήσιμοι σύνδεσμοι </h2>
							<div class="menu" >
							   <li>
									<a href="http://www.digitalheritagelab.eu/">"Υπολογιστικά εργαλεία"</a>
							   </li>
							   <li>
									<a href="http://www.digitalheritagelab.eu/">"Βεβαιώσεις"</a>
							   </li>
							   <li>
									<a href="http://www.digitalheritagelab.eu/"> "Αντληση Εντύπων"</a>
							   </li>
							   <li>
									<a href="http://www.digitalheritagelab.eu/"> "Προστασία Προσωπικών Δεδομένων" </a>
							   </li>
							   <li>
									<a href="http://www.digitalheritagelab.eu/">"Θέματα Συντάξεων"</a>
							   </li>
							   <li>
									<a href="http://www.digitalheritagelab.eu/">"Προστασία Προσωπικών Δεδομένων"</a>
							   </li>
							</div>
					   </div>
					</div>
			</div>
			
			<br></br><br></br>
			 <div class="container">
						<div class="panel panel-primary" >
							<div class="panel-heading">
								<div class="container-fluid panel-container">
									<div class="col-xs-4 text-left">
										<h4 class="panel-title abc">
											 <i class= "glyphicon glyphicon-calendar gi-2x col-md-4" ></i> <strong>Ανοιχτά : </strong>Δευτέρα - Παρασκευή 08:00 - 16:00 
										</h4>
									</div>
									<div style="margin-left:15%" class="col-xs-4 text-right">
										<h4 class="panel-title abc">
											<i class="glyphicon glyphicon-earphone  gi-2x col-md-4"></i>  <strong >   Επικοινωνία : </strong> 210-1231123 210-1231123 
										</h4>
									</div>
								</div>
							</div>	
						</div>
			 </div>


			<br></br><br></br>
			
			<div class="panel panel-sponsors">

					<div class="row">
								<div class="col-md-3">
									<a target="_blank" href="http://www.ika.gr/gr/infopages/news/DIOIKHT_DIADIK_IKA-ETAM_APO_TA_KEP.pdf"><img src="./images/sponsors/kep.jpg" width="100" height="100"   alt=""></a>
								</div>
								<div class="col-md-3">
									<a target="_blank" href="http://www.efka.gov.gr/"><img src="./images/sponsors/efka.jpg" width="100" height="100"   ></a>
								</div>
								<div class="col-md-3">
									<a target="_blank" href="http://www.ika.gr/gr/infopages/keao/genika.cfm"><img src="./images/sponsors/keao.jpg" width="100" height="100"    alt=""></a>
								</div>
								<div class="col-md-3">
									<a target="_blank" href="http://www.eopyy.gov.gr/Home/StartPage?a_HomePage=Index"><img src="./images/sponsors/eopyy.png" width="100" height="100"  alt=""></a>
							</div>
								
					</div>
					<br></br>
					<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col-md-3">
									<a target="_blank"href="https://diavgeia.gov.gr/"><img src="./images/sponsors/diavgeia.jpg" width="200" height="100"  class="img-responsive img-centered" alt=""></a>
							</div>
							<div class="col-md-3">
									<a target="_blank" href="http://www.ypakp.gr/"><img src="./images/sponsors/ypoian.png" width="200" height="100"  class="img-responsive img-centered" alt=""></a>
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
 
  </body>
  
	
</html>
