	use dbequipe05;
	drop procedure get_by_email;
	drop procedure register;
	drop procedure getAllShow;
	drop procedure getShowByArtistName;
	drop procedure getShowByName;
	drop procedure getShowByCategory;
	drop procedure addRepresentations;
	drop procedure addPurchases;
	drop procedure addRealPurchases;
	delimiter |
	create procedure get_by_email
	(
	in p_email varchar(50)
	)
	begin
		select * from clients where email = p_email;
	end|
	create procedure register
	(
	in f_name varchar(25),
	in l_name varchar(25),
	in email varchar(50),
	in address varchar(45),
	in city varchar(45),
	in zip_code varchar(6),
	in pw varchar(100)
	)
	begin
		insert into clients (f_name,l_name,email,address,city,zip_code,pw) values (f_name,l_name,email,address,city,zip_code,pw);
	end;
	select * from clients|
	
	create procedure getAllShow()
	BEGIN
		SELECT * FROM shows;
	END;|
	create procedure getShowByArtistName(in p_artistName varchar(60))
	BEGIN
		SELECT * FROM shows WHERE artist_name = p_artistName;
	END;|
	create procedure getShowByName(in p_name varchar(60))
	BEGIN
		SELECT * FROM shows WHERE name = p_name;
	END;|
	create procedure getShowByName(in p_category INT)
	BEGIN
		SELECT * FROM shows WHERE category_id = p_category;
	END;|
	create procedure getAllCategoriesName()
	BEGIN
		SELECT description FROM categories;
	END;|
	create procedure addRepresentations(in p_idShow INT, in p_date datetime, in p_idAuditorium INT)
	BEGIN
		INSERT INTO representations(id_show, date, id_auditorium) VALUES(p_idShow, p_date, p_idAuditorium);
	END;|
	create procedure addRealPurchases(in p_ticketId INT, in p_purchaseId INT, in p_quantity INT)
	BEGIN
		INSERT INTO real_purchases(ticket_id, purchase_id, quantity) VALUES(p_ticketId, p_purchaseId, p_quantity);
	END;|
	create procedure addPurchases(in p_idClient INT)
	BEGIN
		DECLARE temps DATE;
		SET temps = CURRENT_DATE;
		INSERT INTO purchases(date, client_id) VALUES(temps,p_idClient);
		COMMIT;
	END;
