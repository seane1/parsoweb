<?php
include 'tools.php';

if(!empty($_POST)){
	if (isset($_POST['session-reset'])) {
		session_unset(); 
	}else{
		$nameinput = $_POST['cust']['name'];
		$emailinput = $_POST['cust']['email'];
		$mobileinput = $_POST['cust']['mobile'];
		$cardinput = $_POST['cust']['card'];
		$expiryinput = $_POST['cust']['expiry']; 
		$forward = true;
		try{
			if(!isset($moviesObject[$_POST['movie']['id']])){
				throw new Exception("Stop hacking our website!");
			}
			if(!isset($_POST['seats']) || !is_array($_POST['seats']) || !(count($_POST['seats'] > 0))){
				throw new Exception("Stop hacking our website!");
			}else{
				$totalSeats=0;
				foreach( $_POST['seats'] as $seatCode => $qty ) {
					if ( !isset($pricesObject['disc'][$seatCode])) {
						throw new Exception("Stop hacking our website!");
					} else if (!preg_match("/^[0-9]$/",$qty)){
						throw new Exception("Stop hacking our website!");
					} else {
						$totalSeats += $qty;
					}
				}
			}
			if ($totalSeats <= 0){
				throw new Exception("Stop hacking our website!"); 
			}
		}
		catch(Exception $e) {
			echo 'Message: ' .$e->getMessage();
			$forward = false;
		}
		try{
			if(empty($_POST['cust']['name']) || !preg_match("/^[a-zA-Z \-.']{1,100}$/", $_POST['cust']['name'])){
				throw new Exception("Name must be non-empty and alpha characters"); 
			}
		}
		catch(Exception $e) {
			$nameerror = $e->getMessage();
			$forward = false;
		}
		try{
			if(empty($_POST['cust']['email']) || !filter_var($_POST['cust']['email'], FILTER_VALIDATE_EMAIL)){	
				throw new Exception("Email must be valid"); 
			}
		}
		catch(Exception $e) {
			$emailerror = $e->getMessage();
			$forward = false;
		}
		try{
			if(empty($_POST['cust']['mobile']) || !preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/", $_POST['cust']['mobile'])){
				throw new Exception("Mobile number must be valid Australian"); 
			}
		}
		catch(Exception $e) {
			$mobileerror = $e->getMessage();
			$forward = false;
		}
		try{
			if(empty($_POST['cust']['card']) || !preg_match("/^( ?\d ?){14,19}$/", $_POST['cust']['card'])){
				throw new Exception("Credit card must be valid, 14 - 19 numbers"); 
			}
		}
		catch(Exception $e) {
			$carderror = $e->getMessage();
			$forward = false;
		}
		try{
			if(empty($_POST['cust']['expiry']) || !preg_match("/^(\d){4}[\-](\d){2}$/", $_POST['cust']['expiry'])){
				throw new Exception("Expiry must be YYYY-MM format"); 
			}
		}
		catch(Exception $e) {
			$expiryerror = $e->getMessage();
			$forward = false;
		}
		
		if($forward){
			$_SESSION = $_POST;
			$_SESSION['date'] = date("j/m/y");
			calculateprice();
			writetofile();
			header("Location: receipt.php");
		}
	}
}

?>
<?php
	include 'header.php';
?>
<nav>
	<a href="#about">About Us</a>
	<a href="#prices">Prices</a>
	<a href="#showing">Now Showing</a>
</nav>
<main>
<section id="about">
<h2>Welcome to Lunardo Cinemas!</h2>
<img src="media/photo-1517604931442-7e0c8ed2963c.jfif" alt="Photograph of filled cinema">
<p>We have reopened after <strong>extensive improvements and renovations</strong>.</p>
<p>Enjoy our <strong>new seating options</strong>: standard and reclinable first class.</p>
<p>Our projection and sound systems have been upgraded with <strong>3D Dolby Vision</strong> projection and <strong>Dolby Atmos sound</strong>.</p> 
<p>Dolby Cinema provides a <strong>Total Cinema Experience</strong>, through dramatic imaging, moving audio, and innovative seating.</p>
	<div class="seatimgs">
	<figure>
	<img src="media/Profern-Standard-Twin.png" alt="Photograph of standard cinema seating">
	<figcaption><strong>Our Standard Cinema Seating</strong></figcaption>
	</figure>
	<figure>
	<img src="media/Profern-Verona-Twin.png" alt="Photograph of first class seating">
	<figcaption><strong>Our First Class Cinema Seating</strong></figcaption>
	</figure>
	</div>
