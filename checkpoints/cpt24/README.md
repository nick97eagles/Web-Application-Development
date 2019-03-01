# Checkpoint 24: Multi-table Queries

In this checkpoint you will be working with SQL query for multiple tables.

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
Open up [phpmyadmin](http://192.168.33.220/phpmyadmin) log in using your database user (dbuser) and password (test123).
Naviage to _school_ database and import the following files in order:

* public/examples/chapter13/school-schema.sql
* public/examples/chapter13/school-relations.sql

Take a look at [phpMyAdmin](https://www.phpmyadmin.net/) project.

### Database Details

Answer the following questions about your new database.

* Create a list of keys in each table.
  * Identify them as a primary or foreign key.
  * Create the list in this _README.md_.
* Create a diagram showing how each table is connect.
  * Consider using [draw.io](https://www.draw.io/).
  * Save the diagram to the checkpoint folder.

### SQL Join Queries

Using the database you just imported, create the following queries.
Save each of your queries in _activites.sql_.

* Create a list of courses with the course name and department name.
* Create a list of courses with the course name and the instructor.
* Create a list of courses with the course name, the instructor, and department name.
* Create a list of student and courses they are taking.
* Create a list of student who have course that meet on Thursday.
* Create a list of departments with the count of students in the major.

Check out the MySQL SQL documentation:

* [sql](https://dev.mysql.com/doc/)

## Resources

* [sql](https://dev.mysql.com/doc/)
* [phpMyAdmin](https://www.phpmyadmin.net/)
