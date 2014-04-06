<div id="main">
	<div id="main_content_project">
		<?//<h2>Project name</h2>?>
		<div id="main_project_wrapper">
			<img src="http://placehold.it/700x200&text=<?echo get_project_name($_GET["id"]);?>" class="project_title"/>
			<p><?echo get_project_description($_GET["id"]);?></p>
			<br/>
			<div id="project_content_whosin" >
				<h3>Who's in?</h3>
				<ul>
					<li>Human being - Talent</li>
					<li>Human being - Talent</li>
					<li>Human being - Talent</li>
					<li>Human being - Talent</li>
				</ul>
			</div>
			
			<div id="project_content_footer">
			<h3>Talents needed</h3>
				<? echo get_project_talents($_GET["id"]);?>
				<br/>
								<br/>
			<a href='#' class='project_btn' id='<?echo $_GET["id"];?>'>JOIN</a>
			</div>
		</div>
	</div>
</div>