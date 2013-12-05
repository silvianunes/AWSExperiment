<?
if(file_exists('conf.php3')){
		require('conf.php3');
		$i=-1;
		$fp=fopen($fichier,'r');
		while (!feof($fp)){
			  $i++;
			  $tableau[$i]=fgetcsv($fp,4000,"|");
		}
		echo $tableau[$id-1][2];
		fclose($fp);
}
?>
