<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- CSS do Projeto-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- NAVBAR-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">ByteShop</a>
        </div>
    </nav>
    <!-- BOTTOM NAVBAR para voltar para home -->
    <nav class="navbar navbar-expand-lg light-bg-color" id="bottom-navbar-container">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container col-11 col-md-9" id="form-container">
        <div class="row align-items-center gx-5">
            <div class="col-md-12 order-md-1">
                <h2>Faça o login para continuar</h2>

                 <form action="php/router.php" method="POST"> 

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
</body>

</html>