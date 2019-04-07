function send() 
{	
	try {				
		var xmlhttp;

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
			// most browsers
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			// internet explorer
		}
		
		var send = document.getElementById("chatsend").value;
		
		xmlhttp.onreadystatechange = function() {			
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var strOut;			
				strOut = xmlhttp.responseText;
				document.getElementById("response").innerHTML = strOut;
				document.getElementById("chatsend").value = "";
			}
		}
		xmlhttp.open("POST", "ajax/ChatWrite.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");			
		xmlhttp.send("send="+send);
	}
	catch(err) {
		alert(err);
	}
}

function showtime()
{
	setInterval(function() {	
		try {				
			var xmlhttp;

			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				// most browsers
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				// internet explorer
			}

			xmlhttp.onreadystatechange = function() {			
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var strOut;			
					strOut = xmlhttp.responseText;
					var chatbox = document.getElementById('chatbox');
					chatbox.innerHTML = strOut;
					chatbox.onunload = function(){ chatbox.scrollTo(0,0); }
					//chatbox.onunload = function(){ chatbox.scrollTo(0,0); }
				}
			}
			xmlhttp.open("POST", "ajax/ChatRead.php", true);
			xmlhttp.send();
		}
		catch(err) {
			alert(err);
		}
	},3000);

}

function welcome()
{
	try {				
			var xmlhttp;

			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
				// most browsers
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				// internet explorer
			}

			xmlhttp.onreadystatechange = function() {			
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var strOut;			
					strOut = xmlhttp.responseText;
					var chatbox = document.getElementById('chatbox');
					chatbox.innerHTML = strOut;
					chatbox.scrollTop = chatbox.scrollHeight;
					//chatbox.onunload = function(){ chatbox.scrollTo(0,0); }
				}
			}
			xmlhttp.open("POST", "ajax/ChatRead.php", true);
			xmlhttp.send();
		}
		catch(err) {
			alert(err);
		}
}

function show()
{
	welcome();
	showtime();
}