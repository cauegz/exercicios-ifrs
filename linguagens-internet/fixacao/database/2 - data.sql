-- ==========================
-- FUNCIONARIO
-- ==========================
INSERT INTO funcionario (nome, salario, cpf) VALUES
('João Silva', 3200.00, '12345678901'),
('Maria Oliveira', 4100.00, '23456789012'),
('Carlos Souza', 3800.00, '34567890123'),
('Ana Pereira', 4500.00, '45678901234'),
('Pedro Santos', 3600.00, '56789012345');

-- ==========================
-- USUARIO (CLIENTE)
-- ==========================
INSERT INTO usuario (nome, email, senha, cpf) VALUES
('Lucas Almeida', 'lucas@email.com', 'senha123', '11111111111'),
('Fernanda Costa', 'fernanda@email.com', 'senha123', '22222222222'),
('Bruno Lima', 'bruno@email.com', 'senha123', '33333333333'),
('Juliana Rocha', 'juliana@email.com', 'senha123', '44444444444'),
('Gabriel Martins', 'gabriel@email.com', 'senha123', '55555555555');

-- ==========================
-- PRODUTO
-- ==========================
INSERT INTO produto (nome, preco, descricao) VALUES
('Notebook', 3500.00, 'Notebook 15 polegadas'),
('Mouse Gamer', 150.00, 'Mouse RGB'),
('Teclado Mecânico', 280.00, 'Switch Blue'),
('Monitor 24"', 980.00, 'Monitor Full HD'),
('Headset', 320.00, 'Headset com microfone');

-- ==========================
-- VENDA
-- ==========================
INSERT INTO venda (data, valor, id_funcionario, id_usuario) VALUES
('2026-07-01 10:30:00', 3650.00, 1, 1),
('2026-07-02 14:15:00', 150.00, 2, 2),
('2026-07-03 09:20:00', 1260.00, 3, 3),
('2026-07-04 16:45:00', 320.00, 4, 4),
('2026-07-05 11:10:00', 3930.00, 5, 5);

-- ==========================
-- PRODUTO_VENDA
-- ==========================
INSERT INTO produto_venda (quantidade, id_produto, id_venda) VALUES
(1, 1, 1),
(2, 2, 1),
(1, 3, 2),
(1, 4, 3),
(2, 5, 5);

-- ==========================
-- AVALIACAO
-- ==========================
INSERT INTO avaliacao (nota, comentario, id_usuario, id_funcionario) VALUES
(5, 'Excelente atendimento.', 1, 1),
(4, 'Muito bom.', 2, 2),
(5, 'Funcionário muito prestativo.', 3, 3),
(3, 'Atendimento razoável.', 4, 4),
(5, 'Voltarei a comprar.', 5, 5);