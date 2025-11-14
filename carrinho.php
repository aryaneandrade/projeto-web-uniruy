<?php
include_once("templates/header.php");
?>

<!-- Container do Carrinho-->
<div class="container py-5">
        <h2> Meu Carrinho</h2>

        <?php if (empty($produtos_no_carrinho)): ?>
            <div class="alert alert-info mt-4"> Seu carrinho está vazio. <a href="produtos.php">Começe a Comprar!</a> </div>

        <?php else: ?>
            <div class="container-responsive mt-4"> <table class="table text-white"> <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos_no_carrinho as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['nome']); ?></td>
                                <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                                <td><?php echo $item['quantidade']; ?></td>
                                <td>R$ <?php echo number_format($item['subtotal'], 2, ',', '.'); ?></td>
                                <td>
                                    <a href="php/router.php?acao=remover_carrinho&id=<?php echo $item['id_produto']; ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Remover
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total:</th>
                            <th>R$ <?php echo number_format($total_carrinho, 2, ',', '.'); ?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-end mt-4"> <a href="produtos.php" class="btn btn-secondary"> Continuar comprando </a>
                <a href="php/router.php?acao=finalizar_pedido" class="btn btn-success">Finalizar Compra</a>
            </div>
        
        <?php endif; ?>

    </div>
</body>

</html>