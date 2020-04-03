use dbequipe05;
drop procedure get_by_email;
delimiter |
create procedure get_by_email
(
in p_email varchar(50)
)
begin
	select * from users where email = p_email;
end|
insert into users (f_name,l_name,email,pw) values ('Charles','Lefebvre','charles@live.ca','123');
call get_by_email('charles@live.ca');