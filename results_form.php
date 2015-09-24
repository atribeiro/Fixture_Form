<?php 
include_once('results_index.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Standings</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<div class="container">

<h1>Tables/Fixtures/Results</h1>

<nav class="nav navbar">
	   	<li><a href="fixtures_form.php">Edit/Delete</link></a></li>
		<li><a href="results_form.php">Standings</link></a></li>
		<li><a href="update_images.php">Team Symbols</link></a></li>
</nav>
</div>

<script type="text/javascript">
function ConfirmDelete(){
	var d = confirm('Do you really want to delete data?');
	if(d == false){
		return false;
	}
}
</script>

<body>
	<div class="content">
	<a href="update_results.php" class="btn-success">Add New</a>
	</div>
		<table class="tablefix">
			<thead>
				<tr>
					<th class="absorbing-column">
						Position
					</th>
					<th class="absorbing-column">
						Team
					</th>
					<th class="absorbing-column">
						Points
					</th>
					<th class="absorbing-column">
						Win
					</th>
					<th class="absorbing-column">
						Loss
					</th>
					<th class="absorbing-column">
						Strike
					</th>
					<th class="absorbing-column"></th><th class="absorbing-column"></th>	
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $fx) : ?>
					<tr>
						<td class="absorbing-column">
							<?php echo $fx["position"]; ?>
						</td>
						<td class="absorbing-column">
							<?php echo $fx["team"]; ?>
						</td>
						<td class="absorbing-column">
							<?php echo $fx["points"]; ?>
						</td>
						<td class="absorbing-column">
							<?php echo $fx["win"]; ?>
						</td>
						<td class="absorbing-column">
							<?php echo $fx["loss"]; ?>
						</td>
						<td class="absorbing-column">
							<?php echo $fx["strike"]; ?>
						</td>
						<td>
							<form method="POST" action="fixtures_input/include/results_index.php">
								<input type="hidden" name="id" 
									value="<?php echo $fx["id"]; ?>" />
								<input type="hidden" name="action" value="edit" />
								<input type="submit" value="Edit"/>
							</form> 
						</td>
						<td>
							<form method="POST" action="fixtures_input/include/results_index.php"
							onSubmit="return ConfirmDelete();">
								<input type="hidden" name="id" 
								value="<?php echo $fx["id"]; ?>" />
								<input type="hidden" name="action" value="delete" />
								<input type="submit" value="Delete" " />
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>