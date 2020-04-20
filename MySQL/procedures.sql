use dbequipe05;
drop procedure get_by_email;
drop procedure register;
delimiter |
create procedure get_by_email
(
in p_email varchar(50)
)
begin
<<<<<<< HEAD
	select * from users where email = p_email;
=======
	select * from clients where email = p_email;
>>>>>>> 670ebc6... Update
end|
create procedure register
(
in f_name varchar(25),
in l_name varchar(25),
in email varchar(50),
<<<<<<< HEAD
in pw varchar(100)
)
begin
	insert into users (f_name,l_name,email,pw) values (f_name,l_name,email,pw);
=======
in address varchar(45),
in pw varchar(100)
)
begin
	insert into clients (f_name,l_name,email,address,pw) values (f_name,l_name,email,address,pw);
>>>>>>> 670ebc6... Update
end;
