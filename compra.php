<?php
include_once("templates/header.php");
?>

<body>
    <div class="container" id="form-container">
        <h2>Finalize o seu Pedido</h2>
        <form>
            <div class="row">
                <p>Informe os dados do Endereço de Entrega</p>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" placeholder="0000-000">
                </div>
                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <select id="estado" class="form-control">
                        <option selected>Selecione um estado...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade">
                </div>
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" placeholder="Apartamento, Casa, Trabalho">
                </div>
            </div>
            <br>
            <div class="row">
                <p>Informe os dados de Pagamento</p>
                <div class="form-group col-md-6">
                    <label for="pagamento">Tipo de Pagamento</label>
                    <select id="pagamento" class="form-control">
                        <option selected>Selecione a forma de pagamento...</option>
                        <option>cartão de crédito</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="cartao">Numero do Cartao</label>
                    <input type="text" class="form-control" id="cartao" placeholder="0000-0000-0000-000">
                </div>
                <div class="form-group col-md-7">
                    <label for="nome-cartao">Nome no Cartao</label>
                    <input type="text" class="form-control" id="nome-cartao" placeholder="Nome no Cartão">
                </div>
                <div class="form-group col-md-3">
                    <label for="validade">Validade</label>
                    <input type="date" class="form-control" id="validade" placeholder="Nome no Cartão">
                </div>
                <div class="form-group col-md-2">
                    <label for="cvv">CVV</label>
                    <input type="text" class="form-control" id="cvv" placeholder="CVV">
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Finalizar compra</button>
        </form>
    </div>
</body>

</html>