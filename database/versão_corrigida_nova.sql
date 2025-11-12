CREATE DATABASE IF NOT EXISTS black_friday;

USE black_friday;

-- Removendo tabelas se existirem para evitar conflitos
DROP TABLE IF EXISTS enderecos;
DROP TABLE IF EXISTS precos;
DROP TABLE IF EXISTS produtos;
DROP TABLE IF EXISTS categorias;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categorias (
    id_categorias INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE produtos (
    id_produto INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    imagem_url VARCHAR(255) DEFAULT 'assets/img/categoria-monitor.png',
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categorias)
);

CREATE TABLE precos (
    id_preco INT PRIMARY KEY AUTO_INCREMENT,
    id_produto INT NOT NULL,
    preco_normal DECIMAL(10, 2) NOT NULL,
    preco_black_friday DECIMAL(10, 2),
    data_inicio_promocao DATE,
    data_fim_promocao DATE,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);
CREATE TABLE enderecos (
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

-- Inserindo dados iniciais
INSERT INTO categorias (nome) VALUES
    ('Video Games'),
    ('Monitores'),
    ('Celulares');

INSERT INTO produtos (nome, descricao, id_categoria, imagem_url) VALUES
    ('PlayStation 5 Pro', 'O console mais poderoso da nova geração, com gráficos 8K.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Video Games'),
     'assets/img/ps5.jpg'),
    
    ('Xbox Series X/S', 'Desempenho e velocidade para todos os tipos de jogadores.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Video Games'),
     'assets/img/xbox.jpg'),
    
    ('Nintendo Switch 2', 'A lenda portátil, agora com mais poder e novos jogos.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Video Games'),
     'assets/img/nitendo.jpg'),
    
    ('Monitor Gamer AOC 27" | 27G2S/BK', '27 polegadas de pura imersão e 144Hz de velocidade.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Monitores'),
     'assets/img/oac 27.jpg'),
    
    ('Monitor Gamer LG UltraGear 24" | 24GS60F-B', 'Resposta rápida e cores vibrantes para seu setup.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Monitores'),
     'assets/img/monitor lg.jpg'),
    
    ('Monitor Gamer AOC 23,8" | 24G25S/BK', 'O equilíbrio perfeito entre tamanho e performance.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Monitores'),
     'assets/img/oac 23.jpg'),
    
    ('Xiaomi Redmi Note 14 pro 8GB RAM 256GB (5G)', 'Câmera de alta resolução e desempenho incrível.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Celulares'),
     'assets/img/note 14.jpg'),
    
    ('Samsung Galaxy S25 Ultra 12GB RAM 512GB (5G)', 'O flagship definitivo com S-Pen e zoom espacial.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Celulares'),
     'assets/img/s25.jpg'),
    
    ('Xiaomi POCO X7 Pro 12GB RAM 512GB (5G)', 'O melhor custo-benefício da categoria.', 
     (SELECT id_categorias FROM categorias WHERE nome = 'Celulares'),
     'assets/img/poco.jpg');

INSERT INTO precos (id_produto, preco_normal, preco_black_friday, data_inicio_promocao, data_fim_promocao) VALUES
    (1, 4500.00, 3999.00, '2025-11-01', '2025-11-28'),
    (2, 3500.00, 2999.00, '2025-11-01', '2025-11-28'),
    (3, 2500.00, 2200.00, '2025-11-01', '2025-11-28'),
    (4, 1800.00, 1500.00, '2025-11-01', '2025-11-28'),
    (5, 1200.00, 999.00, '2025-11-01', '2025-11-28'),
    (6, 1100.00, 950.00, '2025-11-01', '2025-11-28'),
    (7, 2100.00, 1800.00, '2025-11-01', '2025-11-28'),
    (8, 9000.00, 7500.00, '2025-11-01', '2025-11-28'),
    (9, 2900.00, 2500.00, '2025-11-01', '2025-11-28');