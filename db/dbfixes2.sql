update gdact.avaliado set gdact.avaliado.tipo = 'Chefia Imediata'
where gdact.avaliado.siape in ( 
select lpad(s.siape, 8, '0') from gdactplano1819.servidor s where s.eh_chefia like 'sim'
);

update gdact.avaliado set senha = '123';


