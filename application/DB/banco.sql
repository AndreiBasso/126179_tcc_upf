
--
-- Database
--

-- --------------------------------------------------------
--
-- Estrutura da tabela 'funcionarios'
--

CREATE TABLE funcionarios (
  idfuncionarios SERIAL PRIMARY KEY,
  nomefuncionarios varchar(50) NOT NULL,
  telefone varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  funcao varchar(200) NOT NULL,
  data date NOT NULL
) ;

--
-- Estrutura da tabela 'pops'
--

CREATE TABLE pops (
  idpops SERIAL PRIMARY KEY,
  nome varchar(50) NOT NULL,
  descricao varchar(200) NOT NULL,
  endereco varchar(200) NOT NULL,
  vol varchar(200) NOT NULL CHECK (vol in ('-48', '110', '220')),
  acesso varchar(200) NOT NULL CHECK (acesso in ('Liberado', 'Restrito')),
  idfuncionarios integer NOT NULL
) ;

--
-- Estrutura da tabela 'cliente'
--

CREATE TABLE cliente (
  id SERIAL PRIMARY KEY,
  nomecliente varchar(50) NOT NULL,
  enderecocliente varchar(200) NOT NULL,
  telefone varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  idpops integer NOT NULL
) ;

--
-- Estrutura da tabela 'equipamentos'
--

CREATE TABLE equipamentos (
  idequipamentos SERIAL PRIMARY KEY,
  nomeequipamentos varchar(50) NOT NULL,
  datacompra date NOT NULL,
  quantidade integer NOT NULL,
  valor_unitario decimal(6,2) NOT NULL
) ;

--
-- Estrutura da tabela 'borda'
--

CREATE TABLE borda (
  idborda SERIAL PRIMARY KEY,
  nomeborda varchar(50) NOT NULL,
  descri varchar(200) NOT NULL,
  data date NOT NULL,
  idpops integer NOT NULL,
  idequipamentos integer NOT NULL
) ;

--
-- Estrutura da tabela 'usuario'
--

CREATE TABLE usuario (
  idusuario SERIAL PRIMARY KEY,
  email varchar(100) NOT NULL,
  senha varchar(32) NOT NULL,
  permissao varchar(50) NOT NULL
) ;

--
-- Alterando Tabelas
--

ALTER TABLE cliente
  ADD CONSTRAINT cliente_pops_fk FOREIGN KEY (idpops) REFERENCES pops (idpops) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
ALTER TABLE pops
  ADD CONSTRAINT pops_pops_fk FOREIGN KEY (idfuncionarios) REFERENCES funcionarios (idfuncionarios) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE borda
  ADD CONSTRAINT equipamentos_borda_fk FOREIGN KEY (idequipamentos) REFERENCES equipamentos (idequipamentos) ON DELETE NO ACTION ON UPDATE NO ACTION;
  
ALTER TABLE borda
  ADD CONSTRAINT pops_borda_fk FOREIGN KEY (idpops) REFERENCES pops (idpops) ON DELETE NO ACTION ON UPDATE NO ACTION;
