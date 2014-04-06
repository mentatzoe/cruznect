<div id="main">
	<div id="main_content_project">
		<?//<h2>Project name</h2>?>
		<div id="main_project_wrapper">
			<img src="http://placehold.it/700x200&text=<?echo get_project_name($_GET["id"]);?>" class="project_title"/>
			<p><?echo get_project_description($_GET["id"]);?></p>
			<br/>
			<div id="project_content_whosin" >
				<h3>Who's in?</h3>
				<? echo get_project_people($_GET["id"]);?>
			</div>
			
			<div id="project_content_footer">
			<h3>Talents needed</h3>
				<? echo get_project_talents($_GET["id"]);?>
				<br/>
								<br/>
				<form method="post" action="join.php">
					<input type="hidden" name="project_id" value="<?echo $_GET["id"];?>"/>
					<input type="submit" class="project_btn" value="I'm in!"/>
				</form>
			</div>
		</div>
	</div>
</div>