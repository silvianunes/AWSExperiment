<?
//Redirection
if(file_exists("conf.php3")){
		require('conf.php3');
		if(($fichier!="")&&($url!="")&&($long!="")&&($mdp!="")&&($login!="")){
				$idc=0;}else{$idc=1;
		}
}
else{
	 	 $idc=1;
	 }

	 
//Générateur d'id de session
function genere() 
{ 
  $chrs = 20 ; 
  $pid = ""  ; 
  mt_srand ((double) microtime() * 1000000); 
  while (strlen($pid)<$chrs) 
  { 
    $chr = chr(mt_rand (0,255)); 
    if (eregi("^[a-hj-km-np-z2-9]$", $chr)) 
      $pid = $pid.$chr; 
  }; 
  return $pid; 
}

//verification de durée de session
function connexion($id)
{
 //verification de session
 $fp=fopen('session.dm','r');
 $tableau=fgetcsv($fp,4000,"|");
 fclose($fp);
 $temp_sess="180";
 $sec_f=$tableau[1];
 $sec_n=date('U');
 $ecart=$sec_n-$sec_f;
 if(($tableau[0]==$id)&&($ecart<=$temp_sess)){
 		$pass="true";
 }
 else{
 	    $pass="false";
 }

 //réécriture du fichier
 if($pass=="true"){
 		$fp=fopen('session.dm','w+');
 		$str=$id."|".date('U');
		fwrite($fp,$str);
		fclose($fp);
 }
 return $pass;
}
 
 
 
//Première utilisation
if(($idc==1)&&($action=="")){
	require('lib/e1.php3');
	exit;
}

//installation phase2
else if(($idc==1) && ($action=="install")){
	 $fp=fopen('conf.php3','w+');
	 $crlf="\r\n";
	 $alea=genere();
	 $ligne1="<?";
	 $ligne2="\$fichier='".$login.$alea.".dm';";
	 $ligne3="\$url='".$url."';";
	 $ligne4="\$long='".strlen($url)."';";
	 $ligne5="\$mdp='".$mdp."';";
	 $ligne6="\$login='".$login."';";
	 $ligne7="?>"; 
	 fwrite($fp,$ligne1.$crlf.$ligne2.$crlf.$ligne3.$crlf.$ligne4.$crlf.$ligne5.$crlf.$ligne6.$crlf.$ligne7);
	 fclose($fp);

	 $session=genere();
	 $fp=fopen('session.dm','w+');
	 $str=$session."|".date('U');
	 fwrite($fp,$str);
	 fclose($fp);
	 $id=$session;
	 require('lib/e3.php3');
	 exit;
}

//Identification
else if(($idc==0) && ($action=="")){
	 require('lib/e4.php3');
	 exit;

//Entrée de l'espace
}else if(($icd==0) && ($action=="espace") && ($id=="")){
	  //verification des infos de connexion
	  if(($log==$login)&&($pwd==$mdp)){
	  		
			//réécriture du fichier
			$fp=fopen('session.dm','w+');
			$id=genere();
			$str=$id."|".date('U');
			fwrite($fp,$str);
			fclose($fp);
			require('lib/e6.php3');
			}
	  else{
	  	   require('lib/e5.php3');
		   }

//Ajout ou listing
}else if(($icd==0) && ($action=="espace") && (connexion($id)=="true")){
	  require('lib/e6.php3');
	  }
	  
//temps trop long
else{
	 require('lib/e5.php3');
}
?>

