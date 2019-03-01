# Checkpoint 20: Processing Form Data in PHP 

In this checkpoint you will be working with PHP receiving form data and image upload.

## Learning Outcomes

At the completion of this checkpoint:

* you will have gained practice writing PHP code to collect form data.
* you will have gained practice writing file upload forms.
* you will be familiar with PHP variables used with forms.
* you will be familiar with file upload forms.

## Activities

For this checkpoint, use the same partners as Monday (the partner list from the board).
Please find your partner in class and work on this assignment using [Pair Programming](https://en.wikipedia.org/wiki/Pair_programming).
During the class the instructor will announce its time to switch driver and navigator roles and continue.

Please fill in the header comment with you and your partners **CS Lab Username** and the date.

### Player Page

_??? **Discussion Question** for you and your partner ???_

* What is the difference between an associative array and normal array?
    An associative array is an array that can have any value used as its index while a normal
    array only uses integers as its index 

Add PHP code to _player.php_ to display a specific players information.
Review the _roster.php_ file to figure out how the player page will be receiving information.
The roster page has two methods of sending a user to the player page: through a link and a form.

* Update _player.php_ to display specific players information.
* Use HTML and CSS to nicely display the form to the user.

Take a look at PHP [Superglobals](https://secure.php.net/manual/en/language.variables.superglobals.php)

### HTML Image Upload Forms

_??? **Discussion Question** for you and your partner ???_

* Can you tell if the link was liked or the form was submitted?

Using the form on the _roster.php_ page, add an option to upload an image for the player.
In _player.php_ save the image to the uploads folder using the player number as file name.
Review the _form\_example.php_ to see how to write the image form.
Once the image is saved, update player to display the image.

* Save the image to uploads folder.
* Name the file using the player number so you can easily look it up later.
* Modify the _player.php_ to display the image if it exists.

These PHP functions may be helpful:

* [move_uploaded_file](https://secure.php.net/manual/en/function.move-uploaded-file.php)
* [basename](https://secure.php.net/manual/en/function.basename.php)
* [getimagesize](https://secure.php.net/manual/en/function.getimagesize.php)

## Resources

* [PHP Documentation](https://secure.php.net/docs.php)
* [array_multisort](https://secure.php.net/manual/en/function.array-multisort.php)
* [array_column](https://secure.php.net/manual/en/function.array-column.php)
* [array_key_exists](https://secure.php.net/manual/en/function.array-key-exists.php)