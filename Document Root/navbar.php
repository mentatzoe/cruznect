<?if($_COOKIE['email']){?>
<div id="header">
	<div id="header_logo">
		<img src="http://placehold.it/150x100&text=logo" id="header_logo_image"/>
	</div>
	<div id="header_access">
		<img src="http://placehold.it/200x100&text=add project" id="header_project"/>
		<img src="http://placehold.it/150x100&text=profile" id="header_profile"/>

	</div>
</div>
<?} else {?>
<div id="header">
	<div id="header_logo">
		<img src="http://placehold.it/150x100&text=logo" id="header_logo_image"/>
	</div>
	<div id="header_access">
		<img src="http://placehold.it/150x100&text=login" id="header_login"/>
	</div>
</div>
<?}?>