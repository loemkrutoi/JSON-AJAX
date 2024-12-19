<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'KR_LOEM_04';
try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $error)
{
    echo "failed to access the database" . $error -> getMessage();
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $select = "SELECT * FROM `users` WHERE `login = '$login'";
    $querySelect = $link -> prepare (query: $select);
    $querySelect -> execute();
    $resultSelect = $querySelect -> get_result();
    if($resultSelect -> num_rows > 0){
        echo 'Данный пользователь уже существует';
    }
    else{
        $insert = "INSERT INTO `users` (`login`)
        VALUES ('$login')";
        $query = $link -> prepare (query: $insert);
        $query-> execute();
        echo "Вы зарегистрированы";
    }
}
?>