
Insert into LMS_MEMBERS
Values('LM001', 'Ryan', 'Delta', '2012-02-12', '2013-02-11','Temporary');
Insert into LMS_MEMBERS
Values('LM002', 'Alex', 'Vancouver', '2012-04-10', '2013-04-09','Temporary');
Insert into LMS_MEMBERS
Values('LM003', 'George', 'Burnaby', '2012-05-13','2013-05-12', 'Permanent');
Insert into LMS_MEMBERS
Values('LM004', 'Gordon', 'New Westminster', '2012-04-22', '2013-04-21', 'Temporary');
Insert into LMS_MEMBERS
Values('LM005', 'Leslie', 'Aldergrove', '2012-03-30', '2013-05-16','Temporary');
Insert into LMS_MEMBERS
Values('LM006', 'Jordan', 'Surrey', '2012-04-12', '2013-05-16','Temporary');


Insert into  LMS_SUPPLIERS_DETAILS 
Values ('S01','SINGAPORE SHOPPEE', '45 Meadow Ridge Crossing', 8894123555,'shopper@gmail.com');
Insert into  LMS_SUPPLIERS_DETAILS 
Values ('S02','JK Stores', '317 Eggendart Trail', 6940123450 ,'jks@yahoo.com');
Insert into  LMS_SUPPLIERS_DETAILS 
Values ('S03','ROSE BOOK STORE', '8 Hooker Way', 9444411222,'rose@gmail.com');
Insert into  LMS_SUPPLIERS_DETAILS 
Values ('S04','KEVIN STORE', '4356 Forest Dale Circle', 8630001452,'kevi@redif.com');
Insert into  LMS_SUPPLIERS_DETAILS 
Values ('S05','EINSTEN BOOK GALLARY', '1503 Scott Terrace', 9542000001,'eingal@aol.com');
Insert into  LMS_SUPPLIERS_DETAILS 
Values ('S06','BROLLY BOOK STORE', '5 Coleman Crossing',7855623100 ,'brolly@aol.com');

Insert into LMS_FINE_DETAILS Values('R0', 0);
Insert into LMS_FINE_DETAILS Values('R1', 2);
insert into LMS_FINE_DETAILS Values('R2', 5);
Insert into LMS_FINE_DETAILS Values('R3', 7);
Insert into LMS_FINE_DETAILS Values('R4', 10);
Insert into LMS_FINE_DETAILS Values('R5', 15);
Insert into LMS_FINE_DETAILS Values('R6', 20);


Insert into LMS_BOOK_DETAILS
Values('BL000001', 'Java How To Do Program', 'JAVA', 'Paul J. Deitel', 'Prentice Hall', '1999-12-10', 6, 200.00, 'A1', '2018-05-10', 'S01');
Insert into LMS_BOOK_DETAILS
Values('BL000002', 'Java: The Complete Reference ', 'JAVA', 'Herbert Schildt',  'Tata Mcgraw Hill ', '2011-10-10', 5, 750.00, 'A1', '2018-05-10', 'S03');
Insert into LMS_BOOK_DETAILS 
Values('BL000003', 'Java How To Do Program', 'JAVA', 'Paul J. Deitel', 'Prentice Hall', '1999-05-10', 6, 600.00, 'A1', '2018-05-10', 'S01');
Insert into LMS_BOOK_DETAILS
Values('BL000004', 'Java: The Complete Reference ', 'JAVA', 'Herbert Schildt', 'Tata Mcgraw Hill ', '2011-10-10', 5, 750.00, 'A1', '2019-05-11', 'S01');
Insert into LMS_BOOK_DETAILS 
Values('BL000005', 'Java How To Do Program', 'JAVA', 'Paul J. Deitel',  'Prentice Hall', '1999-12-10', 6, 600.00, 'A1', '2019-05-11', 'S01');
Insert into LMS_BOOK_DETAILS
Values('BL000006', 'Java: The Complete Reference ', 'JAVA', 'Herbert Schildt', 'Tata Mcgraw Hill ', '2011-10-10', 5, 750.00, 'A1', '2018-05-12', 'S03');
Insert into LMS_BOOK_DETAILS 
Values('BL000007', 'Let Us C', 'C', 'Yashavant Kanetkar ', 'BPB Publications', '2010-12-11',  9, 500.00 , 'A3', '2019-11-03', 'S03');
Insert into LMS_BOOK_DETAILS 
Values('BL000008', 'Let Us C', 'C', 'Yashavant Kanetkar ','BPB Publications', '2010-05-12',  9, 500.00 , 'A3', '2018-08-09', 'S04');


Insert into LMS_BOOK_ISSUE 
Values (001, 'LM001', 'BL000001', '2020-05-01', '2020-05-16', '2020-05-16', 'R0');
Insert into LMS_BOOK_ISSUE 
Values (002, 'LM002', 'BL000002', '2020-05-01', '2020-05-06','2020-05-16', 'R2');
Insert into LMS_BOOK_ISSUE
Values (003, 'LM003', 'BL000007', '2020-04-01', '2020-04-16', '2020-04-20','R1');
Insert into LMS_BOOK_ISSUE 
Values (004, 'LM004', 'BL000005', '2020-04-01', '2020-04-16','2020-04-20', 'R1');
Insert into LMS_BOOK_ISSUE 
Values (005, 'LM005', 'BL000008', '2020-03-30', '2020-04-15','2020-04-20' , 'R1');
Insert into LMS_BOOK_ISSUE 
Values (006, 'LM005', 'BL000008', '2020-04-20', '2020-05-05','2020-05-05' , 'R0');
Insert into LMS_BOOK_ISSUE 
Values (007, 'LM003', 'BL000007', '2020-04-22', '2020-05-07','2020-05-25' , 'R4');




