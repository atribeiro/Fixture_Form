<?php

include_once('connection.php');

/**connect to database */
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/** if fail to connect throw exception*/
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}


//Insert or Update

if(isset($_POST['action_type']))
{
	if ($_POST['action_type'] == 'add' or $_POST['action_type'] == 'edit') {

		$id = $_POST['id'];
		$position = $_POST['position'];
		$team = $_POST['team'];
		$points = $_POST['points'];
		$win = $_POST['win'];
		$loss = $_POST['loss'];
		$strike = $_POST['strike'];

		if ($_POST["action_type"] == 'add') {

		$query = mysqli_query($link, "INSERT INTO wp_standings (ID, Position, Team, Points, Win, Loss, Strike)
                  VALUES ('','" .$position. "', '" .$team. "' , '" .$points. "', '" .$win. "', '" .$loss. "', '" .$strike. "')")
		or die(mysqli_error($link));

	}

	if ($_POST["action_type"] == 'edit') {

		$query = mysqli_query($link, "UPDATE wp_standings SET
					Position = '".$position."',
					Team = '".$team."',
					Points = '".$points."',
					Win = '".$win."',
					Loss = '".$loss."',
					Strike = '".$strike."'
					WHERE ID = $id");

		if($query){
			print 'Success! record updated';
		}else{
			print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
		}

	}
}

	header('Location: results_form.php');
	exit();
}
//End Insert or Update

//Start of edit
$gresult = ''; //declare global variable
if(isset($_POST["action"]) and $_POST["action"]=="edit"){
	$id = (isset($_POST['id'])? $_POST['id'] : '');
	$query = "SELECT * FROM wp_standings 
			WHERE ID = $id.";

	$result = mysqli_query($link, $query);

	if(!$result)
	{
		echo mysqli_error($link);
		exit();
	}
	
	$gresult = mysqli_fetch_array($result);
	
	include_once('update_results.php');
	exit();
}
//end of edit

//Start Delete

if(isset($_POST["action"]) and $_POST["action"]=="delete"){
	$id = (isset($_POST['id'])? $_POST['id'] : '');
	mysqli_query($link, "DELETE FROM wp_standings
			WHERE ID = $id");
	printf("%d Row deleted.\n", mysqli_affected_rows($link));


}
//End Delete
//Read information from database

$query = "SELECT * FROM wp_standings";

$result = mysqli_query($link, $query);

if(!$result)
{
	echo mysqli_error($link);
	exit();
}																				

$list = array();

//Loop through each row on array and store the data to $results[]

while($rows = mysqli_fetch_array($result)) {
	$list[] = array('id' => $rows['ID'],
		'position' => $rows['Position'],
		'team' => $rows['Team'],
		'points' => $rows['Points'],
		'win' => $rows['Win'],
		'loss' => $rows['Loss'],
		'strike' => $rows['Strike']);
}
	include 'results_form.php';
	exit();

?>