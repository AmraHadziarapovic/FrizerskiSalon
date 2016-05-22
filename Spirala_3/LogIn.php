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
 	$datoteka=file('podaci.csv');
	
	foreach($datoteka as $red)
	{
		$niz=explode(',',$red);
	
		if(isset($_POST['login'])) //&& !empty($_POST['username'])&& !empty($_POST['password']))
		{
			
			
			if($_POST['username'] == 'admin' && sha1($_POST['password']) == 'd033e22ae348aeb5660fc2140aec35850c4da997')//===$niz[0] && $_POST['password']===$niz[1])
			{
			
				$poruka="Uspješno ste prijavljeni.";
				print "<div>.$poruka</div>";
				session_start();
				$_SESSION['korisnik']=$niz[0];
				header('Location: NovaVijest.php');
					
			}
			
			else{
				print " ";
				if($_POST['username']!='admin' || sha1($_POST['password']) != 'd033e22ae348aeb5660fc2140aec35850c4da997' )
				{
					$poruka="Neispravan username ili password.";
					print "<div>.$poruka</div>";
				}
			}
			
		}
	}
			/*
			else if($_POST['username'] != 'admin' && $_POST['password'] != 'admin'){
				$poruka="Korisničko ime ili lozinka neispravni.";
				print "<div>.$poruka</div>";
			}
			else {
				
				$poruka="Unesite podatke";
				print "<div>.$poruka</div>";
				
			}*/
			
 
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