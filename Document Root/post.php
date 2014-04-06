
<?php
	$name=$_POST['name'];
	$description=$_POST['description'];
	$imgurl=$_POST['imgURL'];

	$talents=$_POST['talents'];

	//Insert Project
	$query = printf("
		INSERT INTO projects (name, description, imgURL, ownder, active)
		VALUES ($name, $description, $imgURL, 1, 1)
		");

	Query($query);

	//get new project id
	$query = printf("
		SELECT id 
		FROM project
		WHERE name='$name'
		");

	$result=Query($query);
	$row = mysqli_fetch_assoc($result);
	$id=$row['id'];


	$query = printf("
		INSERT INTO project_required (id)
		VALUES ($id)
		");

	Query($query);

	header('Location: index.php');

?>
