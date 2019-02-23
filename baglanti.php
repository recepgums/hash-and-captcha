<?php
$oldu=mysqli_connect("localhost","root","","hash_deneme");

$tumu=mysqli_query($oldu,"select* from kullanici");
$oku=mysqli_fetch_array($tumu);
?>