</section>
<section id="prices">
<h2>Our Prices</h2>
	<table>
		<tr>
		<td>Seat Type</td>
		<td class="seat">Seat Code</td>
		<td>Monday & Tuesday and 12pm on Wednesday, Thursday & Friday</td>
		<td>Saturday & Sunday and after 12pm on Wednesday, Thursday & Friday</td>
		</tr>
		<tr>
		<td>Standard Adult</td>
		<td class="seat">STA</td>
		<td>15.00</td>
		<td>20.50</td>
		</tr>
		<tr>
		<td>Standard Concession</td>
		<td class="seat">STP</td>
		<td>13.00</td>
		<td>18.00</td>
		</tr>
		<tr>
		<td>Standard Child</td>
		<td class="seat">STC</td>
		<td>11.00</td>
		<td>15.50</td>
		</tr>
		<tr>
		<td>First Class Adult</td>
		<td class="seat">FCA</td>
		<td>25.00</td>
		<td>30.00</td>
		</tr>
		<tr>
		<td>First Class Concession</td>
		<td class="seat">FCP</td>
		<td>23.00</td>
		<td>27.50</td>
		</tr>
		<tr>
		<td>First Class Child</td>
		<td class="seat">FCC</td>
		<td>21.00</td>
		<td>25.00</td>
		</tr>
	</table>
</section>
<section id="showing">
<h2>Now Showing</h2>
<div class="container">
	<a href="#synopsis" class="panel" id="panelACT" onclick="panelchange('ACT',this)">
		<img src="media/star-wars-rise-of-skywalker.jpg" alt="Star Wars: Rise of Skywalker Movie Poster">
		<h3>Star Wars: The Rise of Skywalker M</h3>
		<ul>
		<li>Mon - 12pm</li>
		<li>Tue - 12pm</li>
		<li>Wed - 6pm</li>
		<li>Thu - 6pm</li>
		<li>Fri - 6pm</li>
		<li>Sat - 12pm</li>
		<li>Sun - 12pm</li>
		</ul>
	</a>
	<a href="#synopsis" class="panel" id="panelANM" onclick="panelchange('ANM', this)">
		<img src="media/frozen-2.jfif" alt="Frozen 2 Movie Poster">
		<h3>Frozen 2 PG</h3>
		<ul>
		<li>Mon -</li>
		<li>Tue -</li>
		<li>Wed - 9pm</li>
		<li>Thu - 9pm</li>
		<li>Fri - 9pm</li>
		<li>Sat - 6pm</li>
		<li>Sun - 6pm</li>
		</ul>
	</a>
	<a href="#synopsis" class="panel" id="panelRMC" onclick="panelchange('RMC', this)">
		<img src="media/aeronauts.jfif" alt="The Aeronauts Movie Poster">
		<h3>The Aeronauts PG</h3>
		<ul>
		<li>Mon - 6pm</li>
		<li>Tue - 6pm</li>
		<li>Wed -</li>
		<li>Thu -</li>
		<li>Fri -</li>
		<li>Sat - 3pm</li>
		<li>Sun - 3pm</li>
		</ul>
	</a>
	<a href="#synopsis" class="panel" id="panelAHF" onclick="panelchange('AHF', this)">
		<img src="media/jojo-rabbit.jfif" alt="JoJo Rabbit Movie Poster">
		<h3>JoJo Rabbit M</h3>
		<ul>
		<li>Mon -</li>
		<li>Tue -</li>
		<li>Wed - 12pm</li>
		<li>Thu - 12pm</li>
		<li>Fri - 12pm</li>
		<li>Sat - 9pm</li>
		<li>Sun - 9pm</li>
		</ul>
	</a>
