<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 

<HTML>

<HEAD>

<TITLE> Frizerski salon - Lush </TITLE>

	<link rel="stylesheet" type="text/css" href="NovaVijest.css">
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="NovaVijest.js"></script>
</HEAD>

<BODY>

<div id="zaglavlje">

	<h1> <img src="quality.png" alt="logo"> L U S H </h1>

	<div class="infoOPrijavi">
	<?php
		
			echo "<br>";
			if(isset($_SESSION["korisnik"]))
			{
				echo "&nbsp;&nbsp;&nbsp;Prijavljeni ste kao: ".$_SESSION["korisnik"]; echo"<br>"; 
				echo "<a href='LogOut.php#'>Odjava</a>";
			}
			else
			{
				echo "Niste prijavljeni!";echo"<br>"; 
				header('Location: LogIn.php');
			}
	?>
	</div>
	
</div>

<div id="menu">

  <ul>
    <li><a href="index.html#"> Početna &nbsp;&nbsp;</a></li>
    <li><a href="Vijesti.php#"> Vijesti &nbsp;&nbsp;</a></li> 	
	<li><a href="Trending.html#"> Trending &nbsp;&nbsp;</a></li> 
	<li><a href="LogIn.php#"> Log in &nbsp;&nbsp;</a></li> 
	<li><a href="Linkovi.html#"> Linkovi &nbsp;&nbsp;</a></li> 
	<li><a href="Kontakt.html#"> Kontaktirajte nas !</a></li>

  </ul>

  
  
</div>

<?php
date_default_timezone_set("Europe/Sarajevo");
$brojac=2;
if(isset($_POST['dodaj'])){
	
	if($_POST['naslov']!=" " && $_POST['sadrzaj']!=" " && $_POST['url']!=" " )
	{
		function izbaci($el){
			
			$el=htmlspecialchars($el);
			return $el;
		}
		$datum=date('d.m.Y H:i:s');
		$podaci=array($_POST['naslov'],$_POST['sadrzaj'],$_POST['url'],$datum);
		$naslov=$_POST['naslov'];
		$sadrzaj=$_POST['sadrzaj'];
		$tel=$_POST['telefonskiBroj'];
		$url=$_POST['url'];
		$kod=$_POST['kodDrzave'];
		
		$izbor=$_REQUEST['daLi'];
		$korisnik=$_SESSION['korisnik'];
		$veza = new PDO("mysql:dbname=lush;host=localhost;charset=utf8", "lush", "hairdresser");
        $veza->exec("set names utf8");
        $rezultat = $veza->query("INSERT INTO novost SET id='$brojac', naslov='$naslov', sadrzaj='$sadrzaj',telefon='$tel',url='$url',kod='$kod',datum='$datum',omoguceni='$izbor'");
		//$rezultat2= $veza->query("INSERT INTO autor a SET novost='$brojac' WHERE a.user='$korisnik'");
        if (!$rezultat) //|| !$rezultat2) {

          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
        }
		else{
				
			echo "<p>Uspješno ste dodali novost!</p>";
			$brojac++;
		}
	}
	else{
			echo "<p>Morate unijeti sva polja!</p>";		
	}


}

?>

<h2>Kreiraj novu vijest: </h2>
<form action="NovaVijest.php" method="post" id="Forma">
	<label for="naslov">Naslov:&nbsp;&nbsp;&nbsp;</label><input type="text" name="naslov" onblur="ValidirajNaslov()" required> <br><br>
	<label for="komentar">Unesite sadržaj novosti:</label><br><br>
	<textarea id="sadrzaj" rows="10" cols="50" onblur="ValidirajSadrzaj()" name="sadrzaj" required> </textarea><br><br>
	<label>URL Slike :&nbsp;&nbsp;&nbsp;<input type="text" name="url" id="url" onblur="ValidirajURL()" required></label><br><br>
    <label>Kod države: &nbsp;&nbsp;<input type="text" name="kodDrzave" id="kod" onblur="ValidirajKod()" required></label><br><br>
	<label id="l1">Telefon:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="telefonskiBroj" id="tel" onblur="ValidirajTelefon()" required></label>
	<br><br>
	<label>Omogućiti komentare:&nbsp;</label><select id="sort" name="daLi">
					    <option value="da">Da</option>
					    <option value="ne">Ne</option>
					    </select>
	
	<br><br><input type="submit" value="Potvrdi" name="dodaj"> 

</form>
<div id="podnozje"> </div>
</BODY>
</HTML>