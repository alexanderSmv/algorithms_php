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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <?php
        if($_COOKIE['user'] == ''):
    ?>
    <div class="row">
        <div class="col">
            <h1>Registration form</h1>
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
            <h1>Authorisation form</h1>
            <form action="auth.php" method="post" enctype="multipart/form-data">
                <input type="text" class="form-control" name="login" id="login" placeholder="Enter login"><br>
                <input type="password" class="form-control" name="pas" id="pas" placeholder="Enter password"><br>
                <input value="Sign In" type="submit" class="btn">
            </form>
        </div>
            <?php else:?>
                <p>Hello <?= $_COOKIE['user']?>. Чтоб выйти нажми <a href="exit.php">сюда</a></p>

        <?php endif; ?>

</div>
</body>
</html>