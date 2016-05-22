window.onload=function(){
	
	var datalabels = document.getElementsByClassName("datum");
    for (var i = 0; i < datalabels.length; i++) {
       
   	    var godina=datalabels[i].innerHTML.substr(0,4);
		var mjesec=datalabels[i].innerHTML.substr(5,2);
		var dan=datalabels[i].innerHTML.substr(8,2);
		var sat=datalabels[i].innerHTML.substr(11,2);
		var min=datalabels[i].innerHTML.substr(14,2);
		var sekunda=datalabels[i].innerHTML.substr(17,2);
		var d = new Date(godina,mjesec-1,dan,sat,min,sekunda);
        datalabels[i].innerHTML = pomocna(d);

		
    }		
	
	
}

function pomocna(trenutni){
var datumSada=new Date();
console.log("trenutni "+trenutni);
var razlika=Math.abs(datumSada-trenutni);
razlika=Math.round(razlika/1000);
console.log("raz "+razlika);
if(razlika<60) razlika="Objavljeno prije nekoliko sekundi."
else if(razlika<3600){
	
	  var tmp = Math.round(razlika/60);
	  var string = tmp.toString();
	  razlika = "Objavljeno prije " + string;
	  if(tmp == 1 || tmp == 21 || tmp == 31 || tmp == 41 || tmp ==51) razlika += " minutu";
      else if( string[string.length - 1] > 1 && string[string.length - 1] < 5  ) razlika += " minute";
	  else razlika += " minuta";
	
	
}
else if(razlika<86400){
		var tmp = Math.round(razlika/3600);
		var string = tmp.toString();
		razlika = "Objavljeno prije " + string;
		if(tmp == 1 || tmp == 21 || tmp == 31 || tmp == 41 || tmp ==51) razlika += " sat";
		else if(string[string.length - 1] > 1 && string[string.length - 1] < 5) razlika += " sata";
		else razlika += " sati";
	}

else if(razlika<604800){
		var tmp = Math.round((razlika/86400));
		var string = tmp.toString();
		razlika = "Objavljeno prije " + string;
		if(tmp == 1 ) razlika += " dan";
		else razlika += " dana";
	} 
	
else if(razlika<2419200){
		var tmp = Math.round((razlika/604800));
		var string = tmp.toString();
		razlika = "Objavljeno prije " + string;
		if(tmp == 1) razlika += " sedmicu";
		else razlika += " sedmice";
	} 
	
else{
	
		razlika = new Date(trenutni);
console.log("raz "+razlika);	
	razlika = razlika.getDate() + "." + (razlika.getMonth()+1) + "." + razlika.getFullYear() + " " + razlika.getHours() + ":";
		if(trenutni.getMinutes() < 10)
			razlika = razlika + "0" + trenutni.getMinutes() + ":";
		else
			razlika = razlika + trenutni.getMinutes() + ":";
		if(trenutni.getSeconds() < 10)
			razlika = razlika + "0" + trenutni.getSeconds();
		else{
			razlika = razlika + trenutni.getSeconds();
		}
		razlika = "Objavljeno " + razlika;
			
	} 
	return razlika;
}