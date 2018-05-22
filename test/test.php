<html>
	<body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
	
	

		function adduser()
		{

			var XMLHttpRequestObject = false

			try{
				// Opera 8.8+, Firefox, Safari
				XMLHttpRequestObject = new XMLHttpRequest();
			}catch (e){

				// Internet explorer
				try{
					XMLHttpRequestObject = new ActiveXObject("Msxml2.XMLHTTP");
				}catch (e) {
					try{
						XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
					}catch (e) {

						//un pprobleme est survenu
						alert("Votre navigateur ne fonctionne pas!");
						return false;

					}
				}
			}
			
			
			if(XMLHttpRequestObject){
				
		
			
				XMLHttpRequestObject.open("POST","ajax.php");

				XMLHttpRequestObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

				XMLHttpRequestObject.onreadystatechange = function(){
					if(XMLHttpRequestObject.readyState == 4){
						var returnData = XMLHttpRequestObject.responseText;

						processAdd(returnData);
					}
				}

				var userid = document.getElementById('userid').value;
				var password = document.getElementById('password').value;

				var data = userid + '|' + password + '|';

				XMLHttpRequestObject.send("data=" + data);
			}	

			return false;
		}	
		
		function processAdd(returnedData)
		{
			var validusersDiv = document.getElementById('validusers');

			validusersDiv.innerHTML = returnedData;

			return false;
		}	
		
			
		</script>
		
		<h1> Page AJAX</h1>
		<form name='myForm'>
		user : <input type='text' id='userid' /> <br/> <br/>
		password : <input type='text' id='password' /> <br/> <br/>
		<br/> <br/>
		<input type='button' value='add user' onclick='adduser()'>
		</form>
		<div id='validusers'></div><br/>
		<div id='errordiv'></div><br/>
	</body>
</html>