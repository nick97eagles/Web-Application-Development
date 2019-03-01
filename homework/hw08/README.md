# Homework 8: Javascript

Your task in this assignment is to create a JavaScript wheel-of-fortune game.
If you are not familiar with the game show, do a little googling to figure out how it is played.
Your game should include PHP code which creates a JavaScript file with an array of puzzles generated from the provided CSV file.
Once those puzzles have been loaded, however, the rest of the program should be written in JavaScript, HTML, and CSS only and run entirely on the client.
Here are the specific things your implementation must include.

## Assignment Specifications

You must have the following files:

* **index.html** -- homepage for your application that is the only page the user accesses directly.
* **javascript.php** -- this file should contain your JavaScript and the PHP code that generates an array of puzzles based on the CSV file.
* **puzzles.csv** -- this is the CSV file with puzzles which you will download as described below.
* **index.css** -- this is your CSS file to style your game.

The game should be played as follows:

* A game board made up of small input boxes in four rows (12, 14, 14, and 12 boxes in each row) is displayed, along with another input box giving the players current bank (amount of money).
* The player picks a category (included in the CSV file) and a randomly selected puzzle from that category is chosen.
* Boxes are then filled in to indicate which contain letters and which are blanks/spaces, and the bank is set to zero.
* The user then plays as follows:
  * They can either spin the wheel or buy a vowel (if they have money -- they cost $150 each).
    If they choose to spin, they click a button and get random point/dollar values (between $200 and $1000) or a bankrupt which zeros their bank balance.
    Note that you don't actually have to have a spinning wheel, but it would be cool!
  * Then they pick a letter (either a vowel if they bought it, or a consonant if they spun and didn't go bankrupt) then all blanks in the puzzle which contain that letter are revealed.
  * At the end of their turn, they get to guess at the puzzle type typing their guess into a separate input.

Additional Notes:

* Be sure to utilize appropriate web standards and validate your HTML, CSS, and JavaScript.
* Before you begin the assignment, estimate the time you believe it it will take you to complete the assignment.
  Then log your time and submit both your initial time estimate and the final time that it took you using an assignment submission template.


Resources

* [Wheel of Fortune on YouTube](https://www.youtube.com/user/wheeloffortune/)