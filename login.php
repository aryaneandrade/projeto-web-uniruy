<?php
include_once("templates/header.php");
?>

<div class="container col-11 col-md-9" id="form-container">
    <div class="row align-items-center gx-5">
        <div class="col-md-12 order-md-1">
            <h2>Faça o login para continuar</h2>

            <form action="php/router.php" method="POST">
                <input type="hidden" name="acao" value="login">
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                    <label for="email" class="form-label">Digite seu email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Digite sua senha">
                    <label for="password" class="form-label">Digite sua senha</label>
                </div>
                <input type="submit" class="btn btn-secondary" value="Entrar">
            </form>
        </div>
        <div class="col-md-12 order-md-2">
            <div class="col-12" id="link-container">
                <a href="cadastro.php">Ainda não tenho cadastro</a>
            </div>
        </div>
    </div>
</div>