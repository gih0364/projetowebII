<?php 
session_start();
$users = array(
      array(
        "name" => "João",
        "email" => "joao@gmail.com",
        "password" => password_hash("123456", 
        PASSWORD_DEFAULT),
      ),
      array(
        "name" => "Maria",
        "email" => "maria@gmail.com",
        "password" => password_hash("123456", 
        PASSWORD_DEFAULT),
      )
);

if (empty($_POST)) {
    $_SESSION["msg_error"] = "
    <p>Ops, Houve um erro inesperado</p>
    <a href='index.html'>Voltar</a>
    ";
    header("location:../Controller/message.php");
    exit;
}

$email = $_POST["email"];
$password = $_POST["password"];

foreach($users as $user){
   if ($user["email"] == $email && password_verify($password, $user["password"])){
        $_SESSION["email"] = $user["email"];
        header("location:../View/dashboard.php");
        exit;
   }
}

$_SESSION["msg_warning"] = "<p>Usuário ou senha inválido</p> <a href='index.html'>Voltar</a>";
header("location:../Controller/message.php");