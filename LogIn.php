<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 

<HTML>

<HEAD>

<TITLE> Frizerski salon - Lush </TITLE>

	<link rel="stylesheet" type="text/css" href="stil.css">
	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="skripta.js"></script>
</HEAD>

<BODY>
 
<div id="zaglavlje">

	<h1> <img src="quality.png" alt="logo"> L U S H </h1>

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
<br><br><br>
<br><br><br>
<br><br><br>
<?php
		
		if(isset($_POST['login']))
		{
			$ime=$_POST['username'];
			$pas=$_POST['password'];
			
					$veza = new PDO("mysql:dbname=lush;host=localhost;charset=utf8", "lush", "hairdresser");
					$veza->exec("set names utf8");
					$osoba=$veza->query("select a.id,a.pass,a.user from autor a where a.user='$ime' and a.pass='$pas'");
					$niz=$osoba->fetch(PDO::FETCH_ASSOC);

						$korisnik=$niz['user'];
						$poruka="Uspješno ste prijavljeni.";
						print "<div>.$poruka</div>";
						session_start();
						if(!empty($korisnik)){
						$_SESSION['korisnik']=$korisnik;
						header('Location: NovaVijest.php');
						}
				 }
			
 ?>

<form action="LogIn.php" method="POST">
    <div class="forma">
     Korisničko ime: <input id="user-name"  name="username" type="text" required />
	 <br><br>
      &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Lozinka: <input id="lozinka" name="password" type="password" required  />
	 <br><br>
     <input type="submit" name="login" value="Prijava">
   </div>
 </form>

<div id="podnozje"> </div>
</BODY>
</HTML>