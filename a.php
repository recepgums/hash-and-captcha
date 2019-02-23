
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div align="center" style="display: block">
    <hr>
        <div align="left">
        Giriş Yap
            <form action="giris.php" method="post" >
                <input type="text" name="nick" placeholder="nickname"><br> <br>
                <input type="password" name="sifre" ><br> <br>
                <button id="btn_giris"> Gönder</button>
            </form>
            <hr>
            <hr>
        Kayıt ol
    <form action="kayit.php" method="post">
        <input type="text" name="nick"><br><br>
        <input type="password" name="sifre"><br><br>

        <button> Kayıt ol</button>
    </form>

    </div>
    <hr>
    <hr>
</div>
<script>
    function captchayi_yenile() {
        $('.new_captcha').html('<img src="yeni.php">');
    }
</script>
Ajax ile Giriş <br>
<input id="ajax_nick" type="text" placeholder="kullanıcı adı..."><br>
<input id="ajax_sifre"type="password" placeholder="sifre"><br>
<div id="sonuc" style="color:red;display:none;height: 150px;width: 600px"></div>

<button id="btn_girisi" onclick="tikla()"> gonder</button><span id="sifre_yenile" style="display: none">Çok fazla yanlış girdiniz. <a href='#'>Şifrenizi mi unuttunuz</a></span>
<hr>
<script>
    function  tikla() {
        $.ajax({
            url: "ajax_giris.php", type: "post", data: {id:$("#ajax_nick").val(),ajx_sif:$("#ajax_sifre").val(),captcha:$('#captcha').val()}, success: function (result) {
                $("#sonuc").css("display", "block");
                $("#sonuc").html(result);

            }
        })
    }

</script>

    </body>
</html>