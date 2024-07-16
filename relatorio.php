<?php
include 'conexao.php';

$sql = "SELECT id, nome_completo FROM pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Pacientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="imgs/carlasub.jpg" alt="Logo">
        <h1>Relatório de Evolução do Paciente</h1>
    </header>
    <nav>
        <a href="index.php">Início</a>
        <a href="cadastro_paciente.php">Cadastrar Paciente</a>
        <a href="menu_pacientes.php">Menu de Pacientes</a>
    </nav>
    <form method="GET" action="gerar_relatorio.php">
        <label for="paciente">Selecione o Paciente</label>
        <select id="paciente" name="paciente_id" required>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nome_completo']; ?></option>
            <?php } ?>
        </select>
        <button type="submit">Gerar Relatório</button>
    </form>
</body>
</html>
