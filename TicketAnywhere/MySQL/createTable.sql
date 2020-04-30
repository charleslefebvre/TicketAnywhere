use dbequipe05;
drop table real_purchases;
drop table purchases;
drop table tickets;
drop table representations;
drop table shows;
drop table sections;
drop table categories;
drop table auditoriums;
drop table clients;
create table clients
(
id int auto_increment primary key,
f_name varchar(30),
l_name varchar(30),
email varchar(50),
address varchar(45),
city varchar(45),
zip_code varchar(6),
pw varchar(100)
);
create table auditoriums
(
id int auto_increment primary key,
name varchar(60),
address varchar(100),
capacity int
);
create table categories
(
id int auto_increment primary key,
description varchar(45)
);
create table sections 
(
id int auto_increment primary key,
id_auditorium int,
color varchar(45),
mp_price decimal,
constraint fk_auditorium_id_sections foreign key (id_auditorium) references
auditoriums(id)
);
create table shows
(
id int auto_increment primary key,
name varchar(45),
description varchar(200),
category_id int,
starting_price decimal,
artist_name varchar(45),
imageURL varchar(250),
constraint fk_category_id_shows foreign key (category_id) references
categories(id)
);
create table representations
(
id int auto_increment primary key,
id_show int,
date datetime,
id_auditorium int,
constraint fk_id_show foreign key (id_show) references
shows(id),
constraint fk_id_auditorium_representation foreign key (id_auditorium) references
auditoriums(id)
);
create table tickets
(
id int auto_increment primary key,
starting_price decimal,
representation_id int,
show_id int,
section_id int,
auditorium_id int,
constraint fk_representation_id_tickets foreign key(representation_id) references
representations(id),
constraint fk_show_id_tickets foreign key(show_id) references
shows(id),
constraint fk_section_id_tickets foreign key(section_id) references
sections(id),
constraint fk_auditorium_id_tickets foreign key(auditorium_id) references
auditoriums(id)
);
create table purchases
(
id int auto_increment primary key,
date date,
client_id int,
constraint fk_client_id_purchases foreign key(client_id) references
clients(id)
);
create table real_purchases
(
ticket_id int,
purchase_id int,
quantity int,
constraint fk_ticket_id_real foreign key (ticket_id) references
tickets(id),
constraint fk_purchase_id_real foreign key (purchase_id) references
purchases(id)
);

select * from clients;
