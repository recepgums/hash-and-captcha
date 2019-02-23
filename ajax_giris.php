<?php
session_start();
include ("baglanti.php");

$ajax_nick=$_POST['id'];
$ajax_sifre=$_POST['ajx_sif'];
$kayitli_sifre=mysqli_query($oldu,"select sifre from kullanici where nick='$ajax_nick'");//aa bidk
$kayitli_sifre=mysqli_fetch_array($kayitli_sifre);
$nick_dogru_mu=mysqli_query($oldu,"select nick from kullanici where nick='$ajax_nick'");
$nick_dogru_mu=mysqli_fetch_array($nick_dogru_mu);
$sifre_dogru_mu=password_verify($ajax_sifre,$kayitli_sifre['sifre']);
$zorlama=mysqli_query($oldu,"select zorlama from kullanici where nick='$ajax_nick'");
$zorlama_sonucu=mysqli_fetch_array($zorlama);
if($nick_dogru_mu['nick'] and $sifre_dogru_mu) {
    echo   "kayıtlı".'<br>';

    mysqli_query($oldu,"update kullanici set zorlama=0 where nick='$ajax_nick'");
    echo $kayitli_sifre['sifre'];
}else{
    $zorlama_sayisi = $zorlama_sonucu['zorlama'] + 1;
    mysqli_query($oldu, "update kullanici set zorlama='$zorlama_sayisi' where nick='$ajax_nick'");
    if($zorlama_sonucu['zorlama']<3) {
        echo "Şifre yanlış";
        echo $_SESSION["first"];
    }else{
        if(isset($_POST["captcha"])) {
            if (strtolower($_POST["captcha"]) != $_SESSION["kod"]) {
                echo "Captcha Yanlış";
                echo '<script>captchayi_yenile();</script>';
            }
        }
        echo '<script>
            $("#sifre_yenile").css("display","block");
        </script>
        <div class="new_captcha"><img src="yeni.php"></div><br>
        <span onclick="captchayi_yenile()" style="cursor: pointer;">Yenile</span><br>
        <input type="text" name="captcha" id="captcha"
        <hr>
    ';
    }
}
?>
<script>

</script>
