SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: sdc310_wk3pa
CREATE DATABASE IF NOT EXISTS sdc310_midterm DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE sdc310_midterm;

-- Table structure for table userinfo
DROP TABLE IF EXISTS userinfo;
CREATE TABLE userinfo (
  AddressNo int(11) NOT NULL,
  FirstName varchar(25) NOT NULL,
  LastName varchar(30) NOT NULL,
  Street varchar(100) NOT NULL,
  City varchar(25) NOT NULL,
  StateIn varchar(2) NOT NULL,
  ZipCode int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Data for table userinfo
INSERT INTO userinfo (AddressNo, FirstName, LastName, Street, City, StateIn, ZipCode) VALUES
(1, 'Noah', 'Michael', 'Circle Ln.', 'Yonkers', 'NY', '11000'),
(2, 'Gabriela', 'Malaka', 'Dane Ridge', 'Woodbridge', 'VA', '22193');

-- Indexes for table userinfo
ALTER TABLE userinfo
  ADD PRIMARY KEY (AddressNo);

-- AUTO_INCREMENT for table userinfo
ALTER TABLE userinfo
  MODIFY AddressNo int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;