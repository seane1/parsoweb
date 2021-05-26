<div class="topmenu">
<?php
	if(!empty($_SESSION["Name"])){
		echo "
			<form class='logout' action='/bookstore/login.php' method='post'>
			<button type='submit'>Log Out</button>
			</form>
			<a class='mlink' id='my' href='/bookstore/account.php'>My Account</a>
		";
		echo "<div class='welcome'>Welcome " . $_SESSION["Name"] . "</div>";
	}
?>
</div>