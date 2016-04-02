function Validiraj(el){
	if(el.id=="imeprezime"){
	    
		if(el.value=="")
		el.style.backgroundColor="red";
	    else
		el.style.backgroundColor="white";
	}
	if (el.id == "email"){
        if (!validirajMail(el.value)) el.style.backgroundColor = "red";
        else el.style.backgroundColor = "white";
	}
    if (el.id == "web"){
        if (!validirajWeb(el.value)) {
            el.style.backgroundColor = "red";
          
        }
        else {
			el.style.backgroundColor = "white";
             }
	}
    if (el.id == "komentar") {
        var kom = document.getElementById("komentar").value;
        if (kom == null || kom == "")
            el.style.backgroundColor = "red";
        else el.style.backgroundColor = "white";
    }
	
}
	function validirajWeb(web)
	{
		var izraz=/www\.[\w\W\d\D\S]+\.[\w\W\d\D\S]+/;
		return izraz.test(web);
	}
	
	function validirajMail(mail)
	{
		var izraz=/[\w\W\d\D\S]+@[\w\W\d\D\S]+\.[\w\W\d\D\S]+/;
		return izraz.test(mail);
	}
	

function Provjeri(dugme)
{
    var eel = document.forms["Forma"].getElementsByTagName("input");
    for (var i = 0; i < eel.length - 1; i++) {
        Validiraj(eel[i]);
    }
}
	

