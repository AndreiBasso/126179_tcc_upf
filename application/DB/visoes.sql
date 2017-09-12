CREATE VIEW Voltagem_48
AS
SELECT nome, descricao,
FROM pops
WHERE vol = '-48';

CREATE VIEW Voltagem_110
AS
SELECT nome, descricao,
FROM pops
WHERE vol = '110';

CREATE VIEW Voltagem_220
AS
SELECT nome, descricao,
FROM pops
WHERE vol = '220';