</div>
<div id="synopsis">
<div class="synopsis hide" id="synopsisACT">
		<h3>Star Wars: The Rise of Skywalker M</h3>
		<p>Lucasfilm and director J.J. Abrams join forces once again to take viewers on an epic journey to a galaxy far, far away with Star Wars: The Rise of Skywalker, the riveting conclusion of the seminal Skywalker saga, where new legends will be born and the final battle for freedom is yet to come.</p>
		<video height="200px" width="200px" controls><source src="media/star-wars-the-rise-of-skywalker-trailer-2_h480p.mov" type="video/mp4">Your browser does not support the video tag.</video>
		<div class="buttons" id="ACT">
		<button onclick="updateform('Monday', '12pm', this)">Mon - 12pm</button>
		<button onclick="updateform('Tuesday', '12pm', this)">Tue - 12pm</button>
		<button onclick="updateform('Wednesday', '6pm', this)">Wed - 6pm</button>
		<button onclick="updateform('Thursday', '6pm', this)">Thu - 6pm</button>
		<button onclick="updateform('Friday', '6pm', this)">Fri - 6pm</button>
		<button onclick="updateform('Saturday', '12pm', this)">Sat - 12pm</button>
		<button onclick="updateform('Sunday', '12pm', this)">Sun - 12pm</button>
		</div>
</div>
<div class="synopsis hide" id="synopsisANM">
		<h3>Frozen 2 PG</h3>
		<p>Elsa the Snow Queen has an extraordinary gift -- the power to create ice and snow. But no matter how happy she is to be surrounded by the people of Arendelle, Elsa finds herself strangely unsettled. After hearing a mysterious voice call out to her, Elsa travels to the enchanted forests and dark seas beyond her kingdom -- an adventure that soon turns into a journey of self-discovery.</p>
		<video height="200px" width="200px" controls><source src="media/frozen-2-trailer-1_h480p.mov" type="video/mp4">Your browser does not support the video tag.</video>
		<div class="buttons" id="ANM">
		<button onclick="updateform('Wednesday', '9pm', this)">Wed - 9pm</button>
		<button onclick="updateform('Thursday', '9pm', this)">Thu - 9pm</button>
		<button onclick="updateform('Friday', '9pm', this)">Fri - 9pm</button>
		<button onclick="updateform('Saturday', '6pm', this)">Sat - 6pm</button>
		<button onclick="updateform('Sunday', '6pm', this)">Sun - 6pm</button>
		</div>
</div>
<div class="synopsis hide" id="synopsisRMC">
		<h3>The Aeronauts PG</h3>
		<p>In 1862 headstrong scientist James Glaisher and wealthy young widow Amelia Wren mount a balloon expedition to fly higher than anyone in history. As their perilous ascent reduces their chances of survival, the unlikely duo soon discover things about themselves -- and each other -- that help both of them find their place in the world.</p>
		<video height="200px" width="200px" controls><source src="media/the-aeronauts-trailer-1_h480p.mov" type="video/mp4">Your browser does not support the video tag.</video>
		<div class="buttons" id="RMC">
		<button onclick="updateform('Monday', '6pm', this)">Mon - 6pm</button>
		<button onclick="updateform('Tuesday', '6pm', this)">Tue - 6pm</button>
		<button onclick="updateform('Saturday', '3pm', this)">Sat - 3pm</button>
		<button onclick="updateform('Sunday', '3pm', this)">Sun - 3pm</button>
		</div>
</div>
<div class="synopsis hide" id="synopsisAHF">
		<h3>JoJo Rabbit M</h3>
		<p>Jojo is a lonely German boy who discovers that his single mother is hiding a Jewish girl in their attic. Aided only by his imaginary friend -- Adolf Hitler -- Jojo must confront his blind nationalism as World War II continues to rage on.</p>
		<video height="200px" width="200px" controls><source src="media/jojo-rabbit-trailer-1_h480p.mov" type="video/mp4">Your browser does not support the video tag.</video>
		<div class="buttons" id="AHF">
		<button onclick="updateform('Wednesday', '12pm', this)">Wed - 12pm</button>
		<button onclick="updateform('Thursday', '12pm', this)">Thu - 12pm</button>
		<button onclick="updateform('Friday', '12pm', this)">Fri - 12pm</button>
		<button onclick="updateform('Saturday', '9pm', this)">Sat - 9pm</button>
		<button onclick="updateform('Sunday', '9pm', this)">Sun - 9pm</button>
		</div>
