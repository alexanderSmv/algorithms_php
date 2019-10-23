<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border='3' bgcolor="#F0E68C" cellpadding='10' cellspacing='10' bordercolor='#800000'align='center' >
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
    $sql="SELECT * FROM `users`,`roles` WHERE `users`.`id_role`=`roles`.`id_role`" ;
    $result_users=$con->query($sql);

    if ($result_users->num_rows>0){
        while ($row=$result_users->fetch_assoc()){
            echo "<tr><td>".$row['id']."</td><td>".$row['f_name']."</td><td>".$row['l_name']."</td><td>".$row['login']."</td><td>".$row['id_role']."</td></tr>";
        }
    }
    else{
        echo "none in table";
    }

    ?>
</table>

</body>
</html>