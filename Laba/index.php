<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--    <meta name="viewport">-->
    <title>Registration form</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="css/style.css">-->
    <link rel='stylesheet' href='css/style.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>
<body>
<div class="container">
    <?php
        if($_COOKIE['user'] == ''):
    ?>
    <div class="visitor"><h1>Привет новый пользователь!</h1></div>
    <div class="row">
        <div class="col">
            <h2>Registration form</h2>
            <form action="check.php" method="post" enctype="multipart/form-data">
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
            </form>
        </div>

        <div class="col">
            <h2>Authorisation form</h2>
            <form action="auth.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="login" id="login" placeholder="Enter login"><br>
                <input type="password" class="form-control" name="pas" id="pas" placeholder="Enter password"><br>
                <input value="Sign In" type="submit" class="btn">
            </form>
        </div>

            <table class="tab">
                <tr align="center" bgcolor="red">
                    <th colspan="5"> Наши лучшие пользователи!</th>
                </tr>
                <tr>
                    <th>Id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Login</th>
                    <th>Role</th>
                </tr>
                <?php
                $con=mysqli_connect("laba","root", "","testdb");
                if($con->connect_error){
                    die("Connection failed: ".$con->connect_error);
                }
                $sql="SELECT * FROM `users`,`roles` WHERE `users`.`id_role`=`roles`.`id_r`" ;
                $result_users=$con->query($sql);

                if ($result_users->num_rows>0){
                    $index=0;
                    while ($row=$result_users->fetch_assoc()){
                        echo "<tr><td>"
                                ."<a  href='generateUserInfo.php?id=".$row['id']."'>".$row['id']."</a>"
                                ."</td><td>".$row['f_name']."</td><td>".$row['l_name'].
                                "</td><td>".$row['login']."</td><td>".$row['title']."
                            </td></tr>";
                    }
                }
                else{
                    echo "none in table";
                }
                ?>
            </table>

<!--        <div class="col">-->
            <?php elseif($_COOKIE['user'] == 'admin'): ?>

                <div class="card">
                    <img src="<?=$_COOKIE['img']?>" alt="John" style="width:100%">
                    <h1 >
                        Hello <?= $_COOKIE['f_name']?>
                    </h1>
                    <p class="title">CEO & Founder, Example</p>
                    <p>Harvard University</p>
                    <div style="margin: 24px 0;">
                        <p><button><a style="color: white" href="redact.php">Redact</a></button></p>
                        <p><button><a style="color: white" href="admin/addForm.php">Add new user</a></button></p>
                        <p><button><a style="color: white" href="exit.php">Exit</a></button></p>
                    </div>

                </div>
                <table class="tab">
                    <tr align="center" bgcolor="red">
                        <th colspan="5"> Наши лучшие пользователи!</th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Login</th>
                        <th>Role</th>
                    </tr>
                    <?php
                    $con=mysqli_connect("laba","root", "","testdb");
                    if($con->connect_error){
                        die("Connection failed: ".$con->connect_error);
                    }
                    $sql="SELECT * FROM `users`,`roles` WHERE `users`.`id_role`=`roles`.`id_r`" ;
                    $result_users=$con->query($sql);

                    if ($result_users->num_rows>0){
                        $index=0;
                        while ($row=$result_users->fetch_assoc()){
                            echo "<tr><td>"
                                ."<a  href='admin.php?id=".$row['id']."'>".$row['id']."</a>"
                                ."</td><td>".$row['f_name']."</td><td>".$row['l_name'].
                                "</td><td>".$row['login']."</td><td>".$row['title']."
                            </td></tr>";
                        }
                    }
                    else{
                        echo "none in table";
                    }
                    ?>
                </table>


            <?php else:?>
                <div class="card">
                    <img src="<?=$_COOKIE['img']?>" alt="John" style="width:100%">
                    <h1 >
                        Hello <?= $_COOKIE['f_name']?>
                    </h1>
                    <p class="title">CEO & Founder, Example</p>
                    <p>Harvard University</p>
                    <div style="margin: 24px 0;">
                        <p><button><a style="color: white" href="redact.php">Redact</a></button></p>
                    </div>
                    <p><button><a style="color: white" href="exit.php">Exit</a></button></p>
                </div>
                <table class="tab">
                    <tr align="center" bgcolor="red">
                        <th colspan="5"> Наши лучшие пользователи!</th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Login</th>
                        <th>Role</th>
                    </tr>
                    <?php
                    $con=mysqli_connect("laba","root", "","testdb");
                    if($con->connect_error){
                        die("Connection failed: ".$con->connect_error);
                    }
                    $sql="SELECT * FROM `users`,`roles` WHERE `users`.`id_role`=`roles`.`id_r`" ;
                    $result_users=$con->query($sql);

                    if ($result_users->num_rows>0){
                        $index=0;
                        while ($row=$result_users->fetch_assoc()){
                            echo "<tr><td>"
                                ."<a  href='generateUserInfo.php?id=".$row['id']."'>".$row['id']."</a>"
                                ."</td><td>".$row['f_name']."</td><td>".$row['l_name'].
                                "</td><td>".$row['login']."</td><td>".$row['title']."
                            </td></tr>";
                        }
                    }
                    else{
                        echo "none in table";
                    }
                    ?>
                </table>

        <?php endif; ?>


</body>
</html>