<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $_POST['paciente_id'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO evolucoes (paciente_id, data_evolucao, descricao)
            VALUES ('$paciente_id', NOW(), '$descricao')";

    if ($conn->query($sql) === TRUE) {
        echo "Evolução registrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$paciente_id = $_GET['id'];
$sql = "SELECT nome_completo FROM pacientes WHERE id = $paciente_id";
$result = $conn->query($sql);
$paciente = $result->fetch_assoc();

$sql = "SELECT * FROM evolucoes WHERE paciente_id = $paciente_id ORDER BY data_evolucao DESC";
$evolucoes = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Evolução do Paciente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="imgs/carlasub.jpg" alt="Logo">
        <h1>Evolução do Paciente: <?php echo $paciente['nome_completo']; ?></h1>
    </header>
    <nav>
        <a href="index.php">Início</a>
        <a href="menu_pacientes.php">Menu de Pacientes</a>
    </nav>
    <h2>Adicionar Evolução</h2>
    <form method="post" action="evolucao_paciente.php?id=<?php echo $paciente_id; ?>">
        <input type="hidden" name="paciente_id" value="<?php echo $paciente_id; ?>">
        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" required></textarea>
        <button type="submit">Adicionar</button>
    </form>
    <h2>Evoluções Anteriores</h2>
    <ul>
        <?php while ($row = $evolucoes->fetch_assoc()) { ?>
            <li><?php echo $row['data_evolucao']; ?>: <?php echo $row['descricao']; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
