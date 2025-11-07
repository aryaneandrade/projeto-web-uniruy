<?php
include_once("templates/header.php");
?>

<body>
    <div class="container" id="form-container">
        <h2>Finalize o seu Pedido</h2>
        <form>
            <div class="row">
                <p>Informe os dados do Endereço de Entrega</p>
                <div class="form-group col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" placeholder="0000-000">
                </div>
                <div class="form-group col-md-4">
                    <label for="rua">Rua / Avenida</label>
                    <input type="text" class="form-control" id="rua" placeholder="Ex: Rua Oswaldo Sento Sé">
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" placeholder="Ex: 151">
                </div>
                <div class="form-group col-md-3">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" pattern="^[0-9]{4}-[0-9]{4}$"
                        placeholder="Ex: 71 9000-0000">
                </div>
            </div>

             <a href="pagamento.php" class="btn btn-primary mt-4"> Continuar</a>
        </form>
    </div>


</body>

</html>