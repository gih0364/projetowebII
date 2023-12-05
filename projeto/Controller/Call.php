<?php

namespace QI\SistemaDeChamados\Controller;

use Exception;
use QI\SistemaDeChamados\Model\Book;
use QI\SistemaDeChamados\Model\Repository\BookRepository;
use QI\SistemaDeChamados\Model\Cadastro;
use QI\SistemaDeChamados\Model\RegisterBooks;

session_start();
switch ($_GET["operation"]) {
    case "insert":
        insert();
        break;
    case "findAll":
        findAll();
        break;
    default:
        $_SESSION["msg_warning"] = "Operação inválida!!!";
        header("location:../View/message.php");
        exit;
}

function insert()
{
    if (empty($_POST)) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado!!!";
        header("location:../View/message.php");
        exit;
    }
    $book = new Book(
        intval($_POST["titlebook"]),
        $_POST["authorname"],
        $_POST["numberchapters"],
        $_POST["description"],
        $_POST["genderbook"]
    );

    $book->id = $_POST["book_number"];

    $cadastro = new Cadastro($_POST["user_email"]);
    $cadastro->id = 1;

    $registerbook = new RegisterBooks(
        $cadastro,
        $book,
        $_POST["titlebook"],
        $_POST["authorname"],
        $_POST["namberchapters"],
        $_POST["description"],
        $_POST["genderbook"],
    );
    // TODO Validar os dados recebidos
    $errors = array();

    if (!empty($errors)) {
    }

    try {
        $book_repository = new BookRepository();
        $result = $book_repository->insert($book);

        if ($result) {
            $_SESSION["msg_success"] = "Chamado registrado com sucesso!!!";
        } else {
            $_SESSION["msg_warning"] = "Lamento, não foi possível registrar o chamado!!!";
        }
    } catch (Exception $exception) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado em nossa base de dados";
        $log = $exception->getFile() . " - " . $exception->getLine() . " - " . $exception->getMessage();
        Logger::writeLog($log);
    } finally {
        header("location:../View/message.php");
        exit;
    }
}
function findAll(){
    $book_repository = new BookRepository();
    $_SESSION["dashboard"] = $book_repository->findAll();
    header("location:../View/dashboard.php");
}