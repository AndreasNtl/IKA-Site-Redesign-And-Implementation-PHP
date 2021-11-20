<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	    session_destroy();

		if($_SESSION['usr_role'] == "administrator"){
			unset($_SESSION['usr_id']);
			unset($_SESSION['usr_role']);
			header("Location: index.php");
		}else {
			if($_SESSION['usr_role'] == "secured"){
				unset($_SESSION['usr_amka']);
				unset($_SESSION['secured']);
			} 
			if($_SESSION['usr_role'] == "employer"){
				unset($_SESSION['usr_ame']);
				unset($_SESSION['employer']);
			} 
			
			unset($_SESSION['usr_name']);
			unset($_SESSION['usr_email']);
			unset($_SESSION['usr_id']);
			unset($_SESSION['usr_role']);
			header("Location: index.php");
		}
} else {
	header("Location: index.php");
}
?>