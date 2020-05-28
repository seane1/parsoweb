<?php
  session_start();

// Put your PHP functions and modules here
$moviesObject = [
	'ACT' => ['title' => 'Star Wars: The Rise of Skywalker', 'rating' => 'M', 'screenings' => ['Monday' => '12pm', 'Tuesday' => '12pm', 'Wednesday' => '6pm', 'Thursday' => '6pm', 'Friday' => '6pm', 'Saturday' => '12pm', 'Sunday' => '12pm']],
	'RMC' => ['title' => 'The Aeronauts', 'rating' => 'PG', 'screenings' => ['Monday' => '6pm', 'Tuesday' => '6pm', 'Saturday' => '3pm', 'Sunday' => '3pm']],
	'ANM' => ['title' => 'Frozen 2', 'rating' => 'PG', 'screenings' => ['Wednesday' => '9pm', 'Thursday' => '9pm', 'Friday' => '9pm', 'Saturday' => '6pm', 'Sunday' => '6pm']],
	'AHF' => ['title' => 'JoJo Rabbit', 'rating' => 'M', 'screenings' => ['Wednesday' => '12pm', 'Thursday' => '12pm', 'Friday' => '12pm', 'Saturday' => '9pm', 'Sunday' => '9pm']]
];
$pricesObject = [
	'full' => ['STA' => 20.50,'STP' => 18.00,'STC' => 15.50,'FCA' => 30.00,'FCP' => 27.50,'FCC' => 25.00],
	'disc' => ['STA' => 15.00,'STP' => 13.00,'STC' => 11.00,'FCA' => 25.00,'FCP' => 23.00,'FCC' => 21.00]
];	
function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
    return $ret;
  else 
    echo $ret; 
}
function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre id='mycode'><ol>";
  foreach ($lines as $line)
     echo '<li>'.rtrim(htmlentities($line)).'</li>';
  echo '</ol></pre>';
}
function debug(){
	echo "<div class='debug'>";
	preShow($_POST);
	preShow($_GET);
	preShow($_SESSION);
	printMyCode();
	echo "<form action='index.php' method='post'>
			<p><input type='submit' name='session-reset' value='Reset the session' ></p>
		</form>";
	echo '</div>';
}
function calculateprice(){
	global $pricesObject;
	$STA = $_SESSION['seats']['STA'];
	$STP = $_SESSION['seats']['STP'];
	$STC = $_SESSION['seats']['STC'];
	$FCA = $_SESSION['seats']['FCA'];
	$FCP = $_SESSION['seats']['FCP'];
	$FCC = $_SESSION['seats']['FCC'];
	
	if($_SESSION['movie']['day'] == 'Monday' || $_SESSION['movie']['day'] == 'Tuesday' || ($_SESSION['movie']['hour']=='12pm' && ($_SESSION['movie']['day'] == 'Wednesday' || $_SESSION['movie']['day'] == 'Thursday' || $_SESSION['movie']['day'] == 'Friday'))){
		$STA = $pricesObject['disc']['STA']*$STA;
		$STP = $pricesObject['disc']['STP']*$STP;
		$STC = $pricesObject['disc']['STC']*$STC;
		$FCA = $pricesObject['disc']['FCA']*$FCA;
		$FCP = $pricesObject['disc']['FCP']*$FCP;
		$FCC = $pricesObject['disc']['FCC']*$FCC;
	}else if($_SESSION['movie']['day'] == 'Saturday' || $_SESSION['movie']['day'] == 'Sunday' || ($_SESSION['movie']['hour']!='12pm' && ($_SESSION['movie']['day'] == 'Wednesday' || $_SESSION['movie']['day'] == 'Thursday' || $_SESSION['movie']['day'] == 'Friday'))){
		$STA = $pricesObject['full']['STA']*$STA;
		$STP = $pricesObject['full']['STP']*$STP;
		$STC = $pricesObject['full']['STC']*$STC;
		$FCA = $pricesObject['full']['FCA']*$FCA;
		$FCP = $pricesObject['full']['FCP']*$FCP;
		$FCC = $pricesObject['full']['FCC']*$FCC;
	}
	$_SESSION['total'] = number_format($STA + $STP + $STC + $FCA + $FCP + $FCC,2);
	$_SESSION['gst'] = number_format($_SESSION['total']/11,2);
}
function writetofile(){
		$order = array_merge(
			[$_SESSION['date']],
			[$_SESSION['cust']['name']],
			[$_SESSION['cust']['email']],
			[$_SESSION['cust']['mobile']],
			$_SESSION['movie'],
			$_SESSION['seats'],
			[$_SESSION['total']]
		);
		
		$fp = fopen("bookings.txt", "a");
		flock($fp, LOCK_EX);
		fputcsv($fp, $order, "\t");
		flock($fp, LOCK_UN);
		fclose($fp);
}
?>