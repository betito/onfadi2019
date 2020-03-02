select nome, sigla_org, grupo from avaliado;

select * from avaliado;

/*update avaliado set grupo = '1';

update avaliado set senha = siape;

update avaliado set tipo = 'Chefia Imediata' where nome like '%gemaque%';
*/


select imi, count(imi) from servidor
group by imi
order by imi desc;

select nome, sigla_coord from servidor
where imi = 2

select * from avaliacao
where
emailaval like 'rapp%'
and email like 'rapp%'


select * from avaliacao
where
siapeaval in (select siape from avaliado where subordinacao like 'COBIO')



select * from avaliado
where
nome like 'carolina%silva%'
