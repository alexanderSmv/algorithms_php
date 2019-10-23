<?php
setcookie('user',$user['login'],time()-3600,"/");
//echo $user;
header('Location: /');