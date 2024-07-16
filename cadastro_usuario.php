<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $nome_usuario = $_POST['nome_usuario'];
    $senha = md5($_POST['senha']);
    $tipo_usuario = $_POST['tipo_usuario'];

    $sql = "INSERT INTO usuarios (nome_completo, endereco, telefone, nome_usuario, senha, tipo_usuario) VALUES ('$nome_completo', '$endereco', '$telefone', '$nome_usuario', '$senha', '$tipo_usuario')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href = 'login.php';</script>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="imgs/carlasub.jpg" alt="Logo" width="200" height="250">
        <h1>Cadastro de Usuário</h1>
    </header>
    <form method="POST" action="">
        <label for="nome_completo">Nome Completo</label>
        <input type="text" id="nome_completo" name="nome_completo" required>

        <label for="endereco">Endereço</label>
        <input type="text" id="endereco" name="endereco" required>

        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" required>

        <label for="nome_usuario">Nome de Usuário</label>
        <input type="text" id="nome_usuario" name="nome_usuario" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <label for="tipo_usuario">Tipo de Usuário</label>
        <select id="tipo_usuario" name="tipo_usuario" required>
            <option value="Administrador">Administrador</option>
            <option value="Doutora">Doutora</option>
            <option value="Secretaria">Secretaria</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
