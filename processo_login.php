<?php
session_start(); // Inicia a sessão no topo do script
require_once 'conexao.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    die("Erro: Email e senha são obrigatórios.");
}

$email = $_POST['email'];
$senha = $_POST['password'];

try {
    // Busca o usuário pelo email
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    // Verifica se o usuário existe e se a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Credenciais corretas, armazena dados na sessão
        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user_name'] = $usuario['nome'];

        // Redireciona para a página principal
        header("Location: ../index.php"); //Ainda tem que adicionar o caminho
        exit();
    } else {
        // Credenciais incorretas
        header("Location: ../login.php?status=erro"); //Ainda tem que adicionar o caminho
        exit();
    }

} catch (\PDOException $e) {
    die("Erro de login: " . $e->getMessage());
}
