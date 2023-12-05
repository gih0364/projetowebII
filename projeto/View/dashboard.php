<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo!</title>
    <link rel="stylesheet" href="dashboard.css">     
</head>

<body>
<nav class="d-flex justify-content-center">
<div>
        <h2>VirtualLibrary</h2>
        <img src="logo.png" alt="logo">
        <h1>Bem-vindo de volta</h1>
</div>
</nav>

<nav class="d-flex justify-content-center">
<div>
        <a href="add-new-call.html"  
        class="text-sm-center">Adicionar livros</a>

        <a href=""  
        class="text-sm-center">Editar livros</a>

        <a href=""  
        class="text-sm-center">Excluir livros</a>

        <a href=""  
        class="text-sm-center">Visualizar perfil</a>

        <a href="index.html"
        class="text-sm-center">Sair da conta</a>
</div>
</nav>
<main>
    <table>
            <thead>
            <th>Título do livro</th>
            <th>Nome do autor</th>
            <th>Número de pag.</th>
            <th>Descrição</th>
            <th>Gênero</th>
            </thead>

            <tbody>
            <?php
                if (empty($_SESSION["dashboard"])) :
                ?>
                    <td colspan=6 class="text-center fw-bold">
                        Não existem chamados cadastrados
                    </td>
                <?php
           endif;
           foreach ($_SESSION["dashboard"] as $call) :
           ?>
               <tr>
                   <td>
                <?= $book["id"] ?>
            </td>
            <td>
                <?= $book["titlebook"] ?>
            </td>
            <td>
                <?= $book["authorname"] ?>
            </td>
            <td>
                <?= $book["numberchapters"] ?>
            </td>
            <td>
                <?= $book["description"] ?>
            </td>
            <td>
                <?= $book["genderbook"] ?>
            </td>
            </tr>
            <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>