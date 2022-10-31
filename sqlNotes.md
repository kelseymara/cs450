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
```sql
CREATE TABLE length(length ENUM('small','medium','large'));
```
### Create Employee Table
EMPLOYEE(<u>EmployeeNumber</u>, FirstName, LastName, *Department*, Phone, Email)
AUTO_Increment=x: Surrogate key. Start from x, increment by 1
```SQL
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
VarChar(100): defines a string with length up to 100 characers, the storage **is up** to 100 characters
Char(35): define a string with length up to 35 characters, the storage is **fixed to** 35 characters
