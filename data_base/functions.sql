delimiter |
create function nivel(nivel varchar(255))
returns int
begin
	case nivel
		when 'GRADUACAO' then return 1;
        when 'APERFEICOAMENTO' then return 2;
        when 'ESPECIALIZACAO' then return 3;
        when 'MESTRADO' then return 4;
        when 'DOUTORADO' then return 5;
        when 'POS-DOUTORADO' then return 6;
	end case;
end;
|