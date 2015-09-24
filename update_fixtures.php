<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fixtures</title>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

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
		window.location = '/include/fixture_index.php';
	}

</script>

<body>

<div class="container">
<h1>Tables/Fixtures</h1>

	<nav class="nav navbar">
		<li><a href="fixtures_form.php">Fixtures</link></a></li>
		<li><a href="results_form.php">Standings</link></a></li>
		<li><a href="update_images.php">Team Symbols</link></a></li>
	</nav>


</div>
<body>
	<div class="wrapper">
		<div class="content" style="width: 500px !important;">
			<div>
			<form id="frmFixtures" method="POST" action="fixtures_input/include/fixture_index.php">
				<input type="hidden" name="id" 
				value="<?php echo (isset($gresult) ? $gresult["ID"] :  ''); ?>" />
				<table>
					<tr>
						<td>
							<label for="fname">Date: </label>
						</td>
						<td>
							<input type="text" name="date" 
							value="<?php echo (isset($gresult) ? $gresult["Date"] :  ''); ?>" 
							id="fname" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Time: </label>
						</td>
						<td>
							<input type="text" name="time" 
							value="<?php echo (isset($gresult) ? $gresult["Time"] :  ''); ?>" 
							id="lname" class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">League </label>
						</td>
						<td>
							<input type="text" name="league" 
							value="<?php echo (isset($gresult) ? $gresult["League"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Game </label>
						</td>
						<td>
							<input type="text" name="game" 
							value="<?php echo (isset($gresult) ? $gresult["Game"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Home </label>
						</td>
						<td>
							<input type="text" name="home" 
							value="<?php echo (isset($gresult) ? $gresult["Home"] :  ''); ?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Game Result: </label>
						</td>
						<td>
							<input type="text" name="result" 
							value="<?php echo (isset($gresult) ? $gresult["Result"] :  '');?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Away: </label>
						</td>
						<td>
							<input type="text" name="away" 
							value="<?php echo (isset($gresult) ? $gresult["Away"] :  '');?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Referee: </label>
						</td>
						<td>
							<input type="text" name="referee" 
							value="<?php echo (isset($gresult) ? $gresult["Referee"] :  '');?>" 
							class="txt-fld"/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="fname">Venue: </label>
						</td>
						<td>
							<input type="text" name="venue" 
							value="<?php echo (isset($gresult) ? $gresult["Venue"] :  '');?>" 
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