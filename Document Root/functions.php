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

function print_rows(){
	$query = sprintf("SELECT * FROM projects");
	$result = Query($query);
	var_dump($query);
	while ($row = mysqli_fetch($result)) {
		echo "<div class='main_content_row'>
			<table class='main_content_table'>
				<tr>
					<td>
						<img src='".$row["imageURL"]."' class='project_img'/>
					</td>
					<td class='main_content_text'>
					<h3> ".$row["name"]."</h3><br/>
					".$row["description"]."
					</td>
					<td>
						<a href='#' class='project_btn' id='".$row["id"]."'>JOIN</a>
					</td>
				</tr>
			</table>
		</div>";
			}
}


?>