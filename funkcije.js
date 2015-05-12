function Funkcija()
{
	document.getElementById("tree-menu1").style.display="none";
	document.getElementById("tree-menu2").style.display="none";
	document.getElementById("tree-menu3").style.display="none";
	document.getElementById("tree-menu4").style.display="none";
	document.getElementById("tree-menu5").style.display="none";
	document.getElementById("tree-menu51").style.display="none";
	document.getElementById("tree-menu52").style.display="none";
	document.getElementById("tree-menu53").style.display="none";
}

function Funkcija1()
{
	if(document.getElementById("tree-menu1").style.display=="block"){
		document.getElementById("tree-menu1").style.display="none";
		document.getElementById("OrgVrijednosti").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
		
	else {
		document.getElementById("tree-menu1").style.display="block";
		document.getElementById("OrgVrijednosti").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}

function Funkcija2()
{
	if(document.getElementById("tree-menu2").style.display=="block"){
		document.getElementById("tree-menu2").style.display="none";
		document.getElementById("Antikorupcija").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
		
	else {
		document.getElementById("tree-menu2").style.display="block";
		document.getElementById("Antikorupcija").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}

function Funkcija3()
{
	if(document.getElementById("tree-menu3").style.display=="block"){
		document.getElementById("tree-menu3").style.display="none";
		document.getElementById("JavnaNabava").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
	else{
		document.getElementById("tree-menu3").style.display="block";
		document.getElementById("JavnaNabava").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}

function Funkcija4()
{
	if(document.getElementById("tree-menu4").style.display=="block"){
		document.getElementById("tree-menu4").style.display="none";
		document.getElementById("PolitikaKvaliteta").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
	else{
		document.getElementById("tree-menu4").style.display="block";
		document.getElementById("PolitikaKvaliteta").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}


function Funkcija5()
{
	if(document.getElementById("tree-menu5").style.display=="block"){
		document.getElementById("tree-menu5").style.display="none";
		document.getElementById("PonudeUsluge").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
	else{
		document.getElementById("tree-menu5").style.display="block";
		document.getElementById("PonudeUsluge").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}


function Funkcija51()
{
	if(document.getElementById("tree-menu51").style.display=="block"){
		document.getElementById("tree-menu51").style.display="none";
		document.getElementById("AkcijskePonude").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
	else{
		document.getElementById("tree-menu51").style.display="block";
		document.getElementById("AkcijskePonude").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}

function Funkcija52()
{
	if(document.getElementById("tree-menu52").style.display=="block"){
		document.getElementById("tree-menu52").style.display="none";
		document.getElementById("Pogodnosti").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
	else{
		document.getElementById("tree-menu52").style.display="block";
		document.getElementById("Pogodnosti").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}

function Funkcija53()
{
	if(document.getElementById("tree-menu53").style.display=="block"){
		document.getElementById("tree-menu53").style.display="none";
		document.getElementById("Usluge").style.listStyleImage = "url(slike/list-style-triangle.png)";
	}
	else{
		document.getElementById("tree-menu53").style.display="block";
		document.getElementById("Usluge").style.listStyleImage = "url('https://cdn1.iconfinder.com/data/icons/material-core/20/check-circle-outline-blank-16.png')";
	}
}


function validirajEmail(email) {
	var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
	if(email.value.match(emailformat))  
	{  
 		return true;  
	}  
	else  
	{  
		return false;  
	}  
}


function validiraj() {
	var validno = true;
	var poruka = 'Ispravite sljedeće greške:\r\n';


	// validacija imena i prezimena
	var imee = document.formica.firstname;

	if (imee.value.length == 0)
	{
		poruka = poruka + '  - Upišite ime i prezime\r\n';
		var slika = document.getElementById("eror_name");
		slika.style.display="inline";
		document.formica.firstname.focus();
		validno = false;
	}

	// validacija emaila
	if (document.formica.email.value.length == 0) {
		poruka = poruka + '  - Unesite email\r\n';
		var slika = document.getElementById("eror_email");
		slika.style.display="inline";
		document.formica.email.focus();
		validno = false;
	}
	else if (validirajEmail(document.formica.email) == false) {
		poruka = poruka + '  - Unijeli ste pogrešan email\r\n';
		var slika = document.getElementById("eror_email");
		slika.style.display="inline";
		document.formica.email.focus();
		validno = false;
	}

	// potvrda emaila- cross validacija
	if (document.formica.email.value != document.formica.emailpotvrda.value) {
		
		poruka = poruka + '  - Niste unijeli ispravan potvrdni email\r\n';
		var slika = document.getElementById("eror_email_potvrda");
		slika.style.display="inline";
		document.formica.emailpotvrda.focus();
		validno = false;
	}


	// validacija poruke
	var tekst = document.formica.myname;
	if (tekst.value.length == 0) {
		poruka = poruka + '  - Unesite tekst poruke\r\n';
		var slika = document.getElementById("eror_poruka");
		slika.style.display = "inline";
		validno = false;
		document.formica.myname.focus();
	}


	// validacija poštanskog broja i mjesta putem Ajaxa
	var mj = document.formica.mjesto.value;
	var ptbr = document.formica.ptbroj.value;
	var xmlhttp = new XMLHttpRequest();

	// polja grad iptbroj nisu obavezna, ali ako se unese jedno(grad/ptbroj) mora se unijeti i drugo(ptbroj/grad)

	if(mj.length == 0 && ptbr.length != 0) 
	{
		poruka = poruka + '  - Unesite mjesto za uneseni poštanski broj\r\n';
		var slika = document.getElementById("eror_city");
		slika.style.display = "inline";
		validno = false;

		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				var obj = JSON.parse(xmlhttp.responseText);

				// ako je unesen nepostojeći ptbroj
				if(obj.hasOwnProperty("greska") && obj.greska == "Nepostojeći poštanski broj")
				{
					alert(poruka + '  - ' + objj.greska + '\r\n');
					return false;
				}
				// kada se ne unese mjesto javlja se greška da je mjesto nepostojeće
				else if(obj.hasOwnProperty("greska") && obj.greska == "Nepostojeće mjesto")
				{
					alert(poruka + '  - ' + obj.greska + '\r\n');
					return false;				
				}

				
				if(xmlhttp.readyState == 4 && xmlhttp.status == 404)
    		    {
       	       		console.log("Pogrešan URL!");
       	     	}
			}
		}
		
	}

	else if(ptbr.length == 0 && mj.length != 0)
	{
		poruka = poruka + '  - Unesite poštanski broj za uneseno mjesto\r\n';
		var slika = document.getElementById("eror_cityno");
		slika.style.display = "inline";
		validno = false;

		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				var obj = JSON.parse(xmlhttp.responseText);

				// ako je unesen nepostojeći grad
				if(obj.hasOwnProperty("greska") && obj.greska == "Nepostojeće mjesto")
				{
					alert(poruka + '  - ' + obj.greska + '\r\n');
					return false;
				}
				// kada se ne unese ptbroj javlja se greška da je ptbroj nepostojeći
				else if(obj.hasOwnProperty("greska") && obj.greska == "Nepostojeći poštanski broj")
				{
					alert(poruka + '  - ' + obj.greska + '\r\n');
					return false;
				}
				
				
				if(xmlhttp.readyState == 4 && xmlhttp.status == 404)
    		    {
       	       		console.log("Pogrešan URL!");
       	     	}
			}
		}
	}
	
	else if(mj.length != 0 && ptbr.length != 0)
	{
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				var obj = JSON.parse(xmlhttp.responseText);
				if(obj.hasOwnProperty("greska") && obj.greska == "Poštanski broj ne odgovara mjestu")
				{
					alert(poruka + '  - ' + obj.greska + '\r\n');
					return false;
				}
				else if(obj.hasOwnProperty("ok") && obj.ok == "Poštanski broj odgovara mjestu")
				{
					alert(obj.ok);
				}
				if(xmlhttp.readyState == 4 && xmlhttp.status == 404)
    		    {
       	       		console.log("Pogrešan URL!");
       	     	}
			}
		}
	}

	mj = encodeURIComponent(mj);
	ptbr = encodeURIComponent(ptbr);
	var url = 'http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto='+mj+'&postanskiBroj='+ptbr;
	xmlhttp.open("GET", url, true);
    xmlhttp.send();

	
	if (validno==false) {
		alert(poruka);
	}
	else {
		var slika1 = document.getElementById("eror_name");
		var slika2 = document.getElementById("eror_email");
		var slika3 = document.getElementById("eror_poruka");
		var slika4 = document.getElementById("eror_cityno");
		var slika4 = document.getElementById("eror_city");
		slika1.style.display = "none";
		slika2.style.display = "none";
		slika3.style.display = "none";
		slika4.style.display = "none";
		slika5.style.display = "none";
	}

}


function funkcijaHome() {
	var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {// Anonimna funkcija
                if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("tijelo").innerHTML = ajax.responseText;
                if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
        }
    ajax.open("GET", "home.html", true);
    ajax.send();
}

function funkcijaNews() {
	var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {// Anonimna funkcija
                if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("tijelo").innerHTML = ajax.responseText;
                if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
        }
    ajax.open("GET", "news.html", true);
    ajax.send();
}

function funkcijaRoutes() {
	var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {// Anonimna funkcija
                if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("tijelo").innerHTML = ajax.responseText;
                if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
        }
    ajax.open("GET", "routes.html", true);
    ajax.send();
}

function funkcijaContact() {
	var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {// Anonimna funkcija
                if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("tijelo").innerHTML = ajax.responseText;
                if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
        }
    ajax.open("GET", "contact.html", true);
    ajax.send();
}

function funkcijaAbout() {
		var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {// Anonimna funkcija
                if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("tijelo").innerHTML = ajax.responseText;
                if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("tijelo").innerHTML = "Greska: nepoznat URL";
        }
    ajax.open("GET", "about.html", true);
    ajax.send();
}