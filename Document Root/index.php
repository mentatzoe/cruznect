<?php
include 'functions.php';


if($_SESSION['email']){
	include 'logged.php';
} else {
	include 'unlogged.php';
}

?>

<?php 
$artists=getCount("artist");
$musicians=getCount("music");
$engineers=getCount("engineer");
$message="$artists artists. $musicians musicians. $engineers software engineers.";
?>
<html>
<head>
<!--Name and meta tags-->

<!--Including external jQuery-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<!--Link to CSS-->
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<!--These divs will be in separate php files later-->
<div id="header">
	<div id="header_logo">
		<img src="http://placehold.it/150x100&text=logo" id="header_logo_image"/>
	</div>
	<div id="header_access">
		<img src="http://placehold.it/150x100&text=login" id="header_login"/>
	</div>
</div>

<div id="main">
<h1>Connect with people at UCSC</h1>
<h3>Share your passions.</h3>
	<div id="main_login">
		asdasd
	</div>
	<div id="main_count">
		Do you need someone for your project? <br/>
		Right now we have <?php echo($message); ?>
	</div>
</div>

<div id="footer">
</div>

<script>
$("#header_login").click(
	function(){
		if($("#main_login").is(":visible")){
			$("#main_login").hide("slow");
		}
		else{
			$("#main_login").show("slow");		
		}
	}
);
</script>
</body>
</html>