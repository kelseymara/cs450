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
EMPLOYEE(<ul>EmployeeNumber</ul>, FirstName, LastName, *Department*, Phone Email)
PROJECT(<ul>ProjectID</ul>,ProjectName, *Department*, MaxHours, StartHours, StartDate, EndDate)
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

## SQL 2 Powerpoint Notes


### Queries Overview
- SELECT is the best-known SQL statement
- SELECT will retrieve information from the database that matches the specified critera using the SELECT / FROM / WHERE framework 
``` SQL 
SELECT ColumnName
FROM Table
WHERE Condition;
```
- The results of a Query is a Relation 

### Show Data or Data Samples
- To show all of the column values for the rows that match the specified criteria, use an asterik (*)
``` SQL 
SELECT * FROM PROJECT;
```
- Be careful of big tables!
- Do NOT often use it, instead use 
``` SQL 
SELECT * FROM PROJECT LIMIT 3; 
```
OR 
``` SQL 
SELECT COUNT(*) FROM PROJECTS;
```
#### Show Certain Columns
The Following SQL statement queries three of the six columns of the PROJECT table: 
``` SQL 
SELECT ProjectName, Department, MaxHours FROM PROJECT;
```
The DISTINCT keyword may be added to the SELECT statement to inhibit dupliate rows from displaying
``` SQL 
SELECT Department FROM EMPLOYEE;
SELECT DISTINCT Department FROM EMPLOYEE;
```
### Specifying Search Criteria
- The WHERE clause stipulates the matching criteria for the record that are to be displayed
- Note the equality sign. Single, not double!
``` SQL 
SELECT * 
FROM PROJECT 
WHERE Department = 'Finance';

SELECT *
FROM PROJECT 
WHERE MaxHours > 135;
```
### Logical Operators 
``` SQL
SELECT *
FROM PROJECT
WHERE Department = 'Finance' AND MaxHours > 135;
```
``` SQL
SELECT * 
FROM PROJECT
WHERE Department = 'Finance' OR MaxHours > 135;
```
### A list of Values
- The WHERE clause may include the IN keyword to specify that a particular column value must be included in a list of values 
``` SQL 
SELECT FirstName, LastName, Depatment 
FROM Employee
WHERE Department IN ('Finance', 'Accounting', 'Marketing');
```
this is equivalent to: 
``` SQL 
SELECT FirstName, LastName, Department
FROM Employee
WHERE Department = 'Finance' OR Department='Accounting' OR Department='Marketing';
```



