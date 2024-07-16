<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_usuario = $_POST['nome_usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT id FROM usuarios WHERE nome_usuario = '$nome_usuario' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['nome_usuario'] = $nome_usuario;
        $_SESSION['ultimo_acesso'] = time(); // Define o tempo da última atividade
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Login incorreto!'); window.location.href = 'login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="imgs/carlasub.jpg" alt="Logo" width="200" height="250">
        <h1>Login</h1>
    </header>
    <form method="POST" action="">
        <label for="nome_usuario">Nome de Usuário</label>
        <input type="text" id="nome_usuario" name="nome_usuario" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
