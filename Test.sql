use BDItemsCL;
execute ajouterArme
@nom = 'Épée',
@q_inventaire = 5,
@q_min = 3,
@prix = 30,
@efficacite = 4,
@genre = 'Arme de poing',
@description = 'Épée fait en acier';

execute ajouterArme
@nom = 'Lance',
@q_inventaire = 6,
@q_min = 3,
@prix = 20,
@efficacite = 2,
@genre = 'Arme pouvant être lancée',
@description = 'Lance avec bout en pierre';

execute ajouterArme
@nom = 'Arbalète',
@q_inventaire = 10,
@q_min = 5,
@prix = 40,
@efficacite = 6,
@genre = 'Arme tirant des flèches',
@description = 'Arbalète de bois tirant des flèches à très grande vitesse';

execute ajouterArme
@nom = 'Morgenstern ',
@q_inventaire = 4,
@q_min = 1,
@prix = 50,
@efficacite = 7,
@genre = 'Arme lourde',
@description = 'Arme se terminant par une masse';

execute ajouterArme
@nom = 'Dague',
@q_inventaire = 7,
@q_min = 3,
@prix = 25,
@efficacite = 5,
@genre = 'Arme de poing',
@description = 'Petit couteau à double tranchant';
/*********************************************************/
execute ajouterArmure
@nom = 'Bouclier',
@q_inventaire = 10,
@q_min = 2,
@prix = 5,
@matiere = 'Bois',
@poids = 10,
@taille = 70;

execute ajouterArmure
@nom = 'Plastron',
@q_inventaire = 7,
@q_min = 5,
@prix = 15,
@matiere = 'Fer',
@poids = 30,
@taille = 80;

execute ajouterArmure
@nom = 'Casque',
@q_inventaire = 10,
@q_min = 5,
@prix = 20,
@matiere = 'Fer',
@poids = 7,
@taille = 25;

execute ajouterArmure
@nom = 'Botte ',
@q_inventaire = 4,
@q_min = 2,
@prix = 20,
@matiere = 'Cuire',
@poids = 4,
@taille = 20;

execute ajouterArmure
@nom = 'Cataphracte ',
@q_inventaire = 7,
@q_min = 4,
@prix = 40,
@matiere = 'Maile',
@poids = 50,
@taille = 170;
/*******************************************/
execute ajouterPotion
@nom = 'Potion invisibilité',
@q_inventaire = 5,
@q_min = 2,
@prix = 25,
@effet = 'Invisible',
@duree_effet = 2;

execute ajouterPotion
@nom = 'Vitesse',
@q_inventaire = 8,
@q_min = 5,
@prix = 10,
@effet = 'Vitesse',
@duree_effet = 1;

execute ajouterPotion
@nom = 'Guérison',
@q_inventaire = 10,
@q_min = 1,
@prix = 30,
@effet = 'Guérit les points de vie au maximum',
@duree_effet = 1;

execute ajouterPotion
@nom = 'Vision nocture',
@q_inventaire = 10,
@q_min = 3,
@prix = 25,
@effet = 'Permet de voir clairement dans le noir',
@duree_effet = 3;

execute ajouterPotion
@nom = 'Potion de force',
@q_inventaire = 3,
@q_min = 1,
@prix = 40,
@effet = 'Augmente la force du joueur de 25%',
@duree_effet = 1;


insert into Joueur (Alias,Nom,Prénom,Montant_Initial) 
values ('King.J','King','Jerome',200);
insert into Joueur (Alias,Nom,Prénom,Montant_Initial) 
values ('Eude','Prince','Eude',200);
insert into Joueur (Alias,Nom,Prénom,Montant_Initial) 
values ('K.O','Knight','Oudin',200);
insert into Joueur (Alias,Nom,Prénom,Montant_Initial) 
values ('Gwal','Prince','Gwalter',200);
insert into Joueur (Alias,Nom,Prénom,Montant_Initial) 
values ('God','Prince','Godefray',200);
insert into Joueur (Alias,Nom,Prénom,Montant_Initial) 
values ('Iss','Princess','Issobell',200);
insert into Joueur (Alias,Nom,Prénom,Montant_Initial) 
values ('Q.Y','Queen','Yseulte',200);

execute afficherItems
@type = 'POT';

select * from prixMoyenItems();

execute supprimerItem
@id = 1;

select dbo.montantPanier('K.O');

execute ajouterItemPanier
@nom_item = 'Casque',
@quantite = 1,
@alias = 'K.O';

execute modifierItemPanier
@nom_item = 'Lance',
@alias = 'K.O',
@nouvelle_quantite = 2;

execute supprimerItemPanier
@nom_item = 'Lance',
@alias = 'K.O';

select * from afficherPanier('K.O');

execute payerPanier
@alias = 'K.O';

execute supprimerPanier
@alias = 'K.O';
