<?php
////$file_path='public/images/';
////$f_name=trim($_POST['f_name']);
////$l_name=trim($_POST['l_name']);
////$login=trim($_POST['login']);
////$pas=trim($_POST['pas']);
////$id_role=trim($_POST['id_role']);
////$fileToUpload=trim($_POST['fileToUpload']);
//////echo $f_name.",   ".$l_name.",   ".$login.",   ".$pas.",   ".$id_role.",   ".$fileToUpload.",   ".$file_path;
////
////if((mb_strlen($f_name)==0)or(mb_strlen($f_name)>35)){
////    echo "Недопустимая длинна имени!<br>";
////    echo "<a href='_index.html'>Попробуйте снова</a>";
////    exit;
////} elseif((mb_strlen($l_name)==0)or(mb_strlen($l_name)>35)){
////    echo "Недопустимая длинна фамилии!<br>";
////    echo "<a href='_index.html'>Попробуйте снова</a>";
////    exit;
////}elseif((mb_strlen($login)==0)or(mb_strlen($login)>35)){
////    echo "Недопустимая длинна логина! <br>";
////    echo "<a href='_index.html'>Попробуйте снова</a>";
////    exit;
////}elseif((mb_strlen($pas)<6)or(mb_strlen($pas)>12)){
////    echo "Недопустимый парооль (Длина 6-12 символов)<br>";
////    echo "<a href='_index.html'>Попробуйте снова</a>";
////    exit;}
////}elseif (($id_role!==1)or($id_role!==2)){
////    echo "Вы не выбрали роль!<br>";
////    echo "<a href='_index.html'>Попробуйте снова!</a>";
////    exit;
////}
//
$mysql = new mysqli('laba','root','','testdb');
if ($mysql ===false){
    die("Error: Couldn't connect!". mysqli_connect_error());
}else{
    //перемещаем файл в каталог, сохраняем в бд инфу
    $target_dir = "public/images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
//    echo $target_file;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
//            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
//            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
//        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
//        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
//        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
//        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
//            echo "Sorry, there was an error uploading your file.";
        }
    }


    $f_name=trim($_POST['f_name']);
    $l_name=trim($_POST['l_name']);
    $login=trim($_POST['login']);
    $pas=trim($_POST['pas']);
    $id_role=trim($_POST['id_role']);
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

    $mysql->query("INSERT INTO `users`(`f_name`, `l_name`, `pas`, `id_role`, `login`, `img`)
            VALUES('$f_name','$l_name','$pas','$id_role','$login', '$target_file') ");
    $mysql->close();

    header('Location: /');
}



























//
//$servername = "laba";
//$username = "root";
//$password = "";
//$database = "testdb"; //повинна бути створена в субд
//
//// Встановлення з'єднання
//$conn = new mysqli($servername, $username, $password, $database);
//
//if ($conn ===false){
//    die("Error: Couldn't connect!". mysqli_connect_error());
//}else{
////перемещаем файл в каталог, сохраняем в бд инфу
//    $target_dir = "public/images/";
//    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//    $uploadOk = 1;
//    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//// Check if image file is a actual image or fake image
//    if (isset($_POST["submit"])) {
//        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//        if ($check !== false) {
////            echo "File is an image - " . $check["mime"] . ".";
//            $uploadOk = 1;
//        } else {
////            echo "File is not an image.";
//            $uploadOk = 0;
//        }
//    }
//// Check if file already exists
//    if (file_exists($target_file)) {
////        echo "Sorry, file already exists.";
//        $uploadOk = 0;
//    }
//// Check file size
//    if ($_FILES["fileToUpload"]["size"] > 5000000) {
////        echo "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }
//// Allow certain file formats
//    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//        && $imageFileType != "gif") {
////        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//        $uploadOk = 0;
//    }
//// Check if $uploadOk is set to 0 by an error
//    if ($uploadOk == 0) {
////        echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//    } else {
//        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
////            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
//        } else {
////            echo "Sorry, there was an error uploading your file.";
//        }
//    }
//    ///////////////////////////////////////////////////////////////заполняем бд
//
//    $f_name=$_POST['f_name'];
//    $l_name=$_POST['l_name'];
//    $pas=$_POST['pas'];
//    $id_role=$_POST['id_role'];
//    $login=$_POST['login'];
//    $img=$_POST['fileToUpload'];
//
//    $sql="INSERT INTO `users`(`f_name`, `l_name`, `pas`, `id_role`, `login`, `img`)
//            VALUES('$f_name','$l_name','$pas','$id_role','$login', '$target_file') ";
//
//
//    if(mysqli_query($conn, $sql)){
////        echo "Records inserted successfully.";
////        header("Location: registered.php");
////Название файла
////        echo basename($_FILES["fileToUpload"]["name"]);
//        echo $target_file;
//        exit();
//
//    } else{
//        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
//    }
//    mysqli_close($conn);
//}