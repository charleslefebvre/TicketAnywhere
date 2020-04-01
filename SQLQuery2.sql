drop table tab1;
drop table tab2;

Create table tab1(ID int ,DE char(10))
Create table tab2(ID int ,DE char(10))

Insert into tab1 Values (1,'aaa')
Insert into tab1  Values (2,'bbb')
Insert into tab1 Values(3,'ccc')
Insert into tab1 Values(4,'dfe')
Insert into tab1 Values(5,'rfe')


Insert into tab2 Values (1,'aaa')
Insert into tab2  Values (2,'xx')
Insert into tab2 Values(3,'ccc')
Insert into tab2 Values(6,'wdr')

SELECT  tab1.ID,tab2.ID As T2 from tab1 
FULL join tab2 on tab1.ID = tab2.ID   
WHERE BINARY_CHECKSUM(tab1.ID,tab1.DE) <> BINARY_CHECKSUM(tab2.ID,tab2.DE) 
OR tab1.ID IS NULL 
OR  tab2.ID IS NULL