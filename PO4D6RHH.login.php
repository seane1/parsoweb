<?php 
include 'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	session_unset();
	session_destroy();
}
?>
<title>Log In</title>
</head>
<body>
<?php
include 'menu.php';
?>
<div class="main" id='login'>
<?php 
	if(!empty($_SESSION["Name"])){
		echo "<p>Welcome " . $_SESSION["Name"] . ". Log in as a different user below.</p>";
	}
?>
<div class="forms">
<form action='index.php' method='post'>
<h3>Log In</h3>
<p><input type='text' name='email' placeholder='Email'><br>
<input type='password' name='password' placeholder='Password'><br>
</p>
<p><button class='sbutton' type='submit'>Log In</button></p>
</form>
<form action='register.php' method='post'>
<h3>Join</h3>
<p><input type='text' name='name' placeholder='Name'><br>
<input type='text' name='email' placeholder='Email'><br>
<input type='password' name='password' placeholder='Password'><br>
</p>
<p><button class='sbutton' type='submit'>Join</button></p>
</form>
</div>
<?php
include 'footer.php';
?>
