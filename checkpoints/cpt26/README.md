# Checkpoint 26: Querying a Database in PHP

In this checkpoint you will be querying a database in PHP.

## Learning Outcomes

At the completion of this checkpoint:

* you will have gained practice writing pattern matching SQL queries.
* you will be familiar with pattern matching SQL queries.

## Activities

For this checkpoint, you will continue to use the same partners or this in class activity.
Please find your partner in class and work on this assignment using [Pair Programming](https://en.wikipedia.org/wiki/Pair_programming).
During the class the instructor will announce its time to switch driver and navigator roles and continue.

Please fill in the header comment with you and your partners **CS Lab Username** and the date.

### Sorting Data Both Ascending and Descending

Add an option to sort the data for each column.
Using query strings from chapter 5, create links for the headers that will sort the table by that column.
Try building on the example below that uses icons display sort options to the user.

```html
Student ID <a href="?field=student_id&sort=asc"><img src="images/sort_asc.png" alt="asc" /></a>
```

In the _student\_list.php_ alter the query to add an _ORDER BY_ clause based on the query string.

### Search By Name

In the _student\_list.php_ create a form that allows a user search students name.
The search term can be either _first_ or _last_ name.
The search should support only partial names.

* Create a search form.
* Support search by first or last name in a single form element.
* Partial names should be supported.

Take a look at [Pattern Matching](https://dev.mysql.com/doc/refman/5.7/en/pattern-matching.html) on the MySQL documentation.

## Resources

* [Pattern Matching](https://dev.mysql.com/doc/refman/5.7/en/pattern-matching.html)
* [sql](https://dev.mysql.com/doc/)
* [pdo Connections](https://secure.php.net/manual/en/pdo.connections.php)
