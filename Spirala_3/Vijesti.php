<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 

<HTML>

<HEAD>

<TITLE> Frizerski salon - Lush </TITLE>

	<link rel="stylesheet" type="text/css" href="vijesti.css">

	<META http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="skripta.js"></script>
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
				echo "<a href='#'>Odjava</a>";
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
		<a href="" class="odjava">Odjava</a>
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
			$prvi=$a['datum'];
			$drugi=$b['datum'];
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
			
			$handle=fopen("KreiraneNovosti.csv","r");
			while(!feof($handle)){
				$niz=fgetcsv($handle);
				
			    $niz2=Array("naslov"=>$niz[0], 
					   "sadrzaj"=>$niz[1],
					   "url"=>$niz[2],
					   "datum"=>$niz[3]);
			
			    $vijesti[$brojac]=$niz2;
			    $brojac++;
	
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
			
		for($i=0;$i<count($vijesti);$i++)
		{
			
			$naslov=izbaci($vijesti[$i]['naslov']);
			$sadrzaj=izbaci($vijesti[$i]['sadrzaj']);
			$link=izbaci($vijesti[$i]['url']);
			$datum=$vijesti[$i]['datum'];

			//$naslov=izbaci($vijesti[0]);
			//$sadrzaj=izbaci($vijesti[1]);
			//$link=izbaci($vijesti[2]);
			//$datum=izbaci($vijesti[3]);
		
			echo 
			'
					<div class="lijevo"> 
						<h2>'.$naslov.'</h2>
						<img src='.$link.'alt="Slika">
						<p class="parni">'.$sadrzaj.'</p><br>
						<label class="datum">'.$datum.'</label>
					</div>
			
			';
			//}
				
		}
		
	
fclose($handle);

?>

<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>

<div id="podnozje"> </div>
</BODY>
</HTML>