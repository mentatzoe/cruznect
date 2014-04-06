<div id="main">
<h1>Connect with people at UCSC</h1>
<h3>Share your passions.</h3>
	<div id="main_login">
		<form method="post" action="login.php" id="main_login_form">
				<div id="main_login_form_header">
					<h3>Log in</h3>
					Or do you want to <a href="#" id="register">Register</a>?
	   			</div>
	   			<input type="text" id="email" name="email" placeholder="@ucsc.edu" class="large_input" />
	   			<input type="password" id="password" name="password" placeholder="Password" class="large_input" />
	   			<div id="main_login_form_footer">
		   			<input type="submit" value="Log in" />
	   			</div>
		</form>
		<form method="post" action="register.php" id="main_register_form">
				<div id="main_login_form_header">
					<h3>Register</h3>
					@ucsc.edu only, sorry!
	   			</div>
	   			<input type="text" id="email" name="email" placeholder="@ucsc.edu" class="large_input" /><br/>
	   			<input type="password" id="password" name="password" placeholder="Password" class="large_input" /><br/>
	   			<input type="password" id="password" name="password" placeholder="Verify your password!" class="large_input" /><br/>
	   			<input type="text" id="name" name="name" placeholder="Full name" class="large_input" /><br/>
	   			<label for="active">Are you looking for projects?</label><br/>
	   			<input type="radio" name="active" value="1">Yes!
	   			<input type="radio" name="active" value="0">No, I've got my own.<br/><br/>
	   			<label for="talents[]">What's your main skillset? <br/> (select as many as you want!)</label><br/>
	   			<? get_talents_form(); ?>
	   			<div id="main_login_form_footer">
		   			<input type="submit" value="Register!" />
		   			Wait, no! I want to <a href="#" id="login">log in!</a><br/>
	   			</div>
		</form>
	</div>
	<div id="main_count">
		Do you need someone for your project? <br/>
				Right now we have...
				<br/>
				<br/>
		<table>
			<tr>
				<td>
					3
				</td>
				<td>
					5
				</td>
				<td>
					4
				</td>
				<td>
					1
				</td>
				<td>
					2
				</td>
			</tr>
			<tr>
				<td>
					<img src="img/artico.png" class="main_count_img" />
				</td>
				<td>
					<img src="img/csico.png" class="main_count_img" />
					
				</td>
				<td>
					<img src="img/filmico.png" class="main_count_img" />
				</td>
				<td>
					<img src="img/musicico.png" class="main_count_img" />
				</td>
				<td>
					<img src="img/writingico.png" class="main_count_img" />
				</td>
			</tr>
		</table>

		
	</div>
</div>