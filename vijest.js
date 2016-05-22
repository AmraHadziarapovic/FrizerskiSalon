function ValidirajElement(el){
	if(el.id=="naslov"){
	    
		if(el.value=="")
		el.style.backgroundColor="red";
	    else
		el.style.backgroundColor="white";
	}
	if (el.id == "sadrzaj"){
	    
		if(el.value=="")
		el.style.backgroundColor="red";
		else
		el.style.backgroundColor="white";
	
	}
    	
}
function ProvjeriDugme(dugme)
{
    var eel = document.forms["Forma"].getElementsByTagName("input");
    for (var i = 0; i < eel.length - 1; i++) {
        Validiraj(eel[i]);
    }
}