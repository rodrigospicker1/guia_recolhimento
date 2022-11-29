CREATE TABLE banco (
  id numeric(11) NOT NULL,
  banco varchar(50) NOT NULL,
  nome varchar(50) NOT NULL,
  agencia varchar(10) NOT NULL,
  conta varchar(10) NOT NULL
);

INSERT INTO banco (id, banco, nome, agencia, conta) VALUES
(1, 'banco_do_brasil', 'Bando do Brasil', '3478 9', '11245 1'),
(2, 'banco_itau', 'Banco Itau', '4418', '20458-4');

CREATE TABLE crud (
  id numeric(11) NOT NULL,
  name varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  phone varchar(30) NOT NULL,
  city varchar(30) NOT NULL
);

INSERT INTO crud (id, name, email, phone, city) VALUES
(1, 'Joguinho', 'roro@gmail.com', '444', 'rg'),
(2, 'vivi', 'vivi@gmail.com', '1234', 'itajaí');

CREATE TABLE entidades (
  id numeric(11) NOT NULL,
  razao_social varchar(50) DEFAULT NULL,
  nome varchar(50) DEFAULT NULL,
  cnpj varchar(30) DEFAULT NULL
);

INSERT INTO entidades (id, razao_social, nome, cnpj) VALUES
(1, 'Prefeitura A', 'prefeitura_a', '0'),
(2, 'Prefeitura B', 'prefeitura_b', '0');

CREATE TABLE guias (
  id numeric(11) NOT NULL,
  guia varchar(50) NOT NULL,
  tipo_guia varchar(50) NOT NULL,
  entidade_id numeric(10) NOT NULL,
  servidor_id numeric(10) NOT NULL,
  parcelamento_entidade numeric(10) NOT NULL,
  parcelamento_servidor numeric(10) NOT NULL,
  numero_da_parcela numeric(50) NOT NULL,
  competencia varchar(50) NOT NULL,
  emissao varchar(50) NOT NULL,
  calcula varchar(50) NOT NULL,
  base_patronal float NOT NULL,
  base_funcional float NOT NULL,
  folha_bruta float NOT NULL,
  valor_patronal float NOT NULL,
  valor_funcional float NOT NULL,
  valor_base float NOT NULL,
  vencimento varchar(50) NOT NULL,
  taxa_patronal_id numeric(10) NOT NULL,
  taxa_funcional_id numeric(10) NOT NULL,
  juros_id numeric(10) NOT NULL,
  multa_id numeric(10) NOT NULL,
  observacoes varchar(100) NOT NULL,
  salario_familia float NOT NULL,
  auxilio_doenca float NOT NULL,
  auxilio_reclusao float NOT NULL,
  salario_maternidade float NOT NULL,
  outras_deducoes float NOT NULL,
  banco_id numeric(10) NOT NULL,
  status varchar(30) NOT NULL,
  numero_documento varchar(50) NOT NULL,
  parcela_id numeric(11) NOT NULL
);

