<?php
session_start();
if(isset($_SESSION["user"]))
{
	if(filesize("Chat.txt") != 0)
	{
		$myfile = fopen("Chat.txt", "r+") or die("Unable to open file!");
		$raspa = fread($myfile,filesize("Chat.txt"));
		echo $raspa;
		fclose($myfile);
	}
	else
	{
		echo "<p style = \"color:red;\"> The conversation hasn't started!Start now!</p> ";
	}
	
		
}
else
{
	echo "<p style = \"color:red;\"> You must be a member to join the conversation!</p> ";
}

?>