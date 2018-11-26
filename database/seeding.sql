-- MySQL Distrib 5.6.42, for Linux (x86_64)
-- Host: gec353.encs.concordia.ca    Database: gec353_2
-- Server version 5.6.42
-- ------------------------------------------------------

/*
Populate table script
This script is run manually to fill the database with demo data.
To run this script open up the mysql console and type the following command:
source absolute\path\to\seeding.sql
*/

USE gec353_2;

--
-- Data for table `branch`
--
LOCK TABLES `branch` WRITE;
INSERT INTO `branch` VALUES (1,'Head Office','Montreal','5142347612','5147823498','1950-05-03'),
							(2,'Beverley','Ottawa','6136548956','6138971241','1997-06-12'),
							(3,'Ville Marrie','Montreal','5149086514','5141209475','2015-05-04'),
							(4,'Williams','Toronto','4167618263','4168905432','2011-01-15'),
							(5,'Saint Paul','Toronto','4161234567','4163456789','1999-12-12'),
							(6,'West Hill','Ottawa','6139087654','6137659012','2008-08-19'),
							(7,'West Mount','Montreal','5147890645','5145673298','2017-06-01'),
							(8,'Cote des Neige','Montreal','5147864532','5148907632','1978-05-30'),
							(9,'Victoria','Vancouver','6046783432','6048907889','2010-11-11');
UNLOCK TABLES;


--
-- Data for table `employee`
--
LOCK TABLES `employee` WRITE;
INSERT INTO `employee` VALUES (1,'Dr','Khaled','Jababo','189 Darwin Alley','1967-07-23',581103.77,'kjababo@thebank.com','1234567890','president',1),
(2,'Rev','Jerry','Lambswood','91431 Sugar Pass','1982-11-28',393697.71,'jlambswood1@live.com','6583712463','branch manager',2),
(3,'Rev','Den','Morriss','64 Springview Trail','1996-06-01',464053.50,'dmorriss2@un.org','4891100280','branch manager',3),
(4,'Dr','Isador','Canaan','10266 Steensland Way','1956-11-24',391693.46,'icanaan3@dailymail.co.uk','9422125886','branch manager',4),
(5,'Dr','Aldis','Ambrus','900 Vahlen Alley','1989-07-21',414513.43,'aambrus4@harvard.edu','3887545312','branch manager',5),
(6,'Dr','Nadean','Gillio','923 Johnson Center','1973-08-12',468371.69,'ngillio5@princeton.edu','5026734616','branch manager',6),
(7,'Mr','Carola','Cawtheray','15 Mallard Pass','1958-06-09',430537.14,'ccawtheray6@rambler.ru','3023852336','branch manager',7),
(8,'Mr','Junia','Zanetto','5843 Havey Court','2004-07-06',93029.53,'jzanetto7@techcrunch.com','4411360240','branch manager',8),
(9,'Dr','Thayne','Weeks','5 Kings Place','1960-07-06',178943.47,'tweeks8@nature.com','1018271547','branch manager',9),
(10,'Mr','Allie','Berthot','048 Laurel Drive','2000-05-12',212018.06,'aberthot9@google.pl','8558063067','general manager',1),
(11,'Ms','Jane','Foster','123 Tardif Street','1980-03-02',80003.04,'janefoster@google.ca','5149876452','general manager',1),
(12,'Ms','Jess','Foil','456 Lefebvre Street','1970-05-02',76003.04,'jessfoil@google.ca','5139476652','general manager',1),
(13,'Ms','Amanda','James','46 Main Street','1990-05-01',99003.04,'amandajames@google.ca','5149276152','general manager',1),
(14,'Ms','Gina','Cody','3040 rue Sherbroke','1970-05-01',99003.04,'ginacody@concordia.ca','5141293562','general manager',1),
(15,'Mr','James','Wilson','2020 rue Lacordaire','1992-05-01',40003.04,'jamesw@thebank.ca','5141234567','teller',2);
UNLOCK TABLES;

