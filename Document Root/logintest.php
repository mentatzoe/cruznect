<html>

<?
//echo "http://localhost/logintest.php?username=hesu@ucsc.edu&password=7979c0c1e116fb106076feff1637eadb";
$username = $_POST["username"];
$password = $_POST["password"];


$DB_NAME = "hackathon";
$DB_HOST = "127.0.0.1";
$DB_USER = "root";
$DB_PASS = "root";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
$mysqli->set_charset("utf8");

$query = "SELECT username, password FROM user WHERE username='$username'";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

if ($password == $row["password"]){
		login();
	//Incorrect Password
	}
//	else{
		//incorrectPass();
//		echo "NAY";
//		}
		



function login(){
	session_start();
	$_SESSION['username']=$username;
	$status = 200;
	$json = array("user-name"=>$_GET["username"], "status-code" => $status-code, 0);
	echo json_encode( $json );


}
?>
</html>