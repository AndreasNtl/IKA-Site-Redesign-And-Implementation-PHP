<?php
session_start();

include_once './dbconnect.php';

if( isset($_SESSION['usr_id'])){
	if( $_SESSION['usr_role'] != 'administrator'){
		header("Location: index.php");
		exit();
	}
}
else{
	header("Location: index.php");
	exit();
}

if (isset($_POST['action']) && isset($_POST['id'])) {
  if ($_POST['action'] == 'Έγκριση') {
	if(mysqli_query($con, "UPDATE secured_applications SET standBy='" . true . "', approval='" . true . "' WHERE id='" . $_POST['id'] . "' ")){
 
	} 

  }
  if ($_POST['action'] == 'Απόρριψη') {
	if(mysqli_query($con, "UPDATE secured_applications SET  standBy='" . true . "', approval='" . false . "' WHERE id='" . $_POST['id'] . "' ")){
	   
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

    <title>IKA-ETAM </title>
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./assets/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/layout.css" rel="stylesheet">
    <link href="./css/programme.css" rel="stylesheet">
	
    <script src="./assets/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
  

<header>
	<a href="./admin.php" title=""><img style ="width:25%" id="banner" alt="IKA-ETAM" src="./images/ika_logo.jpg" title="IKA-ETAM"></a>  

	<!-- topcorner buttons -->
	<div class="topcorner-buttons">
		<form class="form-signin">
			<?php if (isset($_SESSION['usr_id'])) { ?>
				<p class="text-right">Καλωσήλθατε!<br><a href="./admin.php"><span style="font-size:large;"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['usr_role']; ?></span></a></p>
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

	</nav> <!-- /navbar navbar-inverse -->

</header>



	
	<br>
	</br>

		<div  class="container">
		<h2><strong>ΑΙΤΗΣΕΙΣ</strong></h2>
	  <div class="table-responsive-vertical">
	  <table id="table" class="table table-hover">
      <thead>
        <tr>
          <th>Aπό</th>
		   <th>Mέχρι</th>
          <th>AMKA</th>
		  <th>Ασθένεια</th>
          <th>Έγκριση</th>
		  <th>Απόρριψη</th>
        </tr>
      </thead>
	   <tbody>
 
	  	<?php      
		$query = "SELECT * FROM secured_applications" ;
		$result = $con->query($query);
		if(!$result) die($con->error);
		
		$rows = $result->num_rows;
				
		
		for($j=0; $j < $rows ; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
            echo "<form method='post' action=''>";
			if(!$row['standBy']) { 
				echo ' <tr  > <td data-title="Aπό">'  . $row['dateFrom'] .  '</td> <td data-title="Mέχρι">'  . $row['dateTo'] .  '</td> <td data-title="AMKA">' . $row['AMKA'] . '</td> <td data-title="Ασθένεια">'  . $row['astheneia'] .  '</td> <td data-title="Επιλογή"> <input type="submit" name="action" value="Έγκριση" class="btn btn-primary" /></td> <td data-title="Επιλογή"> <input style="background-color:red" type="submit" name="action" value="Απόρριψη" class="btn btn-primary" /></td> </tr>';
				echo '<input type="hidden" name="id" value="' .$row['id'] . '"/>' ;
			}
			echo "</form>";
		}	
		$result->close();
		
	?> 
		  </tbody>
    </table>
  </div>

  </div >
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