<?php
session_start();
require_once "connect.php";
if (isset($_POST['username']) and isset($_POST['password'])):


    $username = Filter($_POST['username']);
    $password = Filter($_POST['password']);

    $query = $db_connect->prepare('SELECT * FROM uyeler WHERE kullaniciadi=? AND sifre=?');
    $query->execute([$username, $password]);

    $user_count = $query->rowCount();

    if ($user_count > 0) {
        $_SESSION['user'] = $username;
//        echo $username." | ".$password."<br/>";
//        echo $_SESSION['user'];
        header('Location: index.php');
        exit();
    } else {
        echo "Hata <br/>";
        echo "Girilen Bilgilere Göre Kullanıcı Bulunamadı <br/>";
        echo "<a href=\"index.php\">Anasayfa Dön</a> <br/>";
    }
else:
    echo "Hata <br/>";
    echo "Girilen Bilgilere Göre Kullanıcı Bulunamadı <br/>";
    echo "<a href=\"index.php\">Anasayfa Dön</a> <br/>";
endif;