# SQL Notes from CS 450 Databases Class

## SQL 1 Powerpoint Notes

The SQL **data definition** statements include: 
- **CREATE**: to create databse objects
- **ALTER**: to moidfy the structure and/or characteristics of database objects
- **DROP**: to delete database objects

### Example - An Employee Work DataBase
- DEPARTMENT(<u>DepartmentName</u>, BudgetCode, OfficeNumber, Phone)
- EMPLOYEE(<u>EmployeeNumber</u>, FirstName, LastName, *Department*, Phone, Email)
- PROJECT(ProjectID, ProjectName, *Department* , MaxHours, StartDate, EndDate)
- ASSIGNMENT(<u>ProjectID</u>,<u>EmployeeNumber</u>, HoursWorked)

### Create Database Tables
  DEPARTMENT(<u>DepartmentName</u>, BudgetCode, OfficeNumber, Phone)
``` SQL 
CREATE TABLE DEPARTMENT(
DepartmentName VarChar(35) NOT NULL PRIMARY KEY,
BudgetCode VarChar(30) NOT NULL,
OfficeNumber VarChar(15) NOT NULL,
Phone VarChar(12) NOT NULL
);
```
- NOT NULL: null values are NOT allowed
   - If this attribute must have value, use NOT NULL
   - By default, we allow NULL values unless the variable is a primary key
 - Primary key: DepartmentName is a primary key
 - VarChar(35) a string with length up to 35

### Official MySQL Data Types 
DATETIME 
- use when you need values containing both date and time information 
- Display Format: YYYY-MM-DD HH:MM:SS
<br/>
ENUM
```SQL
CREATE TABLE length(length ENUM('small','medium','large'));
```
### Create Employee Table
EMPLOYEE(<u>EmployeeNumber</u>, FirstName, LastName, *Department*, Phone, Email)
AUTO_Increment=x: Surrogate key. Start from x, increment by 1

``` SQL
CREATE TABLE EMPLOYEE
(
    EmployeeNumber Int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VarChar(25) NOT NULL,
    LastName VarChar(25)  NOT NULL,
    Department VarChar(35) NOT NULL DEFAULT 'Human Resources',
    Phone VarChar(12) NULL,
    Email VarChar(100) NOT NULL UNIQUE,
    CONSTRAINT EMP_DEPART_FK FOREIGN KEY(Department) REFERENCES 
    DEPARTMENT(DepartmentName)on UPDATE CASCADE
);
```
<br/>

  VarChar(100): defines a string with length up to 100 characers, the storage **is up** to 100 characters

  Char(35): define a string with length up to 35 characters, the storage is **fixed to** 35 characters

### Order to Create Tables
DEPARMENT(<ul>DepartmentName</ul>, BudgetCode, OfficeNumber, Phone)
<br/>
EMPLOYEE(<ul>EmployeeNumber</ul>, FirstName, LastName, *Department*, Phone Email)
<br/>
PROJECT(<ul>ProjectID</ul>,ProjectName, *Department*, MaxHours, StartHours, StartDate, EndDate)
<br/>
ASSIGNMENT(<ul>ProjectID</ul>,<ul>EmployeeNumber</ul>,HoursWorked)
- ASSIGNMENT is dependent on PROJECT and EMPLOYEE
- PROJECT is dependent on DEPARTMENT
- EMPLOYEE is dependent on DEPARTMENT
- So the right order is: 
    1. DEPARTMENT
    2. EMPLOYEE and PROJECT 
    3. ASSIGNMENT

### Insert Data
DEPARTMENT(<ul>DepartmentName</ul>, BudgetCode, OfficeNumber, Phone)
``` SQL
INSERT INTO DEPARTMENT VALUES ('Administration', 'BC-100-10', 'BLDG01-300','360-285-8100')
```
Insert Data to Employee Table
EMPLOYEE(<ul>EmployeeNumber</ul>, FirstName, LastName, *Department*, Phone, Email)
```SQL
INSERT INTO EMPLOYEE VALUES (NULL, 'Mary', 'Jacobs', 'Administration', '360-285-8100', 'Mary.Jacobs@wpc.com')
```
- EmployeeNumber is a surrogate key, no need to insertEmployeeNumber
- Department is a foreign key, so we need to make sure it does exist in the DEPARTMENT table
What if no phone number information for the employee? When we define EMPLOYEE table, we allow phone number to be NULL.
``` SQL
INSERT INTO EMPLOYEE VALUES (NULL, 'Mary', 'Nestor', 'InfoSystems', NULL, 'Mary.Jacobs@wpc.com')
```
### Drop Tables
Tables dropped in reverse order of creating tables. Less Dependency can be dropped first. Main table must be dropped last! 
``` SQL
DROP TABLE ASSIGNMENT;
DROP TABLE PROJECT;
DROP TABLE EMPLOYEE;
DROP TABLE DEPARTMENT;
```
