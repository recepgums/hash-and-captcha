<?php
session_start();
include ("baglanti.php");
$gelen_isim=$_POST['nick'];
$sifre=$_POST['sifre'];
$gelen_sifre=password_hash($sifre,PASSWORD_DEFAULT);
$yaz=mysqli_query($oldu,"INSERT INTO kullanici( `nick`, `sifre`) VALUES ('$gelen_isim','$gelen_sifre')");
if($yaz){
    echo "yazildi       " ;
    print_r($_SESSION);
}
?>