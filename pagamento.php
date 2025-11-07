<?php
include_once("templates/header.php");
?>

<body>
    <div class="container" id="form-container">
        <h2>Pagamento</h2>
        <form>
            <div class="row">
                <p>Informe os dados de pagamento</p>
                <div class="form-group col-md-6">
                    <label for="pagamento">Tipo de Pagamento</label>
                    <select id="pagamento" class="form-control">
                        <option selected>Selecione a forma de pagamento...</option>
                        <option>cartão de crédito</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Finalizar Compra</button>
        </form>
    </div>


</body>

</html>