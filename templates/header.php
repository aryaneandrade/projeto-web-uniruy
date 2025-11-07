<?php 
session_start(); 
// Debug temporário
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByteShop</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- CSS do Projeto-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Bootstrap  JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer></script>
</head>

<body>
    <!--NAVBAR -->
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
                    <li class="nav-item">
                        <?php if(isset($_SESSION['user_name'])): ?>
                            <a href="login.php" class="nav-link">
                        <i class="bi bi-person"></i> <?php echo $_SESSION['user_name']; ?>
                        </a>
                        <?php else: ?>
                        <a href="login.php" class="nav-link">
                            <i class="bi bi-person"></i> Login 
                        </a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item" id="cart-item">
                        <a href="carrinho.php" class="nav-link">
                            <i class="bi bi-cart"></i>
                            <b id="preco">R$ 3600,00</b>
                        </a>
                        <span class="qty-info"> 8 </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    