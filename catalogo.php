<?php
include_once("templates/header.php");
?>

</div>
<!-- Container de Filtros -->
<div class="container py-5">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <!-- Dropdown de Categorias-->
                    <div class="dropdown">
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-funnel me-2"></i>Filtrar por Categoria
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Categoria 1</a></li>
                            <li><a class="dropdown-item" href="#">Categoria 2</a></li>
                            <li><a class="dropdown-item" href="#">Categoria 3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Listagem de Produtos-->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="assets/img/categoria-monitor.png" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">Exemplo</h5>
                        <p class="card-text">Detalhes</p>
                        <p class="fw-bold text-primary">R$ Preço</p>
                        <a href="#" class="btn btn-dark w-100">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="assets/img/categoria-monitor.png" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">Exemplo</h5>
                        <p class="card-text">Detalhes</p>
                        <p class="fw-bold text-primary">R$ Preço</p>
                        <a href="#" class="btn btn-dark w-100">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="assets/img/categoria-videogame.png" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">Exemplo</h5>
                        <p class="card-text">Detalhes</p>
                        <p class="fw-bold text-primary">R$ Preço</p>
                        <a href="#" class="btn btn-dark w-100">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="assets/img/categoria-celular.png" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">Exemplo</h5>
                        <p class="card-text">Detalhes</p>
                        <p class="fw-bold text-primary">R$ Preço</p>
                        <a href="#" class="btn btn-dark w-100">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>

    </html>