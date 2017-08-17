select p.nm_user,p.citacao from dim_pessoa as p;

select p.nm_user,p.citacao,i.data_cadastro,c.data_cadastro,i.idioma,i.le,i.fala,i.escreve,i.compreende from dim_pessoa as p inner join fat_idioma as i inner join dim_cadastro as c where p.id_user=i.id_user and i.data_cadastro=c.id_dataCadastro;

select *from dim_cadastro;


select *from fat_idioma;
