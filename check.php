<?php 
    $login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
    $name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
    $pass=filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

    if(mb_strlen($login)<3 || mb_strlen($login)>90){
        echo "Недопустимая длина логина";
        exit();
    }
    else if(mb_strlen($name)<3 || mb_strlen($name)>90){
        echo "Недопустимая длина имени";
        exit();
    } 
    else if(mb_strlen($pass)<5 || mb_strlen($pass)>8){
        echo "Недопустимая длина пароля (от 5 до 8 символов)";
        exit();
    }
    
    $pass= md5($pass."pas554"); 

    $mysql = new mysqli('localhost','root','','authorization-bd'); //host, user name, password, db name
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`) VALUES('$login','$pass','$name')");
    $mysql->close();

    header('Location: /authorization/index.php');

?>