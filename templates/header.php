<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once 'php/conexao.php'; // Conecta ao BD

    $carrinho = $_SESSION['carrinho'] ?? [];
    $produtos_no_carrinho = [];
    $total_carrinho = 0.0;

    if (!empty($carrinho)) {
        // Pega os IDs dos produtos para uma consulta com seus preços
        $stmt = $pdo->prepare("
            SELECT p.*, pr.preco_normal, 
                   COALESCE(pr.preco_black_friday, pr.preco_normal) as preco
            FROM produtos p 
            LEFT JOIN precos pr ON p.id_produto = pr.id_produto 
            WHERE p.id_produto IN (" . str_repeat('?,', count(array_keys($carrinho)) - 1) . "?)
        ");
        $stmt->execute(array_keys($carrinho));
        $produtos_db = $stmt->fetchAll();

        foreach ($produtos_db as $produto) {
            $quantidade = $carrinho[$produto['id_produto']]; // Usando 'id_produto'
            $subtotal = $produto['preco'] * $quantidade;
            $total_carrinho += $subtotal;
            
            $produtos_no_carrinho[] = [
                'id_produto' => $produto['id_produto'], // Usando 'id_produto'
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => $quantidade,
                'subtotal' => $subtotal,
            ];
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <!-- CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- CSS do Projeto-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('search-form');
            const searchInput = searchForm.querySelector('input[type="search"]');

            searchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const searchTerm = searchInput.value.trim();
                if (searchTerm) {
                    window.location.href = `produtos.php?s=${encodeURIComponent(searchTerm)}`;
                }
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">ByteShop</a>
            <div class="navbar-items">
                <div></div>
                <form class="d-flex" role="search" id="search-form">
                    <input class="form-control me-2" type="search" placeholder="Busque o seu produto..."
                        aria-label="Search" />
                    <button class="btn btn-secondary" type="submit">Pesquisar</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Olá, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="php/router.php?acao=logout" class="nav-link">
                                <i class="bi bi-box-arrow-right"></i> Sair
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">
                                <i class="bi bi-person"></i> Login
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item" id="cart-item">
                        <a href="carrinho.php" class="nav-link">
                            <i class="bi bi-cart"></i>
                            <?php
                                $itens_no_carrinho = 0;
                                if (isset($_SESSION['carrinho'])) {
                                    $itens_no_carrinho = count($_SESSION['carrinho']);
                                }
                            ?>
                            <?php if ($itens_no_carrinho > 0): ?>
                                <span class="qty-info"> <?php echo $itens_no_carrinho; ?> </span>
                            <?php endif; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>