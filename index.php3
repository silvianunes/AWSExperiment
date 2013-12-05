<?
//Install?
if(file_exists("conf.php3")){
	require('conf.php3');
}
else{
	 require('lib/e2.php3');
	 exit;
}

//initialisation variables-constantes
$pos_id=0;
$pos_url=1;
$pos_clic=2;
$pos_nom=3;
$pos_date=4;
$referant=$HTTP_REFERER;
$domaine_refer=substr($referant,0,$long);

//url correct
if($domaine_refer==$url){

	//ouverture des fichiers
	$fp=fopen($fichier,"r");
	$i=0;

	while (!feof($fp)){
	  $tableau[$i]=fgetcsv($fp,4000,"|");
	  if($tableau[$i][$pos_id]==$id){
	  		$tableau[$i][$pos_clic]=$tableau[$i][$pos_clic]+1;
			$url_download=$tableau[$i][$pos_url];
			}
	  $i=$i+1;
	}
	fclose($fp);
	
	//fichier temporaire
	$fptmp=fopen('temp','w+');
	$crlf="\r\n";
	for($indice=0;$indice<$i;$indice++){
		$str="";
		for($indice2=0;$indice2<5;$indice2++){
			if($str==""){
				$str=$tableau[$indice][$indice2];
			}
			else{
				$str=$str.'|'.$tableau[$indice][$indice2];
			}
		}
		if($indice!=($i-1)){
			fwrite($fptmp,$str.$crlf);
		}
		else{
			fwrite($fptmp,$str);
		}
	}
	fclose($fptmp);
	//copie et suppression fichier temporaire
	copy('temp',$fichier);
	unlink("temp");

	$next=$url_download;
}
else{
	 $next=$referant;
}
header("Location:$next");
?>

