<?php
	include 'tools.php';
	include 'header.php';
	
	if(!$_SESSION){
		header("Location: index.php");
	}
?>
<nav>
	<a href="index.php">Lunardo Home</a>
</nav>
<main>
<div class="receipt">
<h2>Receipt: Lunardo Cinema</h2>
<p>ABN: 123 456 789<span class="date"><?=$_SESSION['date']?></span></p>

<p>Name: <?=$_SESSION['cust']['name']?></p>
<p>Email: <?=$_SESSION['cust']['email']?></p>
<p>Phone: <?=$_SESSION['cust']['mobile']?></p>

<p>Movie ID: <?=$_SESSION['movie']['id']?></p>
<p>Day: <?=$_SESSION['movie']['day']?></p>
<p>Time: <?=$_SESSION['movie']['hour']?></p>
<div class="seatsdiv">
<div>
<table>
	<tr>
		<th>STA</th>
		<th>STP</th>
		<th>STC</th>
		<th>FCA</th>
		<th>FCP</th>
		<th>FCC</th>
	</tr>
	<tr>
		<td><?=$_SESSION['seats']['STA']?></td>
		<td><?=$_SESSION['seats']['STP']?></td>
		<td><?=$_SESSION['seats']['STC']?></td>
		<td><?=$_SESSION['seats']['FCA']?></td>
		<td><?=$_SESSION['seats']['FCP']?></td>
		<td><?=$_SESSION['seats']['FCC']?></td>
	</tr>
</table>
</div>
<div class="total">
<p>Total: $<?=$_SESSION['total']?></p>
<p>GST: $<?=$_SESSION['gst']?></p>
</div>
</div>
</div>
<div class="ticket">
<div class="item1">
<h3>Lunardo Cinema - Group Ticket</h3>
<?php
global $moviesObject;
echo $moviesObject[$_SESSION['movie']['id']]['title']." ";
echo $moviesObject[$_SESSION['movie']['id']]['rating'];
?>
<p>Day: <?=$_SESSION['movie']['day']?></p>
<p>Time: <?=$_SESSION['movie']['hour']?></p>
</div>
<div class="item2">
<p>Standard Adult: <?=$_SESSION['seats']['STA']?></p>
<p>Standard Pensioner: <?=$_SESSION['seats']['STP']?></p>
<p>Standard Child: <?=$_SESSION['seats']['STC']?></p>
<p>First Class Adult: <?=$_SESSION['seats']['FCA']?></p>
<p>First Class Pensioner: <?=$_SESSION['seats']['FCP']?></p>
<p>First Class Child: <?=$_SESSION['seats']['FCC']?></p>
</div>
</div>
</main>
<?php
	include 'footer.php';
?>