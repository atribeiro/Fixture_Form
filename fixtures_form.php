<?php require_once('fixture_index.php') ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fixtures</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="container">
<h1>Tables/Fixtures/Results</h1>

	<nav class="nav navbar">
		<li><a href="fixtures_form.php">Fixtures</link></a></li>
		<li><a href="results_form.php">Standings</link></a></li>
		<li><a href="update_images.php">Team Symbols</link></a></li>
	</nav>

<script type="text/javascript">
function ConfirmDelete(){
	var d = confirm('Do you really want to delete data?');
	if(d == false){
		return false;
	}
}
</script>



 	<div class="content">
	<a href="update_fixtures.php" class="btn-success">Add New</a>
	</div> 

			<table class="tablefix">
				<thead>
					<tr>
						<th class="absorbing-column">
							Date
						</th>
						<th class="absorbing-column">
							Time
						</th>
						<th class="absorbing-column">
							League
						</th>
						<th class="absorbing-column">
							Game
						</th>
						<th class="absorbing-column">
							Home
						</th>
						<th class="absorbing-column">
							Result
						</th>
						<th class="absorbing-column">
							Away
						</th>
						<th class="absorbing-column">
							Referee
						</th>
						<th class="absorbing-column">
							Venue
						</th>	
						<th></th><th></th>	
					</tr>
				</thead>
					<?php foreach($list as $fx) : ?>
						<tr>
							<td class="absorbing-column">
								<?php echo $fx["date"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["time"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["league"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["game"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["home"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["result"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["away"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["referee"]; ?>
							</td>
							<td class="absorbing-column">
								<?php echo $fx["venue"]; ?>
							</td>
							<td>
								<form method="POST" action="fixtures_input/include/fixture_index.php">
									<input type="hidden" name="id" 
									value="<?php echo $fx["id"]; ?>" />
									<input type="hidden" name="action" value="edit"/>
									<input type="submit" value="Edit"/>
								</form> 
							</td>
							<td>
								<form method="POST" action="fixtures_input/include/fixture_index.php"
								onSubmit="return ConfirmDelete();">
									<input type="hidden" name="id" 
									value="<?php echo $fx["id"]; ?>" />
									<input type="hidden" name="action" value="delete"/>
									<input type="submit" value="Delete" />
								</form>
							</td>
						</tr>
						
					<?php endforeach; ?>
				
			</table>
			
</div>
</body>
</html>