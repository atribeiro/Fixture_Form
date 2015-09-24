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
<h1>Tables/Fixtures</h1>

	<nav class="nav navbar">
		<li><a href="fixtures_form.php">Edit/Delete</link></a></li>
		<li><a href="results_form.php">Standings</link></a></li>
		<li><a href="update_images.php">Team Symbols</link></a></li>
	</nav>

</nav>
</div>
<script type="text/javascript">

/* function Validate(){
	var valid = true;
	var message = '';
	var fname = document.getElementById("fname");
	var lname = document.getElementById("lname");
	
	if(fname.value.trim() == ''){
		valid = false;
		message = message + '*First Name is required' + '\n';
	}
	if(lname.value.trim() == ''){
		valid = false;
		message = message + '*Last Name is required';
	}
	
	if (valid == false){
		alert(message);
		return false;
	} 
}*/

function GotoHome(){
	window.location = '/include/results_index.php';
}
</script>


<body>
	<div class="wrapper">
		<div class="content" style="width: 500px !important;">
			<div>
			<form id="frmResults" method="POST" action="fixtures_input/include/results_index.php">
				<input type="hidden" name="id" 
				value="<?php echo (isset($gresult) ? $gresult["id"] :  ''); ?>" />
				<table>
					<tr>
						<td>
							<label for="fname">Position </label>
						</td>
						<td>
							<input type="text" name="position" 
							value="<?php echo (isset($gresult) ? $gresult["Position"] :  ''); ?>" 
							id="fname" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Team: </label>
						</td>
						<td>
							<input type="text" name="team" 
							value="<?php echo (isset($gresult) ? $gresult["Team"] :  ''); ?>" 
							id="lname" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Points </label>
						</td>
						<td>
							<input type="text" name="points" 
							value="<?php echo (isset($gresult) ? $gresult["Points"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Win </label>
						</td>
						<td>
							<input type="text" name="win" 
							value="<?php echo (isset($gresult) ? $gresult["Win"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Loss </label>
						</td>
						<td>
							<input type="text" name="loss" 
							value="<?php echo (isset($gresult) ? $gresult["Loss"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Strike: </label>
						</td>
						<td>
							<input type="text" name="strike" 
							value="<?php echo (isset($gresult) ? $gresult["Strike"] :  '');?>" 
							class="txt-fld"/>
						</td>
					</tr>
				</table>
				<input type="hidden" name="action_type" value="<?php echo (isset($gresult) ? 'edit' :  'add');?>"/>
				<div style="text-align: center; padding-top: 30px;">
					<input class="btn btn-success" type="submit" name="save" id="save" value="Save" />
					<input class="btn btn-success" type="submit" name="save" id="cancel" value="Cancel" 
					onclick=" return GotoHome();"/>
				</div>
			</form>
			</div>
		</div>
	</div>
</body>
</html>