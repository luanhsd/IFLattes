select p.nm_user,p.citacao,e.local,e.cidade from dim_pessoa as p inner join ref_endereco as e where p.id_user=e.id_user;


