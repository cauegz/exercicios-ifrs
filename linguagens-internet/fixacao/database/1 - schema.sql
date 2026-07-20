
CREATE TABLE avaliacao
(
  id_avaliacao   INT          NOT NULL GENERATED ALWAYS AS IDENTITY,
  nota           INT         ,
  comentario     VARCHAR(255),
  id_usuario     INT          NOT NULL,
  id_funcionario INT          NOT NULL,
  PRIMARY KEY (id_avaliacao)
);

CREATE TABLE funcionario
(
  id_funcionario INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome           VARCHAR(100) ,
  salario        DECIMAL(10,2),
  cpf            CHAR(11)      NOT NULL UNIQUE,
  PRIMARY KEY (id_funcionario)
);

CREATE TABLE produto
(
  id_produto INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome       VARCHAR(100)  NOT NULL,
  preco      DECIMAL(10,2) NOT NULL,
  descricao  VARCHAR(255) ,
  PRIMARY KEY (id_produto)
);

CREATE TABLE produto_venda
(
  id_produto_venda INT NOT NULL GENERATED ALWAYS AS IDENTITY,
  quantidade       INT NOT NULL,
  id_produto       INT NOT NULL,
  id_venda         INT NOT NULL,
  PRIMARY KEY (id_produto_venda)
);

CREATE TABLE usuario
(
  id_usuario INT          NOT NULL GENERATED ALWAYS AS IDENTITY,
  nome       VARCHAR(100),
  email      VARCHAR(100),
  senha      VARCHAR(255),
  cpf        CHAR(11)     UNIQUE,
  PRIMARY KEY (id_usuario)
);

COMMENT ON TABLE usuario IS 'cliente';

CREATE TABLE venda
(
  id_venda       INT           NOT NULL GENERATED ALWAYS AS IDENTITY,
  data           TIMESTAMP     NOT NULL,
  valor          DECIMAL(10,2),
  id_funcionario INT           NOT NULL,
  id_usuario     INT           NOT NULL,
  PRIMARY KEY (id_venda)
);

ALTER TABLE produto_venda
  ADD CONSTRAINT FK_produto_TO_produto_venda
    FOREIGN KEY (id_produto)
    REFERENCES produto (id_produto);

ALTER TABLE produto_venda
  ADD CONSTRAINT FK_venda_TO_produto_venda
    FOREIGN KEY (id_venda)
    REFERENCES venda (id_venda);

ALTER TABLE venda
  ADD CONSTRAINT FK_funcionario_TO_venda
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id_funcionario);

ALTER TABLE venda
  ADD CONSTRAINT FK_usuario_TO_venda
    FOREIGN KEY (id_usuario)
    REFERENCES usuario (id_usuario);

ALTER TABLE avaliacao
  ADD CONSTRAINT FK_usuario_TO_avaliacao
    FOREIGN KEY (id_usuario)
    REFERENCES usuario (id_usuario);

ALTER TABLE avaliacao
  ADD CONSTRAINT FK_funcionario_TO_avaliacao
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id_funcionario);
