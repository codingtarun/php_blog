# MySQL KEYNOTES


## DBMS : Data Base Management System.

## RDBMS : Relational Database Management Systsem.

## RDBMS uses SQL:[Structured Query Language] language to communicate with database.

## Popular RDBMS systems : 
    1. Oracle
    2. MySQL
    3. MS SQL Server
    4. PostgreSQL

## Two types of Database : 
    1. Relational
    2. NoSQL

```
NoSQL : 
1. NoSQL is not a Table-based Database.
2. NoSQL database are document based.
3. Examples : MongoDB, Redis, Cassandra etc.

```

## Benefits of using MySQL : 
```
1. Cross Platform.
2. Can be used with multiple programming langauge (PHP,NodeJS, Python, C#).
3. Is Open Source.
4. MySQL is RDBMS.
5. Fast , reliable, scalable and easy to use.
6. Can be used with any client/server side systesms.

```

## Popular Websites using MySQL : 
```
1. Facebook.
2. Twitter.
3. Google.
4. Wikipedia.
5. Youtube.
6. Flickr.
7. Pinterest.

```
## Popular CMS using CMS :
```
    1. WordPress.
    2. Joomla.
    3. Drupal.
    and many more.
```

## SQL BASICS

```
    1. Creating new Database : 
        1.1. create DATABASE `new_db`;
        1.2. 
    2. Creating new Table : 
        2.1. decide data type for columns. 
        2.2. Data types in MySQL is broadly divided in 3 types.
            2.2.1. String Data Types :
                    * CHAR (0 - 255 characters)
                    * VARCHAR (0 - 65535 characters)
                    * BINARY (0 - 255 only binary value i.e 01010110)
                    * VARBINARY (0 - 65535 only binary i.e 01001001)
                    * TINYTEXT (max : 255)
                    * TEXT(65353 bytes)
                    * MEDIUMTEXT(16,777,215 chars)
                    * LONGTEXT(4294967295 chars)
                    * TINYBLOB(stores in bytes : 255bytes)
                    * BLOB (65535 bytes)
                    * MEDIUMBLOG (16777215 bytes)
                    * LONGBLOB (4294967295 bytes)
                    * ENUM (save values from a set of values)
                    * SET (lis upto 64 values )
            2.2.2. Numeric Data Types : 
                    * BIT(1 to 64)
                    * TINYINT (-128 to 127 number)
                    * INT (-2147483648 to 2147483648 number)
                    * INTEGER
                    * SMALLINT (-32768 to 32767)
                    * MEDIUMINT(-8388608 to 8388607)
                    * BIGINT
                    * BOOL (0 or 1 1 value only)
                    * BOOLEAN 
                    * FLOAT()
                    * DOUBLE
                    * DECIMAL
                    * DEC
            2.2.3. Date & Time Datatype : (YYYY-MM-DD hh:mm:ss)
                    * DATE (1000-01-01 to 9999-12-31)
                    * DATETIME (fsp)
                    * TIMESTAMP (fsp)
                    * TIME (fsp)
                    * YEAR : four digit year 1990

```

## SQL Commands : 
```
    1. Select Databsase to perform action : 
        use `db_name`;
    2. Creating a table in Database : 
        CREATE TABLE `table_one` (
                    ----------------------------------
                    | COLUMN NAME | DATATYPE & LIMIT |
                    ----------------------------------
                    id INT,
                    name VARCHAR(50),
                    birth_date DATE,
                    phone VARCHAR(12),
                    gender VARCHAR(1)
                );
    3. Comment in MySQL : use `--`.
    4. 
```