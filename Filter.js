var vijesti=document.getElementsByClassName("clanak");
var datumi=document.getElementsByClassName("datum");

function filtriraj(){
	
	var opcije = document.getElementsByTagName('select')[0];
	
	switch (opcije[opcije.selectedIndex].value) {
    case 'danasnje':
        prikaziDanasnje();
        break;
    case 'ovasedmica':
        prikaziPoSedmici();
        break;
    case 'ovajmjesec':
        prikaziPoMjesecu();
        break;
    default:
        prikaziSve();
    }
}

function prikaziPoSedmici() {
    
	for(var i=0;i<vijesti.length;i++)
	{
		var datum=new Date();
		var el1=parseInt(datum.getDate());
		var el2=parseInt(datum.getDay());
		var poc=el1 - el2 + 1;
		var pon=parseInt(poc);
		if(pon<0) pon=31+pon;
		var mj=parseInt(new Date().getMonth())+1;
		var mojPocetak=parseInt(datumi[i].innerHTML.substr(8,2));
		var mojMjesec=parseInt(datumi[i].innerHTML.substr(5,2));	
		if(mj!=mojMjesec && mojPocetak<pon) vijesti[i].style.display="none";
		else vijesti[i].style.display="block";
	}
}

function prikaziPoMjesecu() {
	for(var i=0;i<vijesti.length;i++)
	{
		var danasnji=new Date().getMonth();
		danasnji=parseInt(danasnji);
		var d=parseInt(datumi[i].innerHTML.substr(5,2));
		if(d==danasnji) vijesti[i].style.display="block";
		else vijesti[i].style.display="none";
	}
}

function prikaziSve() {
   	for(var i=0;i<vijesti.length;i++)
	{
		vijesti[i].style.display="block";
	
	}
}

function prikaziDanasnje() {
   
	for(var i=0;i<vijesti.length;i++)
	{
		var danasnji=new Date().getDate();
		var mjesec=new Date().getMonth();
		var godina=new Date().getFullYear();
		danasnji=parseInt(danasnji);
		mjesec=parseInt(mjesec);
		godina=parseInt(godina); 
		var d=parseInt(datumi[i].innerHTML.substr(8,2));
		var dMJ=parseInt(datumi[i].innerHTML.substr(5,2));
		var dGod=parseInt(datumi[i].innerHTML.substr(0,4));
		if(d==danasnji && mjesec==dMJ && godina==dGod) vijesti[i].style.display="block";
		else vijesti[i].style.display="none";
	}
}


