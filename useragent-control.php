<?php
// v4r1able - obir.ninja

// useragent/tarayıcı değiştirince sorgu - file session

session_start();

$useragent = $_SERVER["HTTP_USER_AGENT"];
$museragent = md5($useragent);

$ip = $_SERVER["REMOTE_ADDR"];
$mip = md5($ip);

$veri = file_get_contents($mip."_u.txt");

if(empty($veri)) {

$veriekle = fopen($mip."_u.txt", 'a+');
fwrite($veriekle, $museragent);
fclose($veriekle);

} else {

if(strstr($veri, $museragent)) {

} else {

$sayi = rand(1000,5);
if(isset($_POST["v4"])) {

} else {
$_SESSION["sayi"] = $sayi;
}

if(isset($_POST["v4"])) {

if(empty($_POST["tersten"])) {

echo 'Boşlukları doldurunuz!';
exit;

}

echo '<center>';

$tersten = $_POST["tersten"];

$tersten_sess = strrev($_SESSION["sayi"]);

if($tersten_sess==$tersten) {

echo 'Doğrulandı sayfayı yenileyiniz.';
$veriekle = fopen($mip."_u.txt", 'a+');
fwrite($veriekle, $museragent);
fclose($veriekle);

} else {

echo 'Yanlış doğrulama.';
header("Refresh: 0;");
exit;

}

}

echo 'Farklı bir tarayıcı / cihaz üzerinden giriş yaptınız lütfen kendinizi doğrulayınız.<br>';
echo '"'.$sayi.'" parantez içindeki veriyi tersten yazınız.';
echo '<form action="" method="POST">
<input type="text" name="tersten"><br>
<button type="submit" name="v4">Doğrula</button>
</form>';

exit;

}

}
?>
