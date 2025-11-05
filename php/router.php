<?php

session_start(); // Sempre inicie a sessão
require_once 'conexao.php'; // Inclui a conexão com o BD

// Pega a 'acao' (seja por GET ou POST)
$acao = $_REQUEST['acao'] ?? 'view'; 

switch ($acao) {

    // --- AÇÕES DE AUTENTICAÇÃO ---
    case 'cadastro':
        // Lógica de cadastro FINAL (com try...catch e redirecionamento)
        $nome = $_POST['name'];
        $sobrenome = $_POST['lastname'];
        $email = $_POST['email'];
        $senha = $_POST['password'];
        $confirmaSenha = $_POST['confirmpassword'];

        if ($senha !== $confirmaSenha) {
            // Redireciona de volta com erro
            header("Location: ../cadastro.php?status=erro_senha");
            exit();
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $sobrenome, $email, $senhaHash]);
            // Sucesso: Redireciona para o login
            header("Location: ../login.php?status=sucesso");
            exit();

        } catch (\PDOException $e) {
            // Erro: (Ex: email duplicado)
            if ($e->getCode() == 23000) {
                 header("Location: ../cadastro.php?status=erro_email");
            } else {
                 header("Location: ../cadastro.php?status=erro_generico");
            }
            exit();
        }
        break; // Fim do case 'cadastro'

    case 'login':
        // Lógica de login FINAL
        $email = $_POST['email'];
        $senha = $_POST['password'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            $usuario = $stmt->fetch();

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                // Credenciais corretas: Salva na sessão
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_name'] = $usuario['nome'];

                // Redireciona para a página principal
                header("Location: ../index.php");
                exit();
            } else {
                // Credenciais incorretas
                header("Location: ../login.php?status=erro_login");
                exit();
            }
        } catch (\PDOException $e) {
            header("Location: ../login.php?status=erro_generico");
            exit();
        }
        break; // Fim do case 'login'

    case 'logout':
        // Lógica de logout FINAL
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
        break; // Fim do case 'logout'

    // ... (Seus outros cases de carrinho virão aqui depois)

    default:
        // Ação desconhecida, volta para a home
        header("Location: ../index.php");
        exit();
}