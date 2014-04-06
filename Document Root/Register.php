<?php
	include 'functions.php';
	echo "hello";
	var_dump($_POST);
	
	echo count($_POST['talents']);
	if(!empty($_POST['talents'])) {
    	
	}
	
if(!empty($_POST['talents'])) {
    foreach($_POST['talents'] as $check) {
            echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}
	
	$username=$_POST["username"];
	$password=$_POST["password"];


?>
