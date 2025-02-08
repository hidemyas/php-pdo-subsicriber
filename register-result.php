<?php 
require_once "connect.php";

if (isset($_POST['username'])){
    $username   =   Filter($_POST['username']);
}else{
    $username   =   "";
}

if (isset($_POST['password'])){
    $password   =   Filter($_POST['password']);
}else{
    $password   =   "";
}

if (isset($_POST['email'])){
    $email   =   Filter($_POST['email']);
}else{
    $email   =   "";
}

if (isset($_POST['name'])){
    $name   =   Filter($_POST['name']);
}else{
    $name   =   "";
}


$query = $db_connect->prepare('SELECT * FROM uyeler WHERE kullaniciadi=? OR emailadresi=?');
$query->execute([$username, $password]);

$user_count = $query->rowCount();

if ($user_count>0){
    echo "<h3>Hata</h3>";
    echo "Girilen Bilgiler ile kullanıcı adı veya email adresi başka üye tarafından kullanılmaktadır<br/>";
    echo "<a href=\"index.php\">Anasayfa Dön</a> <br/>";
}else{
    $time   =   time();
    $add    =   $db_connect->prepare('INSERT INTO uyeler (kullaniciadi,sifre,adisoyadi,emailadresi,kayittarihi) values (?,?,?,?,?)');
    $add->execute([$username,$password,$name,$email,$time]);
    $added_user_count   =   $add->rowCount();
    if ($added_user_count>0){
        echo "<h3>Tebrikler</h3>";
        echo "Hesabınız Oluşturuldu<br/>";
        echo "<a href=\"index.php\">Giriş Yap Dön</a> <br/>";
    }else{
        echo "<h3>Hata</h3>";
        echo "Beklenmeyen Bir Hata Oluştu<br/>";
        echo "Daha Sonra Tekrar Deneyiniz<br/>";
        echo "<a href=\"index.php\">Anasayfa Dön</a> <br/>";
    }

}