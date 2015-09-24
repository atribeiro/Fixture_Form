<?php
include_once ("wp_connection_LBA.php");

/**connect to database */
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

/** if fail to connect throw exception*/
if(!$link){
	die('Could not connect: '. mysqli_error());
	}

/** select database */
$db_selected = mysqli_select_db(DB_NAME, $link);

if(!$db_selected){
	die('Can\'t use ' . DB_NAME . ': ' . mysqli_error());
	
	}

	if(isset($POST['submit']))
	{
		if(getimagesize($FILES['image']['tmp_name']))
		{
			echo "Please Select Image";
			
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Team Table</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
<h1>Team Table</h1>

<nav class="navbar navbar-default">
	<ul class="nav navbar-nav">
		<li><a href="fixtures_form.php">Edit/Delete</link></a></li>
		<li><a href="results_form.php">Standings</link></a></li>
		<li><a href="update_images.php">Team Symbols</link></a></li>
	</ul>
</nav>

<form action="http://localhost/LBATest/team.php"
      method="post" enctype="multipart/form-data">
	  
<table class="table">
	<tr><th>Team Name</th>
	<td>
		<?php echo $fx["name"]; ?>
	</td>
	</tr>
	<tr><th>Team Symbol</th>
	<td><input type="file" name="fileToUpload" id="fileToUpload" /></td>
	</tr>
	
</table>
<input type="submit" name="submit" value="Upload Image" class="btn btn-success"/>	
<br/>
</form>
</body>
</html>

