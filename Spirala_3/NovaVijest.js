tekst=/^[a-zA-Z\s0-9čćšđžČĆŠĐŽ,\\.]+$/;

function ValidirajNaslov()
{
	var forma=document.getElementById("Forma");
	if(!tekst.test(forma['naslov'].value))
	{
		forma['naslov'].style.backgroundColor = "red";
	}
	else{
	   forma['naslov'].style.backgroundColor = "white";
	}
}

function ValidirajSadrzaj()
{
	var forma=document.getElementById("Forma");
	if(!tekst.test(forma['sadrzaj'].value))	{
		forma['sadrzaj'].style.backgroundColor = "red";
	}
	else{
	   forma['sadrzaj'].style.backgroundColor = "white";
	}
}
expresion=/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/;

function ValidirajURL()
{
	var forma=document.getElementById("Forma");
	if(!expresion.test(forma['url'].value)){
	
		forma['url'].style.backgroundColor="red";
	}
	else{
		forma['url'].style.backgroundColor="white";
	}

}
var x;
function ValidirajKod()
{
	var saForme=document.getElementById("kod");
	var vrijednost=saForme.value;
	var xhttp = new XMLHttpRequest();
	
		if(vrijednost=="BA"){
			xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var odg= xhttp.responseText;
				var linija=JSON.parse(odg);
			     x=linija[0].alpha2Code;
				 window.alert(x);
				document.getElementById("tel").value="+"+linija[0].callingCodes;
			}
		}
	
	
	xhttp.open("GET", "https://restcountries.eu/rest/v1/alpha?codes="+saForme.value, true);
	xhttp.send();
	}
	
}

function ValidirajTelefon()
{
	var saForme=document.getElementById("tel");
	var vrijednost=saForme.value;
	var pocetak=vrijednost.startsWith("+387");	
		if(pocetak==true){
				document.getElementById("kod").value=""+x;
			}
}
		


