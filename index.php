<?php
session_start();
ob_start();
require_once "connect.php";
?>
<!doctype html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Uyelik Sistemi</title>
</head>
<body>
<table width="1000" height="600" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="5" height="100" bgcolor="#CCCCCC">ÜST ALAN (HEADER ALANI) (LOGO - BANNER - MENULER Vs.)</td>
    </tr>
    <tr>
        <td colspan="5" height="20">&nbsp;</td>
    </tr>
    <tr>
        <td width="200" valign="top" height="400" bgcolor="#CCCCCC"><a href="index.php" style="text-decoration: none; color: black;">Ana Sayfa</a></td>
        <td width="10" height="400">&nbsp;</td>
        <td width="480" height="400" bgcolor="#CCCCCC">İÇERİK ALANI (MAIN ALANI)</td>
        <td width="10" height="400">&nbsp;</td>
        <td width="300" height="400" valign="top">

            <?php if (isset($_SESSION['user'])): ?>
                <table width="300" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td colspan="3" height="30" bgcolor="#990000" style="color: #fff">Üyelik Alanı</td>
                    </tr>
                    <tr>
                        <td colspan="3" height="30">Merhaba <?php echo $user_name;?>; </td>
                    </tr>
                    <td height="30" colspan="3" align="right">&nbsp;<a href="logout.php"><small>Çıkış Yap</small></a></td>

                </table>
            <?php else: ?>
                <form action="login.php" method="post">
                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td colspan="3" height="30" bgcolor="#990000" style="color: #fff">Üyelik Alanı</td>
                        </tr>
                        <tr>
                            <td height="30" width="100">&nbsp;Kullanıcı Adı </td>
                            <td height="30" width="10">:</td>
                            <td height="30" width="190"><input style="width: 100%" type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td height="30" width="100">&nbsp;Şifre </td>
                            <td height="30" width="10">:</td>
                            <td height="30" width="190"><input style="width: 100%" type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td height="30" width="100">&nbsp;</td>
                            <td height="30" width="10">&nbsp;</td>
                            <td height="30" width="190" align="right"><input type="submit" value="Giriş Yap"></td>
                        </tr>
                        <tr>
                            <td height="30" colspan="3" align="right">&nbsp;<a href="register.php"><small>Yeni Üye Ol</small></a></td>
                        </tr>
                    </table>
                </form>
            <?php endif; ?>


        </td>
    </tr>
    <tr>
        <td colspan="5" height="20">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5" height="100" bgcolor="#CCCCCC">ALT ALAN (FOOTER ALANI) (LOGO - BANNER - MENULER Vs.)</td>
    </tr>
</table>

</body>
</html>