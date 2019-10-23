<?php
$curIndex=$_GET['index'];
$con=mysqli_connect("laba","root", "","testdb");
if($con->connect_error){
    die("Connection failed: ".$con->connect_error);
}
//$sql="SELECT * FROM `users` ORDER BY RAND() LIMIT 1";
$result=$con->query("SELECT * FROM `users` WHERE `id` = '$curIndex'");
//"SELECT * FROM `users`
//                                    WHERE `login`='$login' AND `pas`='$pas'"
$user= $result->fetch_assoc();
if(count($user)==0){
    echo "Такой пользователь не найден!";
    exit;
}else{
    $con->query("DELETE FROM `users` WHERE `id`='$curIndex'");
    $con->close();
    header("Location:/");
}
?>