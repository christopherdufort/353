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

INSERT INTO `branch` VALUES (1,'Head Office','Montreal','5142347612','5147823498','1950-05-03'),
(2,'Beverley','Ottawa','6136548956','6138971241','1997-06-12'),
(3,'Ville Marrie','Montreal','5149086514','5141209475','2015-05-04'),
(4,'Williams','Toronto','4167618263','4168905432','2011-01-15'),
(5,'Saint Paul','Toronto','4161234567','4163456789','1999-12-12'),
(6,'West Hill','Ottawa','6139087654','6137659012','2008-08-19'),
(7,'West Mount','Montreal','5147890645','5145673298','2017-06-01'),
(8,'Cote des Neige','Montreal','5147864532','5148907632','1978-05-30'),
(9,'Victoria','Vancouver','6046783432','6048907889','2010-11-11'),
(10,'Cartier','Vancouver','2246783432','2248907889','2010-09-11'),
(11,'Anjou', 'Montreal', '8529639874', '8529639877', '2009-01-18'),
(12,'Lachine', 'Montreal', '8529623874', '8529688877', '2012-02-18'),
(13,'St-Leonard', 'Montreal', '5149623874', '5140688877', '2013-02-19'),
(14,'NDG', 'Montreal', '5142623874', '5144688877', '1997-03-18'),
(15,'Lasalle', 'Montreal', '5143623874', '5142688877', '1992-03-16');



--
-- Data for table `employee`
--

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
(15,'Mr','James','Wilson','2020 rue Lacordaire','1992-05-01',40003.04,'jamesw@thebank.ca','5141234567','teller',1),
(16,'Mr','Joe','Zanet','2009 rue St-Pierre','1982-03-01',90003.04,'joezanet@thebank.ca','5142223099','teller',2),
(17,'Mr','Pierre','Wilson','2010 rue Lacordaire','1999-06-01',100003.04,'pierrw@thebank.ca','5141113435','teller',3),
(18,'Mrs.','James','Jones','50 Queen Street','1957-07-06',170943.47,'james.jones@queen.com','5149271547','branch manager',10),
(19,'Dr','Opera','Winfree','59 Kings Street','1998-07-06',128943.47,'opera.winfree@thebank.com','1698771547','branch manager',11),
(20,'Mr','Phill','Collins','23 Prince Street','1990-07-06',118943.47,'phill.colins@thebank.com','5143271547','branch manager',12),
(21,'Ms','Jane','Foster','11 Maple Way','1967-07-06',78943.47,'jane.foster@farm.com','5142271547','branch manager',13),
(22,'Mr','Tess','Torm','8763 Sherbrooke 0','1966-09-06',99943.47,'tweeks8@nature.com','1018789647','branch manager',14),
(23,'Mrs','Irina','Frame','52 Queen street','1960-07-09',78943.47,'irina.frame@queen.com','1018276857','branch manager',15),
(24,'Mr','Pierre','vendome','101 rue vendome','1999-06-01',60003.04,'pierrvendome@thebank.ca','5142222435','teller',4);


--
-- Data for table `branch_manager`
--
-- (branch_id,employee_id)
INSERT INTO `branch_manager` VALUES (1,1),
(2,2),
(3,3),
(4,4),
(5,5),
(6,6),
(7,8),
(8,8),
(9,9),
(10,18),
(11,19),
(12,20),
(13,21),
(14,22),
(15,23);


--
-- Data for table `client`
--

INSERT INTO `client` VALUES (1,'Roberto','Carlos','1978-08-09','2008-06-17','123, birch st.','r.carlos@gmail.com','5146723465',1,0),
(2,'Nina','Robert','1992-02-23','2006-04-07','63, park av.','nina2002@hotmail.com','5145721241',2,0),
(3,'Ron','MacTavish','1988-07-15','2003-01-27','909, pine st.','mactavish.ron@yahoo.com','5146723465',3,0),
(4,'Eric','Hamel','1994-03-06','2009-06-14','999, Saint Joseph.','eric.h@gmail.com','5146123600',4,0),
(5,'Lucy','Milot','1988-04-21','2013-02-13','32, park hil Av..','lm_2000@yahoo.com','5146124462',5,0),
(6,'Mark','Johnson','1982-04-21','2016-01-11','43, hilson Av..','mj_1982@gmail.com','5146124134', 6,0),
(7,'Alice','Milot','1983-01-24','2012-01-11','32, park hil Av..','am_2099@yahoo.com','5146124432', 5,0),
(8,'Henrik','Wilson','1991-04-21','2015-02-13','42, merton Av..','pdk@yahoo.com','5146224462',5,0),
(9,'John','Peterson','1977-04-21','2016-02-13','12 st catherine.','peterson21@yahoo.com','5141114462',5,0),
(10,'Alex','Milot','1998-04-21','2011-02-13','12, park hil Av..','433_2000@yahoo.com','5122220099',5,0);


--
-- Data for table `charge_plan`
--

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


--
-- Data for table `login`
--

INSERT INTO `login` VALUES (1, 1234567890, "password", 1, 1),
(2, 01876543210, "password", 0, 1),
(3, 02123456789, "password", 0, 2),
(4, 03838281938, "password", 0, 3),
(5, 04203948756, "password", 0, 4),
(6, 05203248855, "password", 0, 5),
(7, 06804596950, "password", 0, 6),
(8, 06801299493, "password", 0, 7),
(9, 06412012031, "password", 0, 8),
(10, 06220312317, "password", 0, 9);


--
-- Data for table `service`
--

INSERT INTO `service` VALUES (1,'credit card',10,19.00,1,'banking'),
(2,'line of credit',11,5.00,2,'banking,'),
(3,'mortgage',12,3.00,3,'investment'),
(4,'investment portfolio',13,8.00,4,'investment'),
(5,'personal loan',14,10.00,5,'banking'),
(6,'student line of credit',11,8.50,6,'banking'),
(7,'reward credit card',10,17.00,7,'banking'),
(8,'life insurance',13, 1.25,7,'insurance');


--
-- Data for table `client_service`
--

INSERT INTO `client_service` VALUES (1,1,50.00),
(1,2,350.00),
(1,3,44.00),
(2,4,0.00),
(2,6,0.00),
(3,2,52.00),
(3,7,0.00),
(4,1,0.00),
(4,6,23.00),
(5,1,0.00),
(5,7,79.00);


--
-- Data for table `account`
--

INSERT INTO `account` VALUES (1154378,'checking',0.00,120000.00,8,'personal'),
(1154371,'savings',0.00,120000.00,8,'business'),
(7835092,'savings',2.00,25000.00,9,'business'),
(7843328,'checking',0.00,10000.00,8,'personal'),
(8736736,'savings',2.00,3000.00,9,'personal'),
(8736712,'checking',2.00,3000.00,8,'personal'),
(8736713,'checking',2.00,3000.00,8,'personal'),
(1154314,'savings',2.00,50000.00,9,'personal'),
(9056315,'savings',2.00,1000000.00,11,'business');


--
-- Data for table `client_account`
--

INSERT INTO `client_account` VALUES (1,1154378),
(2,7835092),
(3,7843328),
(4,8736736),
(5,9056348),
(1,8736712),
(1,1154314),
(1,9056315);
