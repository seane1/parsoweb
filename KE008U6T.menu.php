<div class="topmenu">
<?php
	if(!empty($_SESSION["Name"])){
		echo "
			<form class='logout' action='login.php' method='post'>
			<button type='submit'>Log Out</button>
			</form>
			<a class='toplink' href='account.php'>My Account</a>
		";
		echo "<div class='welcome'>Hello " . $_SESSION["Name"] . "</div>";
	}
	else{
		echo "
			<a class='toplink' href='login.php'>Log In/Join</a>
		";
		
	}
?>
</div>
<div class="search">
<a href="index.php"><img src="logo.jpg"></a>
<form class="searchbar" action="search.php" method="get"><button class="sbutton" type="submit">Search</button><input type="text" placeholder="Search for books by title / author / genre" name="search"></form>
</div>
<div class="menu">
<a class="basketlink" href="basket.php">Basket</a>
<div class="total">$
<?php
if(isset($_SESSION["Total"])){
	echo $_SESSION["Total"];
}
else{
	$_SESSION["Total"] = '0.00';
	echo $_SESSION["Total"];
}
?>
</div>
<div class="drop">
<button class="button">Books</button>
<div class="dropdown">
<a href="#">Architecture</a>
<a href="#">Crime</a>
<a href="#">Economics</a>
<a href="fantasy.php">Fantasy</a>
<a href="history.php">History</a>
<a href="#">Modern Literature</a>
<a href="#">Philosophy</a>
<a href="#">Politics</a>
<a href="scifi.php">Sci Fi</a>
<a href="#">Science</a>
</div>
</div>
<a class="mlink" href="contact.php">Contact</a>
<a class="mlink" href="about.php">About</a>
</div>
