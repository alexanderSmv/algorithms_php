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
        <form action="rename.php" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control" name="f_name" id="f_name"  value="<?= $_COOKIE['f_name']?>"><br>
            <input type="text" class="form-control" name="l_name" id="l_name" value="<?= $_COOKIE['l_name']?>"><br>
            <input type="text" class="form-control" name="login" id="login" value="<?= $_COOKIE['user']?>"><br>
            <input type="password" class="form-control" name="pas" id="pas" value="<?= $_COOKIE['password']?>"><br>
            <input type="file" class="btn btn-success" name="fileToUpload" id="fileToUpload" value="<?=$_COOKIE['img']?>"> <hr>
            <input value="Update" type="submit" class="btn">
        </form>
    </div>
</div>
</body>
</html>
