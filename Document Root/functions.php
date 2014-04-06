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
	$result = $sql->query($query);
	return $result;

}

//input[0] is the post number
//input[1] is the array of talents
function getPost($input){

	if($input[1]){
		$tlist=join(',' , $input[1]);
			$query = sprintf("SELECT projects.id
			FROM 
			projects, project_required, talents
			WHERE 
			projects.id=project_id
			AND
			talents.id=talent_id
			AND
			talents.id IN ($tlist)
			");
		}
		else
			$query = sprintf("SELECT projects.id
			FROM 
			projects, project_required, talents
			WHERE 
			projects.id=project_id
			AND
			talents.id=talent_id
			");
	

		$result = Query($query);

	if (!$result) {
    	//No projects avaliable
	}

	$count=0;

	while ($row = mysqli_fetch_assoc($result)) {
		if($count==$num)
			return $row;

		$count++;
	}
		
}

function getTalents(){
	$id=$_SESSION['id'];

	$query = sprintf("SELECT talents.id
		FROM 
		users, user_talents, talents
		WHERE 
		users.id=$id 
		AND
		user_id=users.id
		AND
		talent_id=talents.id
		");
		//talents.id = user_talents.talent_id,
		//users.active='1'
		//");


	
	$result = Query($query);
	$column = array();

	while($row  = mysqli_fetch_assoc($result)){
		$str = $row['id'];
		$column[] = "'$str'";
	}

	return $column;
	

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


