# Checkpoint 25: Querying a Database in PHP

In this checkpoint you will be querying a database in PHP.

## Learning Outcomes

At the completion of this checkpoint:

* you will have gained practice writing SQL queries for multiple tables.
* you will have gained practice using PDO.
* you will be familiar with SQL queries.
* you will be familiar with PDO.

## Activities

For this checkpoint, you will continue to use the same partners or this in class activity.
Please find your partner in class and work on this assignment using [Pair Programming](https://en.wikipedia.org/wiki/Pair_programming).
During the class the instructor will announce its time to switch driver and navigator roles and continue.

Please fill in the header comment with you and your partners **CS Lab Username** and the date.

### Connect To The Database

We are continuing to use the school database.
If your database is not set up, follow the steps from checkpoint 23 or 24.

To connect to your database, you need to specific the details of the connection.
Typically we save these to a configuration file, like in _db.php_.
Start by including this file and then create your **PDO** connection.
Below is an example PHP database connection.

```php
# include database configuration file
include('db.php');

# connect to database
$dbh = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass);
```

Check out the PHP PDO documentation for questions:

* [pdo Connections](https://secure.php.net/manual/en/pdo.connections.php)

### SQL Query

Take a look at [student list](http://192.168.33.220/checkpoints/cpt25/solutions/student_list.php).
Create a SQL query that produces this table of information.

Hints:

* You will need the following tables: department, major, and student
* You will need to convert the level to english in PHP.

Check out the MySQL SQL documentation:

* [sql](https://dev.mysql.com/doc/)
* [sql](http://192.168.33.220/phpmyadmin/)

### Static to Dynamic Data

Using the query you wrote in the previous activity, update _student\_list.php_ to display the data from the database.

### Sorting Data

Add an option to sort the data for each column.
Using query strings from chapter 5, create links for the headers that will sort the table by that column.

```html
<a href="?sort=student_id">Student ID</a>
```

In the _student_list.php alter the query to add an _ORDER BY_ clause based on the query string.

## Resources

* [sql](https://dev.mysql.com/doc/)
* [pdo Connections](https://secure.php.net/manual/en/pdo.connections.php)