</div>
</div>
<div class="booking">
	<form action="index.php" method="post" onsubmit="return validate()">
	<h3 id="movietitle">Movie - day - time</h3>
		<input name="movie[id]" id="movie[id]" type="hidden">
		<input name="movie[day]" id="movie[day]" type="hidden">
		<input name="movie[hour]" id="movie[hour]" type="hidden">
		<fieldset class="standard">
		<legend>Standard</legend>
		<p>
		<label for="seats[STA]">Adults</label>
		<select name="seats[STA]" id="seats[STA]" onchange="updateprice('seats[STA]')">
			<option value=0>Please Select</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>
		</select>
		</p>
		<p>
		<label for="seats[STP]">Concession</label>
		<select name="seats[STP]" id="seats[STP]" onchange="updateprice('seats[STP]')">
			<option value=0>Please Select</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>
		</select>
		</p>
		<p>
		<label for="seats[STC]">Children</label>
		<select name="seats[STC]" id="seats[STC]" onchange="updateprice('seats[STC]')">
			<option value=0>Please Select</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>
		</select>
		</p>
		</fieldset>
		<fieldset class="first">
		<legend>First Class</legend>
		<p>
		<label for="seats[FCA]">Adults</label>
		<select name="seats[FCA]" id="seats[FCA]" onchange="updateprice('seats[FCA]')">
			<option value=0>Please Select</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>		
		</select>
		</p>
		<p>
		<label for="seats[FCP]">Concession</label>
		<select name="seats[FCP]" id="seats[FCP]" onchange="updateprice('seats[FCP]')">
			<option value=0>Please Select</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>		
		</select>
		</p>
		<p>
		<label for="seats[FCC]">Children</label>
		<select name="seats[FCC]" id="seats[FCC]" onchange="updateprice('seats[FCC]')">
			<option value=0>Please Select</option>
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>
			<option value=5>5</option>
			<option value=6>6</option>
			<option value=7>7</option>
			<option value=8>8</option>
			<option value=9>9</option>		
		</select>
		</p>
		</fieldset>
		<fieldset class="customer">
		<legend>Customer</legend>
		<p><label for="cust[name]">Name</label><input name="cust[name]" id="cust[name]" type="text" placeholder="Jane Doe" pattern="[a-zA-Z \-.']{1,100}" oninvalid="inserterror('nameerror')" required value="<?php if(isset($nameinput)){echo $nameinput;}?>"></p>
		<p class="error" id="nameerror"><?php if(isset($nameerror)){echo $nameerror;}?></p>
		<p><label for="cust[email]">Email</label><input name="cust[email]" id="cust[email]" type="email" placeholder="example@lunardo.com" oninvalid="inserterror('emailerror')" required value="<?php if(isset($emailinput)){echo $emailinput;}?>"></p>
		<p class="error" id="emailerror"><?php if(isset($emailerror)){echo $emailerror;}?></p>
		<p><label for="cust[mobile]">Mobile</label><input name="cust[mobile]" id="cust[mobile]" type="tel" placeholder="+614555 55555" pattern="(\(04\)|04|\+614)( ?\d){8}" oninvalid="inserterror('mobileerror')" required value="<?php if(isset($mobileinput)){echo $mobileinput;}?>"></p>
		<p class="error" id="mobileerror"><?php if(isset($mobileerror)){echo $mobileerror;}?></p>
		<p><label for="cust[card]">Credit Card</label><input name="cust[card]" id="cust[card]" type="text" placeholder="---- ---- ---- ----" pattern="( ?\d ?){14,19}" oninvalid="inserterror('creditcarderror')" required value="<?php if(isset($cardinput)){echo $cardinput;}?>"></p>
		<p class="error" id="creditcarderror"><?php if(isset($carderror)){echo $carderror;}?></p>
		<p><label for="cust[expiry]">Expiry</label><input name="cust[expiry]" id="cust[expiry]" type="month" placeholder="YYYY-MM" pattern="(\d){4}[\-](\d){2}" oninvalid="inserterror('expiryerror')" required value="<?php if(isset($expiryinput)){echo $expiryinput;}?>"></p>
		<p class="error" id="expiryerror"><?php if(isset($expiryerror)){echo $expiryerror;}?></p>
		</fieldset>
		<div class="submit">
		<p class="error" id="movieerror"></p>
		<p>Total $<span id="total">0.0</span>
		<input name="order" id="order" type="submit" value="Order">
		</p>
		</div>
		</form>
</div>
</section>
</main>
<?php
	include 'footer.php';
?>