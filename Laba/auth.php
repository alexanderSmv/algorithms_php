<?php
$login=trim($_POST['login']);
$pas=trim($_POST['pas']);
//echo $pas;

$mysql = new mysqli('laba','root','','testdb');
if ($mysql ===false){
    die("Error: Couldn't connect!". mysqli_connect_error());
}else{
    $result=$mysql->query("SELECT * FROM `users` 
                                    WHERE `login`='$login' AND `pas`='$pas'");

    $user= $result->fetch_assoc();
    if(count($user)==0){
        echo "Такой пользователь не найден!";
        exit;
    }else{
        setcookie('f_name',$user['f_name'],time()+3600,"/");
        setcookie('l_name',$user['l_name'],time()+3600,"/");
        setcookie('user',$user['login'],time()+3600,"/");
        setcookie('password',$user['pas'],time()+3600,"/");
        setcookie('img',$user['img'],time()+3600,"/");

    }
}


$mysql->close();
header('Location: /');