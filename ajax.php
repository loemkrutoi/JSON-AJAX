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

$array = json_decode(json: file_get_contents(filename: 'php://input'), //способ чтения содержимого файла в строку
associative: true);
$login = $array['login'];
$select = "SELECT * FROM `users` WHERE `login` = '$login'";
$query = $link -> prepare (query: $select);
$query-> execute();
$result = $query -> get_result();

if($result -> num_rows > 0){
    foreach ($result as $row) {
    echo 'ПРивет ' . $row['login-kurator'];
    };
}
else {
    echo '<p>' . 'Данного пользователя не существует' . '<a href="reg.html">' . 'зарегистрируйтесь' . '</a>'. '</p>';
}

?>