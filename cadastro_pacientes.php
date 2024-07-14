<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO pacientes (nome_completo, data_nascimento, endereco, cidade, estado)
            VALUES ('$nome', '$data_nascimento', '$endereco', '$cidade', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Paciente cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="imgs/carlasub.jpg" alt="Logo">
        <h1>Cadastro de Pacientes</h1>
    </header>
    <form method="post" action="cadastro_pacientes.php">
        <label for="nome">Nome Completo</label>
        <input type="text" id="nome" name="nome" required>

        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>

        <label for="endereco">Endereço</label>
        <input type="text" id="endereco" name="endereco" required>

        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" name="cidade" required>

        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
        </select>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