--
-- Data for table `branch_manager`
--
LOCK TABLES `branch_manager` WRITE;
INSERT INTO `branch_manager` VALUES (1,1),
									(2,2),
									(3,3),
									(4,4),
									(5,5),
									(6,6),
									(7,8),
									(8,8),
									(9,9);
UNLOCK TABLES;

--
-- Data for table `client`
--
LOCK TABLES `client` WRITE;
INSERT INTO `client` VALUES (1,'Roberto','Carlos','1978-08-09','2008-06-17','123, birch st.','r.carlos@gmail.com','5146723465',1,'personal'),
(2,'Nina','Robert','1992-02-23','2006-04-07','63, park av.','nina2002@hotmail.com','5145721241',2,'student'),
(3,'Ron','MacTavish','1988-07-15','2003-01-27','909, pine st.','mactavish.ron@yahoo.com','5146723465',3,'personal'),
(4,'Eric','Hamel','1994-03-06','2009-06-14','999, Saint Joseph.','eric.h@gmail.com','5146123600',4,'business'),
(5,'Lucy','Milot','1988-04-21','2013-02-13','32, park hil Av..','lm_2000@yahoo.com','5146124462',5,'corporate');
UNLOCK TABLES;

--
-- Data for table `charge_plan`
--
LOCK TABLES `charge_plan` WRITE;
INSERT INTO `charge_plan` VALUES (1,'credit card plan',5.00,1000.00),
								(2,'line of credit plan',10.00,25000.00),
								(3,'mortgage plan',300.00,300000.00),
								(4,'investment portfolio plan',100.00,100000.00),
								(5,'personal loan plan',50.00,5000.00),
								(6,'student loan plan',25.00,2000.00),
								(7,'corporate credit card plan',30.00,5000.00),
								(8,'personal checking acc plan',3.00,999999.99),
								(9,'personal saving acc plan',0.00,999999.99),
								(10,'business checking acc plan',6.00,99999999.99),
								(11,'business saving acc plan',2.00,99999999.99);
UNLOCK TABLES;

--
-- Data for table `login`
--
LOCK TABLES `login` WRITE;
INSERT INTO `login` VALUES (1234567890, "password", 1, 1),
							(0987654321, "password", 0, 1);
UNLOCK TABLES;

--
-- Data for table `service`
--
LOCK TABLES `service` WRITE;
INSERT INTO `service` VALUES (1,'credit card',10,19.00,1,'banking'),
							(2,'line of credit',11,5.00,2,'banking'),
							(3,'mortgage',12,3.00,3,'investment'),
							(4,'investment portfolio',13,8.00,4,'investment'),
							(5,'personal loan',14,10.00,5,'banking'),
							(6,'student line of credit',11,8.50,6,'banking'),
							(7,'reward credit card',10,17.00,7,'banking'),
							(8,'life insurance',13, 1.25,7,'insurance');
UNLOCK TABLES;

--
-- Data for table `client_service`
--
LOCK TABLES `client_service` WRITE;
INSERT INTO `client_service` VALUES (1,1),
									(1,2),
									(1,3),
									(2,4),
									(2,6),
									(3,2),
									(3,7),
									(4,1),
									(4,6),
									(5,1),
									(5,7);
UNLOCK TABLES;

--
-- Data for table `account`
--
LOCK TABLES `account` WRITE;
INSERT INTO `account` VALUES (1154378,'checking',0.00,234.00,8),
							(7835092,'savings',2.50,25000.00,9),
							(7843328,'checking',1.50,10000.00,8),
							(8736736,'savings',3.00,3000.00,9),
							(9056348,'savings',4.50,1000000.00,11);
UNLOCK TABLES;

--
-- Data for table `client_account`
--
LOCK TABLES `client_account` WRITE;
INSERT INTO `client_account` VALUES (1,1154378),
									(2,7835092),
									(3,7843328),
									(4,8736736),
									(5,9056348);
UNLOCK TABLES;