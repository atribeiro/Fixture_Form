<?php
include_once('connection.php');

/**connect to database */

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teams</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
<h1>Teams Symbols</h1>

<nav class="nav navbar">
	   	<li><a href="fixtures_form.php">Fixtures</link></a></li>
		<li><a href="results_form.php">Standings</link></a></li>
		<li><a href="update_images.php">Team Symbols</link></a></li>
</nav>

        <form method="post" enctype="multipart/form-data">
        <br/>
            <input type="file" name="image" />
            <br/><br/>
            <input type="submit" name="sumit" value="Upload" />
        </form>
		<br/>
		
        <?php
            if(isset($_POST['sumit']))
            {
                if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                    $name = addslashes($_FILES['image']['name']);
                    saveimage($name,$image);

                }
            }
            displayimage();
            function saveimage($name,$image)
            {
                $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                /** if fail to connect throw exception*/
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }
                $query="insert into wp_images (name,image) values ('$name','$image')";
                $result=mysqli_query($link, $query);
                if($result)
                {
                 echo "<br/>Image uploaded.";
                 $query = "UPDATE wp_fixtures
				INNER JOIN wp_images
				ON wp_fixtures.Home = wp_images.name
				SET wp_fixtures.SymbolH = wp_images.image And SET wp_fixtures.SymbolA = wp_images.image";
				
                }
                else
                {
                    echo "<br/>Image not uploaded.";
                }
            }
            function displayimage() {

                $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                /** if fail to connect throw exception*/
                if (mysqli_connect_errno()) {
                    printf("Connect failed: %s\n", mysqli_connect_error());
                    exit();
                }

                $query="select * from wp_images";
                $result=mysqli_query($link, $query);
				
				if ($result){
				/* fetch data row */
					print '<table class="table">

						<td align="left"><b>Team Name</b></td>
						<td align="left"><b>Symbol</b></td></tr>';
				}
                while($row = mysqli_fetch_array($result))
                {
					echo "<tr><td>";
					echo $row['name'];
					echo "</td><td>";
					echo '<img height="50" width="50" src="data:image;base64,'.$row[2].' ">';
					echo "</td></tr>";
                }
				
		echo "</table>";
			}
        ?>
    </body>
</html>