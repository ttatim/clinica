<?php
session_start();

// Definindo o tempo de expiração da sessão em 2 horas (7200 segundos)
$tempo_inatividade = 7200; 

// Verifica se a sessão de usuário está definida
if (!isset($_SESSION['nome_usuario'])) {
    header("Location: login.php");
    exit();
}

// Verifica a última atividade do usuário
if (isset($_SESSION['ultimo_acesso'])) {
    $tempo_passado = time() - $_SESSION['ultimo_acesso'];
    
    // Se o tempo passado desde a última atividade for maior que o tempo de inatividade, destruir a sessão e redirecionar para login
    if ($tempo_passado > $tempo_inatividade) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

// Atualiza o timestamp da última atividade do usuário
$_SESSION['ultimo_acesso'] = time();
?>

