<?php 

try{
    $db_connect =   new PDO('mysql:dbname=egtim;host=localhost;charset=UTF8','root','');
}catch (PDOException $exception){
    echo "MYSQL Bağlantı Hatası <br/>";
    echo "Hata Açıklaması : ".$exception->getMessage();
    die();
}

function Filter($Deger)
{
    $step_one   =   trim($Deger);
    $step_two   =   strip_tags($step_one);
    $step_trhee =   htmlspecialchars($step_two,ENT_QUOTES);
    return $step_trhee;
}

if (isset($_SESSION['user'])){
    $query = $db_connect->prepare('SELECT * FROM uyeler WHERE kullaniciadi=?');
    $query->execute([$_SESSION['user']]);

    $user_count = $query->rowCount();
    $user       =   $query->fetch(PDO::FETCH_ASSOC);

    if ($user_count > 0) {
        $user_name  =   $user['adisoyadi'];
    }else{
        $user_name  =   "";
    }


}

