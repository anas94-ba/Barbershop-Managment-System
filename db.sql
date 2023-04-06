CREATE TABLE `tbladmin` (
  `ID` int(1) AUTO_INCREMENT PRIMARY KEY ,
  `Name` char(15) UNIQUE NOT NULL ,
  `Email` varchar(20) NULL,
  `Password` varchar(40) UNIQUE NOT NULL 
) ;