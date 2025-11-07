-- --------------------------------------------------
-- Versão corrigida 
-- Preserva os nomes e dados do arquivo original, mas com sintaxe válida,
-- engine/charset consistentes e pequenas melhorias (comentários, checagens)
-- --------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS `black_friday` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `black_friday`;

-- --------------------------------------------------
-- Tabela: usuarios
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `sobrenome` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `senha` VARCHAR(255) NOT NULL,
    `data_cadastro` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------
-- Tabela: categorias
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `categorias` (
    `id_categorias` INT PRIMARY KEY AUTO_INCREMENT,
    `nome` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------
-- Tabela: produtos
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos` (
    `id_produto` INT PRIMARY KEY AUTO_INCREMENT,
    `nome` VARCHAR(200) NOT NULL,
    `id_categoria` INT NULL,
    `descricao` TEXT NULL,
    `sku` VARCHAR(100) NULL,
    `estoque` INT DEFAULT 0,
    FOREIGN KEY (`id_categoria`) REFERENCES `categorias`(`id_categorias`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------
-- Tabela: precos
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `precos` (
    `id_preco` INT PRIMARY KEY AUTO_INCREMENT,
    `id_produto` INT NOT NULL,
    `preco_normal` DECIMAL(10,2) NULL,
    `preco_black_friday` DECIMAL(10,2) NULL,
    `data_inicio_promocao` DATE NULL,
    `data_fim_promocao` DATE NULL,
    FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id_produto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------
-- Tabela: detalhes_produtos
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `detalhes_produtos` (
    `id_detalhe` INT PRIMARY KEY AUTO_INCREMENT,
    `id_produto` INT NOT NULL,
    `chave_detalhe` VARCHAR(50) NOT NULL,
    `valor_detalhe` VARCHAR(200) NOT NULL,
    FOREIGN KEY (`id_produto`) REFERENCES `produtos`(`id_produto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------
-- Inserts: categorias (mantidos)
-- --------------------------------------------------
INSERT INTO categorias (nome) VALUES
('Video Games'),
('Monitores'),
('Celulares')
ON DUPLICATE KEY UPDATE nome = VALUES(nome);

-- --------------------------------------------------
-- Inserts: produtos (mantidos, adaptados para o esquema)
-- --------------------------------------------------
INSERT INTO produtos (nome, id_categoria) VALUES
('PlayStation 5 Pro', (SELECT id_categorias FROM categorias WHERE nome = 'Video Games')),
('Xbox Series X/S', (SELECT id_categorias FROM categorias WHERE nome = 'Video Games')),
('Nintendo Switch 2', (SELECT id_categorias FROM categorias WHERE nome = 'Video Games')),
('Monitor Gamer AOC 27" | 27G2S/BK', (SELECT id_categorias FROM categorias WHERE nome = 'Monitores')),
('Monitor Gamer LG UltraGear 24" | 24GS60F-B', (SELECT id_categorias FROM categorias WHERE nome = 'Monitores')),
('Monitor Gamer AOC 23,8" | 24G25S/BK', (SELECT id_categorias FROM categorias WHERE nome = 'Monitores')),
('Xiaomi Redmi Note 14 pro 8GB RAM 256GB (5G)', (SELECT id_categorias FROM categorias WHERE nome = 'Celulares')),
('Samsung Galaxy S25 Ultra 12GB RAM 512GB (5G)', (SELECT id_categorias FROM categorias WHERE nome = 'Celulares')),
('Xiaomi POCO X7 Pro 12GB RAM 512GB (5GB)', (SELECT id_categorias FROM categorias WHERE nome = 'Celulares'))
ON DUPLICATE KEY UPDATE nome = VALUES(nome);

-- --------------------------------------------------
-- Inserts: precos (mantidos)
-- --------------------------------------------------
INSERT INTO precos (id_produto, preco_normal, preco_black_friday, data_inicio_promocao, data_fim_promocao) VALUES
        (1, 4500.00, 3999.00, '2025-11-01', '2025-11-28'), -- PS5 Pro
        (2, 3500.00, 2999.00, '2025-11-01', '2025-11-28'), -- Xbox Series X/S
        (3, 2500.00, 2200.00, '2025-11-01', '2025-11-28'), -- Switch 2
        (4, 1800.00, 1500.00, '2025-11-01', '2025-11-28'), -- Monitor AOC 27"
        (5, 1200.00, 999.00, '2025-11-01', '2025-11-28'), -- Monitor LG 24"
        (6, 1100.00, 950.00, '2025-11-01', '2025-11-28'), -- Monitor AOC 23,8"
        (7, 2100.00, 1800.00, '2025-11-01', '2025-11-28'), -- Redmi Note 14 Pro
        (8, 9000.00, 7500.00, '2025-11-01', '2025-11-28'), -- Galaxy S25 Ultra
        (9, 2900.00, 2500.00, '2025-11-01', '2025-11-28') --  POCO X7 Pro
ON DUPLICATE KEY UPDATE preco_normal = VALUES(preco_normal), preco_black_friday = VALUES(preco_black_friday);

-- --------------------------------------------------
-- Inserts: detalhes_produtos (mantidos)
-- --------------------------------------------------
INSERT INTO detalhes_produtos (id_produto, chave_detalhe, valor_detalhe) VALUES
        (7, 'RAM', '8GB'),
        (7, 'Armazenamento', '256GB'),
        (7, 'Conectividade', '5G'),
        (8, 'RAM', '12GB'),
        (8, 'Armazenamento', '512GB'),
        (8, 'Conectividade', '5G'),
        (9, 'RAM', '8GB'),
        (9, 'Armazenamento', '2512GB'),
        (9, 'Conectividade', '5G')
ON DUPLICATE KEY UPDATE valor_detalhe = VALUES(valor_detalhe);

-- --------------------------------------------------
-- Tabela mínima de endereços (compatível com `endereco.php`)
-- Mantém os campos que já existem na página `endereco.php`.
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS `enderecos` (
        `id_endereco` INT AUTO_INCREMENT PRIMARY KEY,
        `user_id` INT NOT NULL,
        `cep` VARCHAR(20) NOT NULL,
        `logradouro` VARCHAR(255) NOT NULL,
        `numero` VARCHAR(20) NOT NULL,
        `telefone` VARCHAR(30),
        `bairro` VARCHAR(150),
        `cidade` VARCHAR(150) NOT NULL,
        `estado` VARCHAR(50) NOT NULL,
        `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (`user_id`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------
-- Consulta exemplo: produtos em promoção Black Friday ativos hoje
-- --------------------------------------------------
-- (corrigida sintaxe e condição IS NOT NULL)
-- SELECT p.nome AS produto, c.nome AS categoria, pr.preco_normal, pr.preco_black_friday
-- FROM produtos p
-- JOIN categorias c ON p.id_categoria = c.id_categorias
-- JOIN precos pr ON p.id_produto = pr.id_produto
-- WHERE pr.preco_black_friday IS NOT NULL
--   AND CURDATE() BETWEEN pr.data_inicio_promocao AND pr.data_fim_promocao;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------
-- Tabela mínima de endereços (compatível com `endereco.php`)
-- Campos mantêm apenas os dados usados na página de entrega:
-- cep, rua (logradouro), numero, telefone, bairro, cidade, estado
-- Relaciona-se com `usuarios` via user_id
-- --------------------------------------------------
CREATE TABLE IF NOT EXISTS enderecos (
    id_endereco INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    cep VARCHAR(20) NOT NULL,
    logradouro VARCHAR(255) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    telefone VARCHAR(30),
    bairro VARCHAR(150),
    cidade VARCHAR(150) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Exemplo de uso: inserir um endereço para um usuário existente (ajuste o user_id)
-- INSERT INTO enderecos (user_id, cep, logradouro, numero, telefone, bairro, cidade, estado)
-- VALUES (1, '12345-678', 'Rua Exemplo', '151', '71 90000-0000', 'Centro', 'Salvador', 'BA');