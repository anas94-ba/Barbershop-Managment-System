CREATE TABLE `tbladmin` (
  `ID` int(1) UNIQUE NOT NULL ,
  `Name` char(50) UNIQUE NOT NULL ,
  `Email` varchar(200) NULL,
  `Password` varchar(200) UNIQUE NOT NULL 
) ;