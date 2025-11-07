<?php
include_once("templates/header.php");
?>

<div class="container col-11 col-md-9" id="form-container">
    <div class="row gx-5">
        <div class="col-md-12">
            <h2>Realize o Seu Cadastro</h2>

            <form action="php/router.php" method="POST">

                <input type="hidden" name="acao" value="cadastro">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome">
                    <label for="name" class="form-label">Digite seu nome</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="lastname" name="lastname"
                        placeholder="Digite seu Sobrenome">
                    <label for="lastname" class="form-label">Digite seu Sobrenome</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email">
                    <label for="email" class="form-label">Digite seu email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Digite sua senha">
                    <label for="password" class="form-label">Digite sua senha</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                        placeholder="Confirme sua senha">
                    <label for="confirmpassword" class="form-label">Confirmee sua senha</label>
                </div>
                <input type="submit" class="btn btn-secondary" value="Cadastrar">

            </form>
        </div>
        <div class="col-md-12 order-md-2">
            <div class="col-12" id="link-container">
                <a href="login.php">Já tenho uma conta</a>
            </div>
        </div>
    </div>
</div>