use dbequipe05;
drop table shopping_cart;
drop table tickets;
drop table shows;
drop table auditoriums;
drop table artists;
drop table users;
create table users
(
id int auto_increment primary key,
f_name varchar(30),
l_name varchar(30),
email varchar(50),
pw varchar(100)
);
create table auditoriums
(
id int auto_increment primary key,
name varchar(50),
location varchar(100)
);
create table artists
(
id int auto_increment primary key,
name varchar(50)
);
create table shows
(
id int auto_increment primary key,
auditorium_id int,
date date,
artist_id int,
category_name varchar(30),
imageURL varchar(10),
constraint fk_auditorium_id_auditorium foreign key(auditorium_id) references
auditoriums(id),
constraint fk_artist_id_artist foreign key (artist_id) references
artists(id)
);
create table tickets
(
id int auto_increment primary key,
show_id int,
price float,
constraint fk_show_id_show foreign key(show_id) references
shows(id)
);
create table shopping_cart
(
user_id int,
ticket_id int,
quantity int,
constraint fk_ticket_id_ticket foreign key(ticket_id) references
tickets(id),
constraint fk_user_id_user foreign key(user_id) references
users(id)
);
<<<<<<< HEAD
	
=======
	
>>>>>>> 3b9b4a7... Update
