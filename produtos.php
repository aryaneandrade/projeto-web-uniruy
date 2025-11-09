<?php
include_once("templates/header.php");
require_once("php/conexao.php"); // Garantir que temos a conexão com o banco

// Função para verificar se o produto está em promoção
function estaEmPromocao($produto) {
    if (empty($produto['data_inicio_promocao']) || empty($produto['data_fim_promocao'])) {
        return false;
    }
    $hoje = date('Y-m-d');
    return ($produto['preco_black_friday'] !== null &&
            $produto['data_inicio_promocao'] <= $hoje &&
            $produto['data_fim_promocao'] >= $hoje);
}

// Processamento dos filtros
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
$busca = isset($_GET['s']) ? $_GET['s'] : null;

try {
    // Preparar a consulta base
    $sql = "SELECT p.id_produto, p.nome, p.descricao, p.imagem_url, 
                   c.nome as categoria_nome, pr.preco_normal, pr.preco_black_friday, 
                   pr.data_inicio_promocao, pr.data_fim_promocao
            FROM produtos p
            INNER JOIN categorias c ON p.id_categoria = c.id_categorias
            INNER JOIN precos pr ON p.id_produto = pr.id_produto";

    $where = [];
    $params = [];

    // Adicionar filtro de categoria se especificado
    if ($categoria) {
        $where[] = "c.nome = ?";
        $params[] = $categoria;
    }

    // Adicionar filtro de busca se especificado
    if ($busca) {
        $where[] = "(p.nome LIKE ? OR p.descricao LIKE ?)";
        $params[] = "%$busca%";
        $params[] = "%$busca%";
    }

    // Montar a cláusula WHERE
    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }

    // Adicionar ordenação
    $sql .= " ORDER BY c.nome, p.nome";

    // Executar a consulta
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $produtos = $stmt->fetchAll();

} catch (\PDOException $e) {
    die("Erro ao buscar produtos: " . $e->getMessage());
}

// Já temos a função estaEmPromocao definida no início do arquivo
?>

<div class="container py-5">
    <!-- Seção de Filtros -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-funnel me-2"></i>Filtrar por Categoria
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="?categoria=Video Games">Video Games</a></li>
                            <li><a class="dropdown-item" href="?categoria=Monitores">Monitores</a></li>
                            <li><a class="dropdown-item" href="?categoria=Celulares">Celulares</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Lista de Produtos -->
    <div class="row">
        <?php if (empty($produtos)): ?>
            <div class="col-12">
                <div class="alert alert-info">
                    Nenhum produto encontrado.
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 light-bg-color">
                        <!-- Imagem do Produto -->
                        <img src="<?php echo htmlspecialchars($produto['imagem_url']); ?>"
                             class="card-img-top"
                             alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                             style="height: 220px; object-fit: contain; padding: 10px;">
                        
                        <div class="card-body d-flex flex-column text-black">
                            <!-- Nome e Descrição -->
                            <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                            <p class="card-text flex-grow-1">
                                <?php echo htmlspecialchars($produto['descricao']); ?>
                            </p>

                            <!-- Preços -->
                            <?php if (estaEmPromocao($produto)): ?>
                                <!-- Preço Promocional -->
                                <div class="pricing-block">
                                    <span class="text-danger text-decoration-line-through d-block">
                                        De: R$ <?php echo number_format($produto['preco_normal'], 2, ',', '.'); ?>
                                    </span>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="fw-bold h5 mb-0" style="color: #008000;">
                                            R$ <?php echo number_format($produto['preco_black_friday'], 2, ',', '.'); ?>
                                        </span>
                                        <?php
                                        $desconto = round(100 - ($produto['preco_black_friday'] * 100 / $produto['preco_normal']));
                                        ?>
                                        <span class="badge bg-danger">
                                            <?php echo $desconto; ?>% OFF
                                        </span>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- Preço Normal -->
                                <div class="pricing-block mb-3">
                                    <span class="fw-bold h5 mb-0" style="color: #c09578;">
                                        R$ <?php echo number_format($produto['preco_normal'], 2, ',', '.'); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <!-- Botão Adicionar ao Carrinho -->
                            <form action="php/router.php" method="POST" class="mt-auto">
                                <input type="hidden" name="acao" value="adicionar_carrinho">
                                <input type="hidden" name="produto_id" value="<?php echo $produto['id_produto']; ?>">
                                <input type="hidden" name="quantidade" value="1">
                                <button type="submit" class="btn btn-dark w-100">
                                    <i class="bi bi-cart-plus me-2"></i>Adicionar ao Carrinho
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

