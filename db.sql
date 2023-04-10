CREATE TABLE `tbladmin` (
  `ID` int(1) AUTO_INCREMENT PRIMARY KEY ,
  `Name` char(15) UNIQUE NOT NULL ,
  `Email` varchar(20) NULL,
  `Password` varchar(40) UNIQUE NOT NULL 
) ;


CREATE TABLE `tblcustomer` (
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY ,
  `phone` varchar(12) NOT NULL , 
  `Email` varchar(20) NULL,
  `Name` char(15) NOT NULL ,
  `Password` varchar(40)  NOT NULL 
) ;

CREATE TABLE `tblservice` (
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY ,
  `Price` int(10) NOT NULL,
  `Name` varchar(50) UNIQUE NOT NULL ,
  `Time` int(10) NOT NULL,
) ;

CREATE TABLE `tblcustomermsg` (
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY ,
  `CustomerID` int(10) NOT NULL,
  `Title` varchar(50) NOT NULL ,
  `Object` varchar(200) NOT NULL ,
  `Status` int(2) NOT NULL,
  `Date` date NOT NULL,
  FOREIGN KEY (CustomerID) REFERENCES tblcustomer (ID) ON DELETE CASCADE
) ;





CREATE TABLE `tblbarber` (
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY ,
  `phone` varchar(12) NOT NULL ,
  `Email` varchar(20) NOT NULL,
  `Name` char(15) UNIQUE NOT NULL ,
  `Password` varchar(40)  NOT NULL 
) ;


CREATE TABLE `tblbarbermsg` (
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY ,
  `BarberID` int(10) NOT NULL,
  `Title` varchar(50) NOT NULL ,
  `Object` varchar(200) NOT NULL ,
  `Status` int(2) NOT NULL,
  `Date` date NOT NULL,
  FOREIGN KEY (BarberID) REFERENCES tblbarber (ID) ON DELETE CASCADE
) ;

CREATE TABLE `tblappointment` (
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY ,
  `CustomerID` int(10) NOT NULL,
  `ServiceID` int(10) NOT NULL,
  `Status` int(2) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `end_time` time NOT NULL,
  FOREIGN KEY (CustomerID) REFERENCES tblcustomer (ID) ON DELETE CASCADE,
  FOREIGN KEY (ServiceID) REFERENCES tblservice(ID) ON DELETE CASCADE
) ;

CREATE TABLE `tblbill`(
  `ID` int(10) AUTO_INCREMENT PRIMARY KEY ,
  `AppointmentID` int(10) NOT NULL UNIQUE,
  FOREIGN KEY (AppointmentID) REFERENCES tblappointment (ID) ON DELETE CASCADE
);

CREATE TABLE `tblinformation` (
  `Email` varchar(20) NOT NULL ,
  `phone` varchar(12) NOT NULL ,
  `address` varchar(60) NOT NULL,
  `facebook` varchar(60)  NOT NULL 
) ;


DELIMITER $$
CREATE TRIGGER no_overlapping_appointments
BEFORE INSERT ON tblappointment
FOR EACH ROW
BEGIN
  IF EXISTS (
    SELECT * FROM tblappointment
    WHERE ID != NEW.ID and Date = NEW.Date
      AND (
        (NEW.Time BETWEEN Time AND end_time) OR
        (NEW.end_time BETWEEN Time AND end_time) OR
        (NEW.Time < Time AND NEW.end_time > end_time)OR
        (NEW.Time = Time AND NEW.end_time = end_time)
      )
  ) THEN
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Cannot insert overlapping appointment';
  END IF;
END$$
DELIMITER ;

