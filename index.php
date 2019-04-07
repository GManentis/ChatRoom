<?php 
session_start();
if(isset($_SESSION["user"]))
{
	header('Location: ChatRoom.php');
}
else
{
	if(isset($_POST["submit"]))
	{
		if($_POST["usrname"] != "")	
		{    
			$a = $_POST["usrname"];
			$_SESSION["user"] = $a;
			header('Location: ChatRoom.php');
			$response = "welcome";
		}
		else
		{
			$response = "Please insert legit username";
		}
			
	}
	else
	{
		$response ="";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to our ChatRoom</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<center>
	<h3 style="color:red;">Welcome to our chatroom,please insert your desired username and dive in</h3>
	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		<hr>
		<h4 style="color:red;">Your Username please:</h4>
		<br>
		<input type="text" name="usrname" class="form-control" id="usr" style="text-align:center;" placeholder="Insert Usrname here...">
		<br>
		<input type="submit" name="submit" class="btn btn-primary" value="Dive In Commander">
	</form>
	</center>
</div>
<hr>
<div class="container">
	<center>
		<?php echo $response; ?>
	</center>
</body>
</html>