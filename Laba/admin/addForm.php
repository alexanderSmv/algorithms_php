<?php
//$curIndex=$_GET['index'];
//$con=mysqli_connect("laba","root", "","testdb");
//if($con->connect_error){
//    die("Connection failed: ".$con->connect_error);
//}
////$sql="SELECT * FROM `users` ORDER BY RAND() LIMIT 1";
//$result=$con->query("SELECT * FROM `users` WHERE `id` = '$curIndex'");
////"SELECT * FROM `users`
////                                    WHERE `login`='$login' AND `pas`='$pas'"
//$user= $result->fetch_assoc();
//if(count($user)==0){
//    echo "Такой пользователь не найден!";
//    exit;
//}
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
<div class="row">
    <div class="col">
        <h2>Add new user</h2>
        <form action="../check.php" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Enter first name"><br>
            <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Enter last name"><br>
            <input type="text" class="form-control" name="login" id="login" placeholder="Enter login"><br>
            <input type="password" class="form-control" name="pas" id="pas" placeholder="Enter password"><br>
            <select class="form-control" name="id_role" id="id_role">
                <option>1</option>
                <option>2</option>
            </select><br>
            <input type="file" class="btn btn-success" name="fileToUpload" id="fileToUpload" value="select img"> <hr>
            <input value="Sign Up" type="submit" class="btn">
            <a style="color: #dddddd" href="../">Go Back</a>
        </form>

    </div>
</body>
</html>
