<?php
//выборка рнадомная добавить много записей и фото
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
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover, a:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>

<h2 style="text-align:center">Registred profile</h2>
<div class="card">
    <?php echo "<img src=".$user['img']." style=\"width:100%\">";?>
    <h1 >
         <?php echo $user['f_name']." ".$user['l_name']."<br>";
         echo $user['login'];
        ?>
    </h1>
    <p class="title">CEO & Founder, Example</p>
    <p>Harvard University</p>
    <div style="margin: 24px 0;">
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
    </div>
    <p> <button><a style="color: white" href="/">Go Back</a></button>
<!--        <button><a style="color: white" href="index.php">Go back</a></button>-->
    </p>
</div>

</body>
</html>
