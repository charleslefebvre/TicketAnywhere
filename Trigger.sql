use BDItemsCL;
drop trigger beforeInsertArmure;
drop trigger beforeInsertArme;
drop trigger updateStockItem;
go
create trigger beforeInsertArmure on Armures
after insert, update
as
begin
declare @id_item int;
declare @id_item_armure int;
declare @id_item_potion int;
declare @id_item_arme int;
select @id_item = Id_Item from inserted
select @id_item_potion = Id_Item from Potions where Id_Item = @id_item;
select @id_item_arme = Id_Item from Armes where Id_Item = @id_item;
select @id_item_armure = Id_Item from Armures where Id_Item = @id_item;
if(@id_item_arme is not null or @id_item_potion is not null or @id_item_armure is not null)
begin
	rollback;
end;
end;
go
create trigger beforeInsertArme on Armes
after insert, update
as
begin
declare @id_item int;
declare @id_item_armure int;
declare @id_item_potion int;
declare @id_item_arme int;
select @id_item = Id_Item from inserted
select @id_item_potion = Id_Item from Potions where Id_Item = @id_item;
select @id_item_arme = Id_Item from Armes where Id_Item = @id_item;
select @id_item_armure = Id_Item from Armures where Id_Item = @id_item;
if(@id_item_arme is not null or @id_item_potion is not null or @id_item_armure is not null)
begin
	rollback;
end;
end;
go
create trigger updateStockItem on Items 
after update, insert
as
declare @quantite_min int;
declare @quantite int;
declare @id_item int;
begin
	select @quantite_min = Quantité_Min_Inventaire from inserted;
	select @quantite = Quantité_Inventaire from inserted;
	select @id_item = Id from inserted;
	if(@quantite < @quantite_min)
	begin
		update Items set Quantité_Inventaire = @quantite + @quantite_min * 3
		where Id = @id_item;
	end;
end;
go