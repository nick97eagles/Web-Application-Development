# Checkpoint 23: SQL

In this checkpoint you will be working with SQL and a database.

## Learning Outcomes

At the completion of this checkpoint:

* you will have gained practice writing SQL queries.
* you will have gained practice importing a database.
* you will be familiar with SQL queries.
* you will be familiar with using phpMyAdmin.

## Activities

For this checkpoint, your partners will be picked based on an in class activity.
Please find your partner in class and work on this assignment using [Pair Programming](https://en.wikipedia.org/wiki/Pair_programming).
During the class the instructor will announce its time to switch driver and navigator roles and continue.

Please fill in the header comment with you and your partners **CS Lab Username** and the date.

### Import Example Database

Make sure your vagrant VM is running before doing this activity.
Open up [phpmyadmin](http://192.168.33.220/phpmyadmin) log in using your database user (**dbuser**) and password (**test123**).
Naviage to _dbname_ database and import the following files in order:

* public/examples/chapter13/school-schema.sql
* public/examples/chapter13/school-relations.sql

Take a look at [phpMyAdmin](https://www.phpmyadmin.net/) project.

### Database Details

_??? **Discussion Question** for you and your partner ???_

* Where have you seen a database used before?

Answer the following questions about your new database.

* How many tables are in the database?
    7
* How many fields are in _course_?
    5
* What are the fields and types in _student_?
    student_id = INT, student_firt = VARCHAR(100), student_last = VARCHAR(100), student_level = TINYINT, student_bdate = DATETIME 
* How many students are in the database?
    10 
* Give an example record in department.
    department_id = 2
    department_name = "computer science"

### SQL Queries

Using the database you just imported, create the following queries.
Save each of your queries in _activites.sql_.

* Get a list of student first and last names only.
* Get the count of courses in the database.
* Get a list of distinct _course\_prefix_ es from the _course_ table.
* Get the count of students in each major with the department title.
* Find all students that have a first name with the letter _a_ sorted by last name.

Check out the MySQL SQL documentation:

* [sql](https://dev.mysql.com/doc/)

## Resources

* [sql](https://dev.mysql.com/doc/)
* [phpMyAdmin](https://www.phpmyadmin.net/)
