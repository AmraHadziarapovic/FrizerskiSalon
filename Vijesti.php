<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 

<HTML>

<HEAD>

<TITLE> Frizerski salon - Lush </TITLE>

	<link rel="stylesheet" type="text/css" href="vijesti.css">

	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <script src="skripta.js"></script>  -->
</HEAD>

<BODY>

<div id="zaglavlje">

	<h1> <img src="quality.png" alt="logo"> L U S H </h1>

	<div class="infoOPrijavi">
	<?php
		
			echo "<br>";
			if(isset($_SESSION["korisnik"]))
			{
				echo "&nbsp;&nbsp;&nbsp;Prijavljeni ste kao: ".$_SESSION["korisnik"];
				echo "<br><a href='LogOut.php#'>Odjava</a>";
			}
			else
			{
				echo "Niste prijavljeni!";
			}
	?>
	</div>
	
</div>

<div id="menu">

  <ul>
    <li><a href="index.html#"> Početna &nbsp;&nbsp;</a></li>
    <li><a href="Vijesti.php#">  Vijesti &nbsp;&nbsp;</a></li> 	
	<li><a href="Trending.html#"> Trending &nbsp;&nbsp;</a></li> 
	<li><a href="LogIn.php#"> Log in &nbsp;&nbsp;</a></li> 
	<li><a href="Linkovi.html#"> Linkovi &nbsp;&nbsp;</a></li> 
	<li><a href="Kontakt.html#"> Kontaktirajte nas !</a></li> 
	
  </ul>

</div>
<br><br><br>

<form method="POST" action="Vijesti.php">

<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sortiraj:&nbsp;</label>
					<select id="sort" name="odabir" onchange="">
					<option value="datum">Po datumu</option>
					<option value="abced">Abecedno</option>
					</select>
<input type="submit" name="sortiraj" value="Sortiraj"></submit>


</form>

<?php
			
			function izbaci($el){
			
			$el=htmlspecialchars_decode($el);
			return $el;
			}
			
			function uporediDatume($a, $b)
			{
			/*$dateTime1 = new DateTime(str_replace('"', '',$a['datum'])); 
			$dateTime2 = new DateTime(str_replace('"', '',$b['datum'])); 
			$t1=$dateTime1->format('U'); 
			$t2=$dateTime2->format('U'); 
			return $t2-$t1;*/
			$prvi=$a['vrijeme'];
			$drugi=$b['vrijeme'];
			return strcmp($prvi,$drugi);
			}  
			
			function uporediNaslove($a, $b)
			{
			$prvi=$a['naslov'];
			$drugi=$b['naslov'];
			return strcmp($prvi,$drugi);
			
			}
			$niz;
			$vijesti;
			$brojac=0;
			

$veza = new PDO("mysql:dbname=lush;host=localhost;charset=utf8", "lush", "hairdresser");
     $veza->exec("set names utf8");

     $rezultat = $veza->query("select id, naslov, sadrzaj, UNIX_TIMESTAMP(datum) vrijeme, url from novost order by datum desc");

     if (!$rezultat) {

          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

	$vijesti;
	$i=0;
     foreach ($rezultat as $vijest) {
      
		  echo 
			'
					<div class="lijevo"> 
						<h2>'.$vijest['naslov'].'</h2>
						<img src='.$vijest['url'].'alt="Slika">
						<p class="parni">'.$vijest['sadrzaj'].'</p><br>
						<label class="datum">'.date("d.m.Y. (h:i)", $vijest['vrijeme']).'</label>
					</div>
			
			';
		$vijesti[$i]=$vijest;
		$i++;
     }
	 
	 if(isset($_REQUEST['sortiraj']))
			{
				$izbor=$_REQUEST['odabir'];
			
				if($izbor=="datum")
				{
					usort($vijesti, 'uporediDatume');
				}
				else
				{
					usort($vijesti, 'uporediNaslove');
				}
			
			}



?>

<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>

<div id="podnozje"> </div>
</BODY>
</HTML>