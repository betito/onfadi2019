SELECT id, nome, tipo, sigla_org, grupo FROM avaliado
where
grupo not like "\"\""
and 
grupo not like ""
and
tipo like 'chefia%';

SELECT nome, tipo, sigla_org, grupo FROM avaliado
where
tipo not like 'chefia%';


SELECT id, nome, tipo, sigla_org, grupo FROM avaliado
where
(grupo like "\"\""
or 
grupo not like "")
and
tipo like 'servidor%';

SELECT nome, tipo, sigla_org, grupo FROM avaliado
where
tipo like 'servidor%'
and situacao like 'ATIVO';

SELECT id, nome, tipo, sigla_org, grupo FROM avaliado
where
tipo like 'servidor%'
and situacao like 'ATIVO'
and grupo like "\"\"";



