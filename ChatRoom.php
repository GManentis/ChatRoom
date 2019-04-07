<?php 
session_start();
if(isset($_SESSION["user"]))
{
	$response = "<span style=\"color:red;\">Welcome aboard,&nbsp;</span><span style=\"color:blue;\">".$_SESSION["user"]."</span>";
	
	if(isset($_POST["quit"]))
	{
		$_SESSION["user"] = "";
		session_destroy(); //destroy the session
		header("location:index.php");
	}
}
else
{
	header("location:index.php");
	$response = "<span style=\"color:red;\">No username,no entry!!!</span>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ChatRoom</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="ajax/chatroom.js"></script>
</head>
<body onload="show()">
<center><h3 style="color:red;">Forget your troubles and chat!</h3></center>
<hr>
<div class="container">
	<center>
		<?php echo $response; ?>
	</center>
	<span style="text-align:right;">
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		<input type="submit" name="quit" value="Log Out!" class="btn btn-info" >
		</form>
	</span>
</div>
<hr>
<center>
<div class="container" id="chatbox" style="overflow-y:auto; word-wrap:break-word; overflow-x:auto; width:600px; height:500px; position:relative; border:3px solid blue;"></div>
<br>
<div>
	<span>
		<input type="text" id="chatsend" style="width:400px;" onkeyup="if(event.keyCode == 13)document.getElementById('send').click();" onclick="document.getElementById('chatbox').scrollTop = document.getElementById('chatbox').scrollHeight;" onkeypress="document.getElementById('chatbox').scrollTop = document.getElementById('chatbox').scrollHeight;" >
	</span>
	<span>
		<button onclick="send();" id="send" class="btn btn-primary">Send</button>
	</span>
</div>
</center>
<hr>
<div class="container">
	<span id="response"></span>
</div>
</body>
</html>