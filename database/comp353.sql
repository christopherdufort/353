-- MySQL Distrib 5.6.42, for Linux (x86_64)
-- Host: gec353.encs.concordia.ca    Database: gec353_2
-- Server version	5.6.42
-- ------------------------------------------------------

/*
Table Creation script

If using a local database run the following line command first:
create database gec353_2

This script is run manually to create the structure of the database.
To run this script open up the mysql console and type the following command:
source absolute\path\to\gec353_2.sql
*/


USE gec353_2;


-- Clean out existing tables;
DROP TABLE IF EXISTS `client_account`;
DROP TABLE IF EXISTS `account`;
DROP TABLE IF EXISTS `client_service`;
DROP TABLE IF EXISTS `service`;
DROP TABLE IF EXISTS branch_manager;
DROP TABLE IF EXISTS `charge_plan`;
DROP TABLE IF EXISTS `employee`;
DROP TABLE IF EXISTS `client`;
DROP TABLE IF EXISTS `branch`;
DROP TABLE IF EXISTS `login`;

--
-- Table structure for table `branch`
--

CREATE TABLE branch (
  branch_id int(11) NOT NULL AUTO_INCREMENT,
  branch_name varchar(255) DEFAULT NULL,
  location varchar(255) DEFAULT NULL,
  phone varchar(10) DEFAULT NULL,
  fax varchar(10) DEFAULT NULL,
  opening_date date DEFAULT NULL,
  PRIMARY KEY (branch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `salary` decimal(11,2) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `employee_type` varchar(255) DEFAULT NULL,
  `works_for_branch` int(11) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`works_for_branch`) REFERENCES `branch` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `branch_manager`
--

CREATE TABLE branch_manager (
  branch_id int(11) NOT NULL,
  employee_id int(11) NOT NULL,
  PRIMARY KEY (branch_id,employee_id),
  FOREIGN KEY (branch_id) REFERENCES branch (branch_id),
  FOREIGN KEY (employee_id) REFERENCES employee (employee_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`client_id`),
  FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `charge_plan`
--

CREATE TABLE `charge_plan` (
  `charge_id` int(11) NOT NULL AUTO_INCREMENT,
  `charge_name` varchar(255) DEFAULT NULL,
  `charge` decimal(11,2) DEFAULT NULL,
  `limit` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`charge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_number` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_employee` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `service_interest` decimal(5,2) DEFAULT NULL,
  `charge_plan_id` int(11) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `amount_due` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  FOREIGN KEY (`charge_plan_id`) REFERENCES `charge_plan` (`charge_id`),
  FOREIGN KEY (`manager_id`) REFERENCES `employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `client_service`
--

CREATE TABLE `client_service` (
  `client_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`client_id`,`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_number` int(11) NOT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `account_interest` decimal(5,2) DEFAULT NULL,
  `balance` decimal(11,2) DEFAULT NULL,
  `charge_plan_id` int(11) DEFAULT NULL,
  `account_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`account_number`),
  FOREIGN KEY (`charge_plan_id`) REFERENCES `charge_plan` (`charge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `client_account`
--

CREATE TABLE `client_account` (
  `client_id` int(11) NOT NULL,
  `account_number` int(11) NOT NULL,
  PRIMARY KEY (`client_id`,`account_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for transactions
--

CREATE TABLE `transactions`(
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_account` int(11) NOT NULL,
  `to_account` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `transaction_date` date NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;