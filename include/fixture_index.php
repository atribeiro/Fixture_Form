<?php

include_once('connection.php');

/**connect to database */
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/** if fail to connect throw exception*/
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Insert or Update information
if(isset($_POST['action_type']))
{
	if ($_POST["action_type"] == 'add' or $_POST["action_type"] == 'edit') {
        //Sanitize the data and assign to variables

        $id = $_POST['id'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $league = $_POST['league'];
        $game = $_POST['game'];
        $home = $_POST['home'];
        $result = $_POST['result'];
        $away = $_POST['away'];
        $referee = $_POST['referee'];
        $venue = $_POST['venue'];

        if ($_POST["action_type"] == 'add') {

            $query = mysqli_query($link, "INSERT INTO wp_fixtures (ID, Date, Time, League, Game, Home, Result, Away, Referee, Venue)
                  VALUES ('','" .$date. "', '" .$time. "' , '" .$league . "', '" .$game. "', '" .$home. "', '" .$result. "', '" .$away . "', '" .$referee. "', '" .$venue. "')")
            or die(mysqli_error($link));

             }

        if ($_POST["action_type"] == 'edit') {

            $query = mysqli_query($link, "UPDATE wp_fixtures set
					Date = '".$date."',
					Time = '".$time."',
					League = '".$league."',
					Game = '".$game."',
					Home = '".$home."',
					Result = '".$result."',
					Away = '".$away."',
					Referee = '".$referee."',
					Venue = '".$venue."'
					WHERE ID = $id");

            if($query){
                print 'Success! record updated';
            }else{
                print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
            }

        }
    }
	header('Location: fixtures_form.php');
	exit();
}

if(isset($_POST["action"]) and $_POST["action"]=='delete'){
	$id = (isset($_POST['id'])? $_POST['id'] : '');
    mysqli_query($link, "DELETE FROM wp_fixtures
			WHERE ID = $id");
    printf("%d Row deleted.\n", mysqli_affected_rows($link));

}

$gresult = ''; //declare global variable
if(isset($_POST["action"]) and $_POST["action"]=='edit'){
	$id = (isset($_POST['id'])? $_POST['id'] : '');
	$query = "SELECT * FROM wp_fixtures
			WHERE ID = $id ";

	$result = mysqli_query($link, $query);

	if(!$result)
	{
		echo mysqli_error($link);
		exit();
	}
	
	$gresult = mysqli_fetch_array($result);

	include('update_fixtures.php');
	
	exit();
}



$query = "SELECT * FROM wp_fixtures";

$result = mysqli_query($link, $query);

if(!$result)
{
	echo mysqli_error($link);
	exit();
}																				

$list = array();

while($row = mysqli_fetch_array($result))
{
	$list[] = array('id' => $row['ID'],
							'date' => $row['Date'],
							'time' => $row['Time'],
							'league' => $row['League'],
							'game' => $row['Game'],
							'home' => $row['Home'],
							'result' => $row['Result'],
							'away' => $row['Away'],
							'referee' => $row['Referee'],
							'venue' => $row['Venue']);
}
include 'fixtures_form.php';
exit();

?>