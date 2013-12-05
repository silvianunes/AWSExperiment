<html>
<head>
<title>DownloadManager v1.00</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
table.t {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border: #000000; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
input.t {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px}
-->
</style>
</head>

<body bgcolor="#525C77" text="#000000">
<table width="750" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <td width="175"> 
      <form method=post action=http://www.yourmailinglistprovider.com/subscribe.php?fafaworld target=_blank>
        <div align="center"><font face="Arial, Helvetica, sans-serif" size="1">Laissez 
          votre email pour connaitre<br>
          les mises &agrave; jour de ce script :<br>
          </font> 
          <input type=text name=YMP[0] size=12 maxlength=50 value="email" onFocus="this.value=''" class="t">
          <input type="submit" name="submit" value="Ok" class="menu">
          &nbsp;&nbsp; </div>
      </form>
    </td>
    <td width="575" bgcolor="#FFFFFF"> 
      <p align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><b>Auteur 
        : Daniel Fabien<br>
        <a href="mailto:webmaster@script-masters.com"><font color="#003366">webmaster@script-masters.com</font></a><br>
        <a href="http://www.script-masters.com/"><font color="#003366">Script 
        Masters</font></a> <br>
        ( http://www.script-masters.com )</b></font></p>
      </td>
  </tr>
</table>
<br><table width="750" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="t">
        <tr> 
          <td bgcolor="#525C77"> 
            <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><font color="#FFFFFF">Download 
              Manager v1.00</font></b></font></p>
            </td>
        </tr>
        <tr>
          <td> 
            <p>&nbsp;</p>
            <p align="center">Edition de liens sur 
              http://127.0.0.1/              <br>
              <br>
              <a href="admin.php3?action=espace&id=<? echo $id; ?>&option=ajout">Ajout 
              de fichiers</a> | <a href="admin.php3?action=espace&id=<? echo $id; ?>&option=listing">Listing</a> | <a href="admin.php3?action=espace&id=<? echo $id; ?>&option=clic">Affiché le nombre de clics</a> | <a href="admin.php3">Logout</a></p>
            <p align="center">&nbsp; </p>
         <?
		if($option=="listing"){
		if(!file_exists($fichier)){
								  echo'<center><b>aucune entrée dans le listing</b></center><br>';
		}else{
echo'
        <script language="javascript">
					function adresse(){
					url = document.location.href;
					place = url.indexOf("admin.php3",0);
					url = url.substring(0,place);
					document.write(url);}
			</script></td>
        </tr>
      </table>
      <p align="center"> <font face=Verdana size=2>Listing de vos fichiers</font><br>
				  <table width="600" border="0" cellspacing="1" cellpadding="0" align="center" class="t">
              <tr bgcolor="#525C77"> 
                <td width="31"> 
                  <div align="center"><font size="2" color="#FFFFFF">ID</font></div>
                </td>
				<td width="50"> 
                  <div align="center"><font size="2" color="#FFFFFF">Date</font></div>
                </td>
                <td width="95"> 
                  <div align="center"><font size="2" color="#FFFFFF">Nom</font></div>
                </td>
                <td width="305"> 
                  <div align="center"><font size="2" color="#FFFFFF">Pointez vers 
                    l\'adresse</font></div>
                </td>
				<td width="20"> 
                  <div align="center"><font size="2" color="#FFFFFF">Hits</font></div>
                </td>

              </tr>';
			  $i="-1";
			  $fp=fopen($fichier,"r");
while (!feof($fp)){
$i=$i+1;
$couleur=$i%2;
if($couleur=='0'){$col="#E2DCEE";}else{$col="#FFFFFF";}
	  $tableau[$i]=fgetcsv($fp,4000,"|");
	  echo'
	  <tr bgcolor="'.$col.'"> 
	  <td width="31"><center>'.$tableau[$i][0].'</center></td>
	  <td width="50"><center>'.$tableau[$i][4].'</center></td>
      <td width="95"><center>'.$tableau[$i][3].'</center></td>
      <td width="305"><font size="1"><script language="javascript">adresse();</script>index.php3?id='.$tableau[$i][0].'</font></td>
      <td width="20"><font size="1">'.$tableau[$i][2].'</font></td>
      </tr>';
	}
	fclose($fp);
       }}
	   
	   else if ($option=="ajout"){
	   		echo'<form method="post" action="admin.php3">
              <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr> 
                  <td width="205"><font size="2">Url du fichier</font></td>
                  <td width="195"> 
                    <input type="text" name="adr">
                  </td>
                </tr>
                <tr> 
                  <td width="205"><font size="2">Nom</font></td>
                  <td width="195"> 
                    <input type="text" name="name">
                  </td>
                </tr>
                <tr> 
                  <td colspan="2"> 
                    <div align="center"> 
                      <input type="submit" name="Submit2" value="Envoyer">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="action" value="espace">
                      <input type="hidden" name="option" value="nouveau">
                    </div>
                  </td>
                </tr>
              </table>
            </form>';
            
			
			
			
	   }else if($option=="nouveau"){
	   if(($adr=="")||($name=="")){
	   echo '<center><b>Veuillez entrer toutes les informations</b></center><br>';
	   }else{
	   $date=date("j/n/Y");
	   if(file_exists($fichier)){
	   /////Ajout au fichier
	   $fp=fopen($fichier,"r");
	   $i=0;
	   while (!feof($fp)){
       $i=$i+1;
	  $tableau[$i]=fgetcsv($fp,4000,"|");
	  }
	  fclose($fp);
	   $iddeb=$tableau[$i][0]+1;
	   }else{
	   $iddeb="1";
	   }
	   $fp=fopen($fichier,"a+");
	   $str="\r\n";
	   if($iddeb!="1"){$iddeb=$str.$iddeb;}
	   fwrite($fp,$iddeb."|".$adr."|0|".$name."|".$date);
	   fclose($fp);
	   
	   echo'<center><b>Fichier rajouté sous l\'id n°'.$iddeb.'</b></center><br>';
	   
}
	   }else if($option=="clic"){
	   		 echo'<table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr bgcolor="#525C77"> 
                <td> 
                  <div align="center"><font size="2" color="#FFFFFF">Affich&eacute; 
                    le nombre de clic</font></div>
                </td>
              </tr>
              <tr> 
                <td><font size="2">Pour affich&eacute; le nombre de clic de chaque 
                  liens, il vous suffit d\'ins&eacute;rer le script ci-dessous 
                  en pr&eacute;cisant l\'id du lien</font></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td> 
                  <p><font size="1"><b>&lt;?<br>
                    require(\'<script language="javascript">
					url = document.location.href;
					place = url.indexOf("admin.php3",0);
					url = url.substring(0,place);
					document.write(url);
			</script>clic.php3?id=NUMERO_ID_DE_VOTRE_LIEN\');<br>
                    ?&gt; </b></font></p>
                  </td>
              </tr>
            </table><br>';
            
	   }       
?>
</table>      
      <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><b><a href="http://www.script-masters.com/" target="_blank"><font color="#000000">Daniel 
        Fabien&copy;Script Masters 2002</font></a></b></font></p>
      <p>&nbsp; </p>
    </td>
  </tr>
</table>
</body>
</html>
