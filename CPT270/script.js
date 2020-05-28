/* Insert your javascript here */
var movietime = 0;
var movieday = "";
var movietitle = "";
var movies = {ACT:"Star Wars: The Rise of Skywalker M", ANM:"Frozen 2 PG", RMC:"The Aeronauts PG", AHF:"JoJo Rabbit M"};
var sta = 0;
var stp = 0;
var stc = 0;
var fca = 0;
var fcp = 0;
var fcc = 0;
window.onscroll = function(){
	var navlinks = document.getElementsByTagName('nav')[0].getElementsByTagName('a');
	var sections = document.getElementsByTagName('section');
	for (var i = 0; i < sections.length; i++){
		var sectop = sections[i].offsetTop-58;
		var secbot = sections[i].offsetTop+sections[i].offsetHeight-58;
		if(window.scrollY >= sectop && window.scrollY < secbot){
			navlinks[i].classList.add('current');
		} else{
			navlinks[i].classList.remove('current');
		}
	}
}
function panelchange(id, panel){
	var synopses = document.getElementsByClassName("synopsis");
	var panels = document.getElementsByClassName("panel");
	
	if(document.getElementById("synopsis"+id+"").classList.contains("hide")){
		for(var i = 0; i < synopses.length; i++){
			synopses[i].classList.add("hide");
		}
		for(var i = 0; i < panels.length; i++){
			panels[i].classList.remove("active");
		}
		document.getElementById("synopsis"+id+"").classList.remove("hide");
		panel.classList.add("active");
	}
	else{
		for(var i = 0; i < synopses.length; i++){
			synopses[i].classList.add("hide");
		}
		for(var i = 0; i < panels.length; i++){
			panels[i].classList.remove("active");
		}
	}
}
function updateform(day, time, movie){
	var z = movie.parentElement.id;
	if(z == "ACT"){
		movietitle = movies.ACT;
		document.getElementById("movie[id]").value = "ACT";
	}else if(z == "ANM"){
		movietitle = movies.ANM;
		document.getElementById("movie[id]").value = "ANM";
	}else if(z == "RMC"){
		movietitle = movies.RMC;
		document.getElementById("movie[id]").value = "RMC";
	}else if(z == "AHF"){
		movietitle = movies.AHF;
		document.getElementById("movie[id]").value = "AHF";
	}
	document.getElementById("movietitle").innerHTML = movietitle + ": " + day + " - " + time;
	movietime = time;
	document.getElementById("movie[hour]").value = time;
	movieday = day;
	document.getElementById("movie[day]").value = day;
	sta = 0;
	stp = 0;
	stc = 0;
	fca = 0;
	fcp = 0;
	fcc = 0;
	document.getElementById("total").innerHTML = sta + stp + stc + fca + fcp + fcc;
	document.getElementById("seats[STA]").value = 0;
	document.getElementById("seats[STP]").value = 0;
	document.getElementById("seats[STC]").value = 0;
	document.getElementById("seats[FCA]").value = 0;
	document.getElementById("seats[FCP]").value = 0;
	document.getElementById("seats[FCC]").value = 0;
	console.log(movietime, movieday, movietitle);
}
function updateprice(priceid){
	var tickquant = document.getElementById(priceid).value;
	var time = document.getElementById("movie[hour]").value;
	var day = document.getElementById("movie[day]").value;
	if(day == "Monday" || day == "Tuesday" || (((day == "Wednesday")||(day == "Thursday")||(day == "Friday"))&&(time=="12pm"))){
		switch(priceid){
			case "seats[STA]":
			sta = tickquant*15.00;
			break;
			case "seats[STP]":
			stp = tickquant*13.00;
			break;
			case "seats[STC]":
			stc = tickquant*11.00;
			break;
			case "seats[FCA]":
			fca = tickquant*25.00;
			break;
			case "seats[FCP]":
			fcp = tickquant*23.00;
			break;
			case "seats[FCC]":
			fcc = tickquant*21.00;
			break;
		}
	}else if(day == "Saturday" || day == "Sunday" || (((day == "Wednesday")||(day == "Thursday")||(day == "Friday"))&&((time=="6pm")||(time=="9pm")))){
		switch(priceid){
			case "seats[STA]":
			sta = tickquant*20.50;
			break;
			case "seats[STP]":
			stp = tickquant*18.00;
			break;
			case "seats[STC]":
			stc = tickquant*15.50;
			break;
			case "seats[FCA]":
			fca = tickquant*30.00;
			break;
			case "seats[FCP]":
			fcp = tickquant*27.50;
			break;
			case "seats[FCC]":
			fcc = tickquant*25.00;
			break;
		}
	}
	document.getElementById("total").innerHTML = sta + stp + stc + fca + fcp + fcc;
}
function validate(){
	if(movietitle==""){
		document.getElementById("movieerror").innerHTML = "Please pick a movie and session!";
		setTimeout(function(){document.getElementById("movieerror").innerHTML = ""},5000);
		return false;
	}
	if(	document.getElementById("seats[STA]").value == 0 &&
	document.getElementById("seats[STP]").value == 0 &&
	document.getElementById("seats[STC]").value == 0 &&
	document.getElementById("seats[FCA]").value == 0 &&
	document.getElementById("seats[FCP]").value == 0 &&
	document.getElementById("seats[FCC]").value == 0){
		document.getElementById("movieerror").innerHTML = "Please choose number of seats!";
		setTimeout(function(){document.getElementById("movieerror").innerHTML = ""},5000);
		return false;
	}
	var d = new Date();
	var year = d.getFullYear();
	var month = d.getMonth();
	var customerdate = document.getElementById("cust[expiry]").value;
	var customeryear = customerdate.slice(0,4);
	var customermonth = customerdate.slice(5,7);
	var customeryearnum = Number(customeryear);
	var customermonthnum = Number(customermonth);
	if(customermonthnum < 1 || customermonthnum > 12){
		document.getElementById("cust[expiry]").style.border = "1px solid red";
		document.getElementById("expiryerror").innerHTML = "Please enter a valid month!";
		setTimeout(function(){document.getElementById("expiryerror").innerHTML = ""},5000);
		return false;
	}
	if(((customeryearnum == year) && (customermonthnum <= (month+1))) || (customeryearnum < year)){
		document.getElementById("cust[expiry]").style.border = "1px solid red";
		document.getElementById("expiryerror").innerHTML = "Your credit card has expired!";
		setTimeout(function(){document.getElementById("expiryerror").innerHTML = ""},5000);
		return false;		
	}
	if(customeryearnum > 2040){
		document.getElementById("cust[expiry]").style.border = "1px solid red";
		document.getElementById("expiryerror").innerHTML = "Please enter a valid year!";
		setTimeout(function(){document.getElementById("expiryerror").innerHTML = ""},5000);
		return false;	
	}
}
function inserterror(fieldname){
	document.getElementById(fieldname).innerHTML = "Please enter a valid name or/number!";
	setTimeout(function(){document.getElementById(fieldname).innerHTML = "";}, 5000);
}