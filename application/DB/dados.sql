--
-- Extraindo dados da tabela 'funcionarios'
--

INSERT INTO funcionarios (idfuncionarios, nomefuncionarios, telefone, email, funcao, data) VALUES
(101, 'Andrei Basso', '(54)98432-8200', 'andrei@andrei.com.br' , 'Engenheiro' , '2016-11-19'),
(102, 'Alisson Basso', '(54)99933-1116', 'alisson@alisson.com.br' , 'Programador' , '2016-11-20'),
(103, 'Felipe Mazzotti', '(54)8432-8206', 'felipe@felipe.com.br' , 'Engenheiro' , '2016-11-20');
--
-- Extraindo dados da tabela 'pops'
--

INSERT INTO pops (idpops, nome, descricao, endereco, vol, acesso,idfuncionarios) VALUES
(101, 'Pop Nova Prata', 'Datacenter ADS', 'Rua José Reinelli, Centro, 1033', '110','Restrito', 101),
(102, 'Pop Nova Prata 2', 'Datacenter Vipal', 'Rua Vipal, Área Industrial, 1800', '110','Restrito', 101),
(103, 'Pop Nova Bassano', 'Datacenter Mercado Bassanense', 'Rua Francisco Paulo, Centro, 100', '220','Liberado', 102),
(104, 'Pop Estrela', 'Datacenter Prefeitura', 'Rua Paulo, Centro, 900', '-48','Restrito',101),
(105, 'Pop Santa Cruz do Sul', 'Datacenter Posto de Saúde', 'Rua Santa Cruz, Centro, 1900', '-48','Restrito',102),
(106, 'Pop Garibaldi', 'Datacenter Sub Prefeitura', 'Rua Casca, Centro, 1800', '110','Restrito',103);

--
-- Extraindo dados da tabela 'cliente'
--

INSERT INTO cliente (id, nomecliente, enderecocliente, telefone, email, idpops) VALUES
(101, 'M2P2 Comunicações', 'Rua José Reinelli, Centro, 1033', '(54)3242-8500', 'm2p2@m2p2.com.br', '101'),
(102, 'Remota Comunicações', 'Rua José Reinelli, Centro, 1033', '(54)3242-8550', 'remota@remota.com.br', '101'),
(103, 'ADS Comunicações', 'Rua José Reinelli, Centro, 1033', '(54)3242-9500', 'ads@ads.com.br', '101'),
(104, 'Adyl', 'Rua Vipal, Área Industrial, 1800', '(54)3242-8900', 'adyl@adyl.com.br', '102'),
(105, 'Prefeitura de Estrela', 'Rua Paulo, Centro, 900', '(51)3712-8900', 'pref@pref.com.br', '105');

--
-- Extraindo dados da tabela 'equipamentos'
--

INSERT INTO equipamentos (idequipamentos, nomeequipamentos, datacompra, quantidade, valor_unitario) VALUES
(101, 'Mikrotik Rb 1100', '2016-11-20', '2', '9000.00'),
(102, 'Mikrotik Rb 2100', '2016-11-19', '5', '1000.00'),
(103, 'Mikrotik Rb 5000', '2016-11-18', '1', '100.00'),
(104, 'Cisco 250B', '2016-10-20', '3', '2000.00'),
(105, 'Cisco 3000A', '2016-10-20', '3', '5000.00');

--
-- Extraindo dados da tabela 'borda'
--

INSERT INTO borda (idborda, nomeborda, descri, data, idpops, idequipamentos) VALUES
(101, 'Concentrador 1', '143.202.216.0/24', '2016-11-19', '101' , '101'),
(102, 'Concentrador 2', '143.202.217.0/24', '2016-05-11', '101' , '102'),
(103, 'Concentrador 3', '143.202.218.0/24', '2016-04-19', '101' , '103'),
(104, 'Concentrador 4', '177.101.205.0/24', '2016-04-19', '102' , '101'),
(105, 'Concentrador 5', '177.101.206.0/24', '2016-11-19', '102' , '105'),
(106, 'Concentrador 6', '177.101.207.0/24', '2016-11-20', '103' , '104');

--
-- Extraindo dados da tabela 'usuario'
--

INSERT INTO usuario (idusuario, email, senha, permissao) VALUES
(101, 'teste@teste.com.br', '698dc19d489c4e4db73e28a713eab07b', 'admin'),
(102, 'andrei@andrei.com.br', 'b2d09b73eb5ad0228f9cb2e51485a45f', 'admin'),
(103, 'admin@admin.com.br', '21232f297a57a5a743894a0e4a801fc3', 'admin');