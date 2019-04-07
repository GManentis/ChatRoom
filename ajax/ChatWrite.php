<?php

session_start();

if(isset($_POST["send"]) && !ctype_space($_POST["send"]) && $_POST["send"] != "" && isset($_SESSION["user"]))
{		$_POST["send"] = strip_tags($_POST["send"]);
		$message = "<b>[</b>".date("Y-m-d h:i:sa")."<b>]</b>"." "."<b>".$_SESSION["user"]."</b>"." said: "."<p>".$_POST["send"]."</p><br>".PHP_EOL;
		$file = fopen("Chat.txt","a+") or die("Error");
		fwrite($file, $message);
		fclose($file);
		echo "<h3 style='color:red;'Message sent</h3>";
}
else
{
	echo "<centeR><h3 style='color:red;'>Please write a message before you send!</h3></center>";
}

?>