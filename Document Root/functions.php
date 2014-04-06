<?php

function getSQL(){
	$DB_NAME = "hackathon";
	$DB_HOST = "127.0.0.1";
	$DB_USER = "root";
	$DB_PASS = "";
	
	return new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
}

function Query($query){
	$sql = getSQL();
	return $sql->query($query);

}

function getPostList(){


	$query = sprintf("SELECT * 
		FROM 
		project, project_required, talent
		WHERE 
		project.id = project_required.product_id, 
		talent.id = project_required.talent_id,
		active='1'
		");

	$result = $sql->query($query);

	if (!$result) {
    	//No projects avaliable
	}

	while ($row = mysqli_fetch_assoc($result)) {
		//Store Entries into array
	}
		
}

function Message($message){
	//This wont work
	$_POST['message']=$message;
	Header("Location: message.php");

}

function getCount($talent){

	$query = sprintf("SELECT name 
		FROM 
		talent
		WHERE 
		name='$talent'
		");


	$result = Query($query);

	if (!$result) {
    	return 0;
	}

	$i=0;
	while ($row = mysqli_fetch_assoc($result)) {
		$i++;
	}

	return $i;

}


?>