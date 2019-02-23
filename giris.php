<?php
session_start();
include ("baglanti.php");
    $nick=$_POST['nick'];
    $sifre=trim($_POST['sifre']);
    $sifre_sorgu=mysqli_query($oldu,"select sifre from kullanici where nick='$nick'");
    $yeni=mysqli_fetch_array($sifre_sorgu);
    $hashli_sifre=$yeni['sifre'];
    echo $sifre.'<br>'. $hashli_sifre.'<br>';
    $ayni_mi=password_verify($sifre,$hashli_sifre);
    if($ayni_mi){
        echo "doğru şifre"." bu arada  " . $_SESSION["first"];
    }else{
        echo "yanlış şifre";
    }
?>