<?php
$curIndex=$_GET['id'];
$con=mysqli_connect("laba","root", "","testdb");
if($con->connect_error){
    die("Connection failed: ".$con->connect_error);
}
$sql="SELECT * FROM `users` ORDER BY RAND() LIMIT 1";
$result=$con->query("SELECT * FROM `users` WHERE `id` = '$curIndex'");
//"SELECT * FROM `users`
//                                    WHERE `login`='$login' AND `pas`='$pas'"
$user= $result->fetch_assoc();
if(count($user)==0){
    echo "Такой пользователь не найден!";
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='css/style.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body>
<div class="row">
    <div class="col">
        <h2>Update Your Personal Information</h2>
        <form action="admin/update.php?index=<?=$user['id']?>" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control" name="f_name" id="f_name"  value="<?= $user['f_name']?>"><br>
            <input type="text" class="form-control" name="l_name" id="l_name" value="<?= $user['l_name']?>"><br>
            <input type="text" class="form-control" name="login" id="login" value="<?= $user['login']?>"><br>
            <input type="password" class="form-control" name="pas" id="pas" value="<?= $user['pas']?>"><br>
            <select class="form-control" name="id_role" id="id_role">
                <option>1</option>
                <option>2</option>
            </select><br>
            <input type="file" class="btn btn-success" name="fileToUpload" id="fileToUpload" value="<?=$user['img']?>"> <hr>
            <input value="Update" type="submit" class="btn">
            <?php
            //        echo "<form class= \"Cform\" action=\"admin\delete.php?index=".$_GET['id']."\"><input value=\"Delete current user\" type=\"submit\" class=\"btn\" ></form>";
//            echo "<a  href='admin\update.php?index=".$user['id']."'>
//                  <img height='35px' width='35px' src='https://cdn.pixabay.com/photo/2016/03/31/18/42/icons-1294569_960_720.png'></a>  ";
            echo "<a  href='admin\delete.php?index=".$user['id']."'><img height='40px' width='40px' src='https://img.icons8.com/doodle/452/delete-sign.png'></a> ";

//            echo "<a  href='admin\addForm.php?index=".$user['id']."'><img height='40px' width='40px' src='http://s1.iconbird.com/ico/2013/6/269/w512h5121371227444friednadded.png'></a> ";
            ?>
        </form>
    </div>
</div>


</body>
</html>