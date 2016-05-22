<?php

$handle=fopen("KreiraneNovosti.csv","r");
$pod=fgetcsv($handle);

$i=0;
for($i=0;$i<count($pod);$i++)
{

	echo $pod[$i];
	echo '<br>';
		
}
fclose($handle);

?>