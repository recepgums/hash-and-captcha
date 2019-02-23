<?php

header('Content-type: image/png');
$image=imagecreate(170, 60);
$arkaplan=imagecolorallocate($image,255,255,255);
$yazi=imagecolorallocate($image,rand(0,255), rand(0,255),rand(0,255));
imagefill($image,0,0,$arkaplan);
$kod=substr(md5(rand(00000000,25555555)),0,6);
session_start();
$_SESSION['kod']=$kod;
$font=dirname(__FILE__) . "/planet benson 2.ttf";
imagettftext($image,22, rand(5,20),35,40,$yazi,$font,$kod);
imagepng($image);
imagedestroy($image);

?>