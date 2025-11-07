<?php
include_once("templates/header.php");
?>

<!-- Container do Carrinho-->
<div class="container py-5">
    <h2> Meu Carrinho</h2>

    <div class="alert alert-info">
        Seu carrinho está vazio. <a href="catalogo.php">Começe a Comprar!</a>
    </div>

    <div class="container-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Produto Exemplo 1</td>
                    <td>R$ 100,00</td>
                    <td>2</td>
                    <td>R$ 200,00</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Remover</button>
                    </td>
                </tr>
                <tr>
                    <td>Produto Exemplo 2</td>
                    <td>R$ 150,00</td>
                    <td>1</td>
                    <td>R$ 150,00</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Remover</button>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total:</th>
                    <th>R$ 350,00</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="text-end">
        <a href="produtos.php" class="btn btn-secondary"> Continuar comprando </a>
        <a href="endereco.php" class="btn btn-success"> Finalizar Compra </a>
    </div>
</div>
</body>
</html>