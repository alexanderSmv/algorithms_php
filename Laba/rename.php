<?php
$mysql = new mysqli('laba','root','','testdb');
if ($mysql ===false){
    die("Error: Couldn't connect!". mysqli_connect_error());
}else{

    $target_dir = "public/images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        } else {
        }
    }


    $f_name=trim($_POST['f_name']);
    $l_name=trim($_POST['l_name']);
    $login=trim($_POST['login']);
    $pas=trim($_POST['pas']);
    $fileToUpload=trim($_POST['fileToUpload']);
//echo $f_name.",   ".$l_name.",   ".$login.",   ".$pas.",   ".$id_role.",   ".$fileToUpload.",   ".$file_path;

    if((mb_strlen($f_name)==0)or(mb_strlen($f_name)>35)){
        echo "Недопустимая длинна имени!<br>";
        echo "<a href='/'>Попробуйте снова</a>";
        exit;
    } elseif((mb_strlen($l_name)==0)or(mb_strlen($l_name)>35)){
        echo "Недопустимая длинна фамилии!<br>";
        echo "<a href='/'>Попробуйте снова</a>";
        exit;
    }elseif((mb_strlen($login)==0)or(mb_strlen($login)>35)){
        echo "Недопустимая длинна логина! <br>";
        echo "<a href='/'>Попробуйте снова</a>";
        exit;
    }elseif((mb_strlen($pas)<6)or(mb_strlen($pas)>12)){
        echo "Недопустимый парооль (Длина 6-12 символов)<br>";
        echo "<a href='/'>Попробуйте снова</a>";
        exit;}

$curLogin=$_COOKIE['user'];
    $mysql->query("UPDATE `users` SET `f_name` = '$f_name', `l_name` = '$l_name', `pas` = '$pas', `login` = '$login', `img` = '$target_file' WHERE `users`.`login` = '$curLogin'");
    $mysql->close();

    setcookie('user',$user['login'],time()-3600,"/");

//    $_COOKIE['f_name']=$f_name;
//    $_COOKIE['l_name']=$l_name;
//    $_COOKIE['user']=$login;
//    $_COOKIE['pas']=$pas;
//    $_COOKIE['img']=$target_file;
//        $mysql->query("UPDATE `users` SET `f_name` = '$f_name', `l_name` = '$l_name', `pas` = '$pas', `login` = '$login', `img` = '$target_file' WHERE `users`.`id` = 90");
//    $mysql->close();
//    print_r($_COOKIE);

    header('Location: /');
}