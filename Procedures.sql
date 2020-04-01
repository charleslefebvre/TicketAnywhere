use BDItemsCL;
drop procedure ajouterArme;
drop procedure ajouterArmure;
drop procedure ajouterPotion;
drop procedure afficherItems;
drop function prixMoyenItems;
drop procedure supprimerItem;
drop function montantPanier;	
drop procedure ajouterItemPanier;
drop procedure modifierItemPanier;
drop procedure supprimerItemPanier;
drop function afficherPanier;
drop procedure payerPanier;
drop procedure supprimerPanier;

go
create procedure ajouterArme
(
@nom varchar(30),@q_inventaire int,@q_min int,@prix money,@efficacite int, @genre varchar(30),@description varchar(30)
)
as
begin 
declare @type char(4) = 'ARR';
declare @Flag int;
if(@q_inventaire >= @q_min)
	set @Flag = 1;
else
	set @Flag = 0;
insert into Items(Nom,Quantité_Inventaire,Prix,Quantité_Min_Inventaire,Type_Item,Flag)
values (@nom,@q_inventaire,@prix,@q_min,@type,@Flag)
end;
begin
declare @id int;
select @id = Id from Items where Nom = @nom;
insert into Armes(Id_item,Efficacité,Genre,Descriptions)
values (@id,@efficacite,@genre,@description)
end;
go
create procedure ajouterArmure
(
@nom varchar(30),@q_inventaire int,@q_min int,@prix money,@matiere varchar(30), @poids int,@taille int
)
as
begin 
declare @type char(4) = 'ARM';
declare @Flag int;
if(@q_inventaire >= @q_min)
	set @Flag = 1;
else
	set @Flag = 0;
insert into Items(Nom,Quantité_Inventaire,Prix,Quantité_Min_Inventaire,Type_Item,Flag)
values (@nom,@q_inventaire,@prix,@q_min,@type,@Flag)
end;
begin 
declare @id int;
select @id = Id from Items where Nom = @nom;
insert into Armures(Id_Item,Matière,Poids,Taille)
values (@id,@matiere,@poids,@taille)
end;
go
create procedure ajouterPotion
(
@nom varchar(30),@q_inventaire int,@q_min int,@prix money,@effet varchar(30), @duree_effet int
)
as
begin 
declare @type char(4) = 'POT';
declare @Flag int;
if(@q_inventaire >= @q_min)
	set @Flag = 1;
else
	set @Flag = 0;
insert into Items(Nom,Quantité_Inventaire,Prix,Quantité_Min_Inventaire,Type_Item,Flag)
values (@nom,@q_inventaire,@prix,@q_min,@type,@Flag)
end;
begin 
declare @id int;
select @id = Id from Items where Nom = @nom;
insert into Potions(Id_Item,Effet_Attendu,Durée_Effet)
values (@id,@effet,@duree_effet)
end;
go
create procedure afficherItems
(
@type char(3)
)
as
begin
if(@type='ARR')
	select * from afficherArme;
else if(@type='ARM')
	select * from afficherArmure;
else if(@type='POT')
	select * from afficherPotion;
end;
go
create function prixMoyenItems() returns table
as 
return(
select Type_Item, AVG(Prix) Moyenne from Items
group by Type_Item
);
go
create procedure supprimerItem
(
@id int
)
as
begin
declare @type char(3);
declare @quantite int;
	select @type = Type_Item from Items where Id = @id
if(@type is not null) 
	delete from Items where Id = @id;
	delete from Panier where Id_Item = @id;
end;
go
create function montantPanier(@alias varchar(10)) returns money
as 
begin
declare @montant money;
select @montant = Prix * Quantite_Achat from Items i inner join
Panier p on p.Id_Item = i.Id inner join 
Joueur j on j.Id = p.Id_Joueur
where Alias = @alias;
	
	if(@montant is not null)
		return @montant
	return 0;
end;
go
create procedure ajouterItemPanier
(
@nom_item varchar(30),@quantite int, @alias varchar(10)
)
as 
begin
declare @nom_joueur varchar(30);
declare @prix_item money;
declare @quantite_inventaire int;
declare @solde money;
declare @id_item varchar(30);

