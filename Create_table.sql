 use BDItemsCL;
drop table Armures;
drop table Potions;
drop table Armes;
drop table Historique;
drop table Panier
drop table Achats;
drop table Joueur;
drop table Items;
drop view afficherPotion;
drop view afficherArme
drop view afficherArmure;

create table Items
(
Id int identity,
Nom varchar(30),
Quantit�_Inventaire int,
Prix money,
Quantit�_Min_Inventaire int,
Type_Item char(3),
Flag int,
constraint Id_PK Primary Key (Id),
Check (Flag>=0 and Flag <=1)
);

create table Armures
(
Id_Item int,
Mati�re varchar(30),
Poids int,
Taille int
constraint Id_Item_Armures_FK Foreign Key (Id_Item) references Items(Id) on delete cascade
);

create table Potions
(
Id_Item int,
Effet_Attendu varchar(30),
Dur�e_Effet int,
constraint Id_Item_Potions_FK Foreign Key (Id_Item) references Items(Id) on delete cascade
);

create table Armes
(
Id_Item int,
Efficacit� int,
Genre varchar(30),
Descriptions varchar(30),
constraint Id_Item_Armes_FK Foreign Key (Id_Item) references Items(Id) on delete cascade
);

create table Joueur
(
Id int identity,
Alias varchar(10) not null unique,
Nom varchar(30),
Pr�nom varchar(30),
Montant_Initial money,
constraint Id_Joueur_PK Primary key (Id)
);

create table Achats
(
Id int identity,
Date_Achat date,
Id_Joueur int,
constraint Id_Achat_PK Primary Key (Id),
constraint Id_Achat_Joueur_FK Foreign Key (Id_Joueur) references Joueur(Id) on delete cascade
);

create table Historique
(
Id_Item int,
Id_Achat int,
Quantite_Payee int,
constraint Id_Item_Historique_FK Foreign Key (Id_Item) references Joueur(Id)  on delete cascade,
constraint Id_Achat_FK Foreign Key (Id_Achat) references Achats(Id)
);

create table Panier
(
Id_Joueur int,
Id_Item int,
Quantite_Achat int,
constraint Id_Joueur_FK Foreign Key (Id_Joueur) references Joueur(Id)  on delete cascade,
constraint Id_Item_FK Foreign Key (Id_Item) references Items(Id)  on delete cascade
);

go
create view afficherPotion as
select Nom,Quantit�_Inventaire,Prix,Effet_Attendu,Dur�e_Effet from Potions p inner join Items i
on p.Id_Item = i.Id;
go
create view afficherArme as
select Nom,Quantit�_Inventaire,Prix,Efficacit�,Genre from Armes a inner join Items i
on a.Id_Item = i.Id;
go
create view afficherArmure as
select Nom,Quantit�_Inventaire,Prix,Mati�re,Poids,Taille from Armures a inner join Items i
on a.Id_Item = i.Id;
go


