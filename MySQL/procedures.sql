use dbequipe05;
drop procedure get_by_email;
drop procedure register;
delimiter |
create procedure get_by_email
(
in p_email varchar(50)
)
begin
	select * from users where email = p_email;
end|
create procedure register
(
in f_name varchar(25),
in l_name varchar(25),
in email varchar(50),
in pw varchar(100)
)
begin
	insert into users (f_name,l_name,email,pw) values (f_name,l_name,email,pw);
end;

call register('Charlie;fjhw;fuwhf;wfjflehbflwehb','Berryfkehgflwiuhfelfhweflhwef','charle4@live.ca','123');

select * from users;