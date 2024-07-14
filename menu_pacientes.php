<?php
include 'conexao.php';
$sql = "SELECT id, nome_completo FROM pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu de Pacientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <img src="imgs/carlasub.jpg" alt="Logo">
        <h1>Menu de Pacientes</h1>
    </header>
    <nav>
        <a href="index.php">Início</a>
    </nav>
    <h2>Selecione um Paciente</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li><a href="evolucao_pacientes.php?id=<?php echo $row['id']; ?>"><?php echo $row['nome_completo']; ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>
