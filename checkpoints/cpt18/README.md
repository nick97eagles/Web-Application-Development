# Checkpoint 18: PHP Arrays

In this checkpoint you will be working with 2D arrays and array functions.

## Learning Outcomes

At the completion of this checkpoint:

* you will have gained practice writing embedded PHP code in a loop.
* you will be familiar with embedded PHP and basic PHP syntax.

## Activities

For this checkpoint, use the same partners as Monday (the partner list from the board).
Please find your partner in class and work on this assignment using [Pair Programming](https://en.wikipedia.org/wiki/Pair_programming).

The activities for today are different stages of reading and displaying information from a file.
During the class the instructor will announce its time to switch driver and navigator roles and continue.

Please fill in the header comment with you and your partners **CS Lab Username** and the date.

### Count the number of players at each position

Create a new table with the positions and the number of players at that position.
Start by creating an associate array with the key being the position and the value being the counted players.
Then loop over the rosters adding up all the players.

* Create an associative array for positions.
* Print the associative array in a table.

Take a look at this PHP function: [array_key_exists](https://secure.php.net/manual/en/function.array-key-exists.php)
This PHP control structure is also helpful: [foreach](https://secure.php.net/manual/en/control-structures.foreach.php)

### Update roster table to show position counts

| Name               | Position      | Number  | Other players |
| ------------------ | ------------- | ------- | ------------- |
| Mr Preston Carman  | 3rd Base      | 17      | 2             |
| Mr James Foster    | 3rd Base      | 42      | 2             |

Update the roster tables to include the total number of players in that position.
Use your new associative array to find the information to add to your table.

* Add a new column to your table for total player sin the position.

### Sort the 2D Array

The roster from two teams is displayed in two HTML tables.
Write a PHP function that sorts the 2D roster array by player name.
The function should be written in the _functions.php_ file.
Remember to put your CS Lab usernames in the _functions.php_ file.

* Write a PHP function to sort the roster array.
* Update roster.php to display the sorted player roster.

Take a look at these PHP functions: [array_multisort](https://secure.php.net/manual/en/function.array-multisort.php) and [array_column](https://secure.php.net/manual/en/function.array-column.php).

## Resources

* [PHP Documentation](https://secure.php.net/docs.php)
* [array_multisort](https://secure.php.net/manual/en/function.array-multisort.php)
* [array_column](https://secure.php.net/manual/en/function.array-column.php)
* [array_key_exists](https://secure.php.net/manual/en/function.array-key-exists.php)