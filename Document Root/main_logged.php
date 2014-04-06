<div id="main">
	<div id="main_content">
		<?
		if(!empty($_GET["talent"])){
		print_rows($_GET["talent"]);
		?>
		<a href="index.php">See all projects</a>
		<?
		}	
		else{
		print_rows(0);
		}
		?>
	</div>
</div>