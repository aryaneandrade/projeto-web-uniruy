<?php
//Incluir o arquivo de conexão
require_once 'conexao.php';

//validar os dados recebidos
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
    die("Erro: Por favor, preencha todos os campos obrigatórios.");
}

if ($_POST['password'] !== $_POST['confirmpassword']) {
    die("Erro: As senhas não coincidem.");
}

//Coletar dados do formulário
$nome = $_POST['name'];
$sobrenome = $_POST['lastname'];
$email = $_POST['email'];
                 // NUNCA armazene senhas em texto puro! Use password_hash.
$senhaHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

//executar a inserção no banco de dados
try {
    $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$nome, $sobrenome, $email, $senhaHash]);

    //Redirecionar para a página de login - uma mensagem de sucesso
    header("Location: ../login.php?status=sucesso"); // Tem que apontar o caminho aqui
    exit();

} catch (\PDOException $e) {
    // Tratar erros, como email duplicado
    if ($e->getCode() == 23000) {
        die("Erro: Este email já está cadastrado.");
    }
    die("Erro ao cadastrar usuário: " . $e->getMessage());
}
