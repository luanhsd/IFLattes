select p.nm_user,p.citacao,f.nivel,f.curso,f.local from dim_pessoa as p inner join fat_formacao as f where p.id_user=f.id_user;