select @prix_item = Prix from Items where Nom = @nom_item;
select @nom_joueur = Nom from Joueur where Alias = @alias;
	if(@prix_item is not null and @nom_joueur is not null)
	begin
		select @quantite_inventaire = Quantité_Inventaire
		from Items where Nom = @nom_item;
		if(@quantite_inventaire >= @quantite)
		begin
			select @solde = Montant_Initial from Joueur
			where Alias = @alias;
			if(@solde >= @prix_item * @quantite)
			begin
				select @id_item = i.Id from Items i
				inner join Panier p on p.Id_Item = i.Id inner
				join Joueur j on j.Id = p.Id_Joueur where
				Alias = @alias and i.Nom = @nom_item;
				if(@id_item is not null)
				begin
					update Panier set Quantite_Achat =
					Quantite_Achat + @quantite where
					Id_Joueur = (select Id from Joueur
					where Alias = @alias) and Id_Item = 
					@id_item;
				end;
				else
				begin
					insert into Panier (Id_Joueur,Id_Item,Quantite_Achat)
					values ((select Id from Joueur where Alias = @alias),
					(select Id from Items where Nom = @nom_item),@quantite);
				end;
				update Items set Quantité_Inventaire =
					Quantité_Inventaire - @quantite where
					Nom = @nom_item;
				end;
			end;
		end;
end;
go
create procedure modifierItemPanier
(
@nom_item varchar(30), @alias varchar(10), @nouvelle_quantite int
)
as
begin
declare @id_item int;
declare @quantite_inventaire int;
declare @quantite_panier int;

select @id_item = p.Id_Item from Panier p inner
join Items i on p.Id_Item = i.Id where Id_Joueur = 
(select Id from Joueur where Alias = @alias) and 
i.Nom = @nom_item;
if(@id_item is not null)
begin
	select @quantite_panier = Quantité_Inventaire from Items
	where Id = @id_item;
	if(@nouvelle_quantite <= @quantite_panier + @quantite_inventaire)
	begin
		update Panier set Quantite_Achat = @nouvelle_quantite
		where Id_Item = @id_item and Id_Joueur = 
		(select Id from Joueur where Alias = @alias);
		update Items set Quantité_Inventaire = 
		Quantité_Inventaire + @quantite_panier - @nouvelle_quantite
		where Id = @id_item;
	end;
end;
end;
go
create procedure supprimerItemPanier
(
@nom_item varchar(30), @alias varchar(10)
)
as 
begin
declare @id_joueur int;
declare @id_item int;
declare @id_item_panier varchar(30);
declare @quantite_panier int;

select @id_joueur = Id from Joueur where Alias = @alias;
select @id_item = Id from Items where Nom = @nom_item;
select @id_item_panier = Id_Item from Panier p inner join 
Joueur j on j.Id = p.Id_Joueur inner join Items i on
i.Id = p.Id_Item where Alias = @alias and Id_Item = @id_item;
if(@id_joueur is not null and @id_item is not null 
and @id_item_panier is not null)
begin
	select @quantite_panier = Quantite_Achat from Panier
	where Id_Joueur = @id_joueur and Id_Item = @id_item; 
	update Items set Quantité_Inventaire = Quantité_Inventaire +
	@quantite_panier where Id = @id_item;
	delete from Panier where Id_Joueur = @id_joueur and
	Id_Item = @id_item;
end;
end;
go
create function afficherPanier(@alias varchar(10)) returns table
as
return(
select i.Nom, i.Type_Item,Quantite_Achat,Prix from Panier p inner join Items i on
p.Id_Item = i.Id inner join Joueur j on j.Id = p.Id_Joueur where Alias = @alias
);
go
create procedure payerPanier
(
@alias varchar(10)
)
as 
begin
declare @id_joueur int;
declare @montant_panier money;

select @id_joueur = Id from Joueur where Alias = @alias;
if(@id_joueur is not null)
begin
	select @montant_panier = SUM(Prix) from Panier p inner join
	Joueur j on j.Id = p.Id_Joueur inner join Items i on
	i.Id = p.Id_Item where j.Id = @id_joueur;
	update Joueur set Montant_Initial = Montant_Initial - @montant_panier;
	delete from Panier where Id_Joueur = @id_joueur;
	
end;
end;
go
create procedure supprimerPanier
(
@alias varchar(10)
)
as
begin
declare @id_joueur int;

select @id_joueur = Id from Joueur where Alias = @alias;
if(@id_joueur is not null)
begin
	declare list_item cursor for select Id_Item, Quantite_Achat
	from Panier;
	declare @id_item int;
	declare @quantite int;
	open list_item;
	fetch next from list_item into @id_item, @quantite;
	while @@FETCH_STATUS = 0
		begin
		update Items set Quantité_Inventaire = Quantité_Inventaire + @quantite
		where Id = @id_item;
		fetch next from list_item into @id_item, @quantite
	end;
	delete from Panier where Id_Joueur = @id_joueur;
	close list_item
	deallocate list_item
end;
end;