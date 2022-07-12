<?php

$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$pass= md5($pass."pas554"); 

    $mysql = new mysqli('localhost','root','','authorization-bd'); //host, user name, password, db name
    
    $result= $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

    $user= $result->fetch_assoc();//получаенные данные с запроса конвертируем в массив
   if(!is_countable($user)){
       echo "Такой пользователь не найден";
      exit();
   }

   setcookie('user', $user['name'], time() +3600,"/");

    $mysql->close();

    header('Location: /authorization/index.php');

?>