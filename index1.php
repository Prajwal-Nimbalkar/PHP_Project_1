<html>
<head><title>Login</title>

<style>
body
{
	background: #1690A7;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}

*
{
	font-family: sans-serif;
	box-sizing: border-box;
}

form
{
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background:#fff;
	border-radius: 15px;
}

h2
{
	text-align: center;
	margin-bottom: 20px;
}

#t1,#t2
{
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px;
	border-radius: 5px;
}

label
{
	color: #888;
	font-size: 18px;
	padding: 10px;
}

input[type="submit"],input[type="button"]
{
	//margin-left:180px;
	background-color: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-radius: 10px;
	border: none;
}
#btn1
{
	margin-left: 100px;
	
}
#btn2
{
	margin-left: 80px;
}
a
{
	color: #fff;
	text-decoration: none;
}

#result
{
	color: red;
	margin-left: 100px;
	//margin-top: -20px;
}
</style>
</head>
	<body>
		<form action="login.php" method="post">
		<h2>LOGIN</h2>
		<div id="result"></div>
			<label>User Name</label>
			<input type="text" name="t1" id="t1" placeholder="User Name" required><br>
			<label>Password</label>
		<input type="password" name="t2" id="t2" placeholder="Password" required><br>
			
			<input type="submit" id="btn1"  value="SUBMIT">
			<a href="newuser.html"><input type="button" id="btn2" value="NEW USER"></a>
			
		</form>
	</body>
</html>