INSERT INTO guias (id, guia, tipo_guia, entidade_id, servidor_id, parcelamento_entidade, parcelamento_servidor, numero_da_parcela, competencia, emissao, calcula, base_patronal, base_funcional, folha_bruta, valor_patronal, valor_funcional, valor_base, vencimento, taxa_patronal_id, taxa_funcional_id, juros_id, multa_id, observacoes, salario_familia, auxilio_doenca, auxilio_reclusao, salario_maternidade, outras_deducoes, banco_id, status, numero_documento, parcela_id) VALUES
(61, 'parcelamento', 'entidade', 1, 1, 17, 0, 1, '11/2023', '22/11/2022', '', 0, 0, 0, 3, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221122212929', 0),
(62, 'parcelamento', 'entidade', 1, 1, 17, 0, 1, '11/2023', '22/11/2022', '', 0, 0, 0, 3, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221122222152', 0),
(63, 'parcelamento', 'entidade', 1, 1, 17, 0, 1, '11/2023', '22/11/2022', '', 0, 0, 0, 3, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221122223152', 0),
(64, 'parcelamento', 'servidor', 1, 1, 17, 18, 1, '11/2023', '23/11/2022', '', 0, 0, 0, 4, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221123202349', 0),
(65, 'parcelamento', 'entidade', 1, 1, 19, 18, 1, '11/2023', '23/11/2022', '', 0, 0, 0, 2, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221123202726', 0),
(66, 'parcelamento', 'servidor', 1, 1, 17, 18, 4, '11/2023', '23/11/2022', '', 0, 0, 0, 4, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221123202801', 0),
(67, 'parcelamento', 'entidade', 1, 1, 17, 18, 2, '11/2023', '23/11/2022', 'Avulsa/Parcelamento', 0, 0, 0, 3, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221123212958', 0),
(68, 'parcelamento', 'servidor', 0, 0, 0, 18, 2, '11/2023', '23/11/2022', 'Avulsa/Parcelamento', 0, 0, 0, 4, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221123215849', 0),
(69, 'individual', 'servidor', 0, 1, 0, 0, 0, '11/2023', '23/11/2022', 'patronal', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221123215915', 0),
(70, 'parcelamento', 'entidade', 0, 0, 19, 0, 2, '11/2023', '24/11/2022', 'Avulsa/Parcelamento', 0, 0, 0, 2, 0, 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 1, '', '20221124192554', 0);


CREATE TABLE indice (
  id numeric(11) NOT NULL,
  sigla varchar(20) NOT NULL,
  descricao text NOT NULL
);

INSERT INTO indice (id, sigla, descricao) VALUES
(4, 'IPCA', 'Índice Nacional de Preços ao Consumidor Amplo'),
(5, 'INPC', 'Índice Nacional de Preços ao Consumidor'),
(6, 'IGP-M', 'Índice Geral de Preços do Mercado');

CREATE TABLE indice_valores (
  id numeric(11) NOT NULL,
  indice_id numeric(5) NOT NULL,
  ano numeric(4) NOT NULL,
  data varchar(20) NOT NULL,
  valor float NOT NULL
);

INSERT INTO indice_valores (id, indice_id, ano, data, valor) VALUES
(14, 5, 2001, '04/2001', 2.3),
(15, 5, 2004, '04/2004', 0.6),
(16, 6, 2008, '04/2008', 0.4),
(115, 6, 2007, '07/2007', 12),
(116, 6, 2013, '03/2013', 1.3);

CREATE TABLE parcelamentos (
  id numeric(10) NOT NULL,
  tipo_parcelamento varchar(20) NOT NULL,
  entidade_id numeric(11) NOT NULL,
  servidor_id numeric(11) NOT NULL,
  emissao varchar(30) NOT NULL,
  numero_de_parcelas numeric(20) NOT NULL,
  valor float NOT NULL,
  valor_parcela float NOT NULL,
  pagos numeric(10) NOT NULL,
  status numeric(11) NOT NULL,
  data_termino varchar(20) NOT NULL
);

INSERT INTO parcelamentos (id, tipo_parcelamento, entidade_id, servidor_id, emissao, numero_de_parcelas, valor, valor_parcela, pagos, status, data_termino) VALUES
(17, 'entidade', 1, 0, '2022-11-22211706', 3, 3, 3, 0, 1, '2023-02-22'),
(18, 'servidor', 0, 1, '2022-11-23191219', 4, 4, 4, 0, 0, '2023-03-23'),
(19, 'entidade', 2, 0, '2022-11-23192053', 2, 2, 2, 0, 1, '2023-01-23');

CREATE TABLE parcelas (
  id numeric(11) NOT NULL,
  parcelamento_id numeric(11) NOT NULL,
  valor float NOT NULL,
  numero_parcela numeric(10) NOT NULL,
  emissao_parcela date NOT NULL,
  validade date NOT NULL,
  guia_id numeric(50) NOT NULL,
  status varchar(20) NOT NULL
);

INSERT INTO parcelas (id, parcelamento_id, valor, numero_parcela, emissao_parcela, validade, guia_id, status) VALUES
(197, 17, 1, 1, '2022-11-22', '2022-12-22', 63, 'em aberto'),
(198, 17, 1, 2, '2022-12-22', '2023-01-22', 67, 'em aberto'),
(199, 17, 1, 3, '2023-01-22', '2023-02-22', 22, 'em aberto'),
(201, 18, 1, 1, '2022-11-23', '2022-12-23', 64, 'em aberto'),
(202, 18, 1, 2, '2022-12-23', '2023-01-23', 68, 'em aberto'),
(203, 18, 1, 3, '2023-01-23', '2023-02-23', 0, 'em aberto'),
(204, 18, 1, 4, '2023-02-23', '2023-03-23', 66, 'em aberto'),
(205, 19, 1, 1, '2022-11-23', '2022-12-23', 65, 'em aberto'),
(206, 19, 1, 2, '2022-12-23', '2023-01-23', 70, 'em aberto');

CREATE TABLE servidor (
  id numeric(11) NOT NULL,
  nome varchar(50) NOT NULL,
  sexo varchar(20) NOT NULL,
  pis numeric(30) NOT NULL,
  cpf varchar(30) NOT NULL,
  estado_civil varchar(30) NOT NULL,
  pai varchar(50) NOT NULL,
  mãe varchar(50) NOT NULL,
  cep varchar(20) NOT NULL,
  bairro varchar(20) NOT NULL,
  cidade varchar(20) NOT NULL,
  estado varchar(20) NOT NULL,
  telefone varchar(30) NOT NULL,
  email varchar(100) NOT NULL,
  conta varchar(20) NOT NULL,
  escolaridade varchar(50) NOT NULL
);

INSERT INTO servidor (id, nome, sexo, pis, cpf, estado_civil, pai, mae, cep, bairro, cidade, estado, telefone, email, conta, escolaridade) VALUES
(1, 'José Silva', '', 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Maria Silva', 'feminino', 0, '', '', '', '', '', '', '', '', '', '', '', '');

CREATE TABLE status (
  id numeric(11) NOT NULL,
  nome varchar(50) NOT NULL,
  descricao varchar(100) NOT NULL
);

INSERT INTO status (id, nome, descricao) VALUES
(1, 'guias', 'todas as guias geradas');

ALTER TABLE aliquotas
  ADD PRIMARY KEY (id);

--
-- Índices para tabela banco
--
ALTER TABLE banco
  ADD PRIMARY KEY (id);

--
-- Índices para tabela crud
--
ALTER TABLE crud
  ADD PRIMARY KEY (id);

--
-- Índices para tabela entidades
--
ALTER TABLE entidades
  ADD PRIMARY KEY (id);

--
-- Índices para tabela guias
--
ALTER TABLE guias
  ADD PRIMARY KEY (id);

--
-- Índices para tabela indice
--
ALTER TABLE indice
  ADD PRIMARY KEY (id);

--
-- Índices para tabela indice_valores
--
ALTER TABLE indice_valores
  ADD PRIMARY KEY (id);

ALTER TABLE parcelas
  ADD PRIMARY KEY (id);

--
-- Índices para tabela servidor
--
ALTER TABLE servidor
  ADD PRIMARY KEY (id);

--
-- Índices para tabela status
--
ALTER TABLE status
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela aliquotas
--
