
//Global variables
var currentBalance = 0; 
var board = [ ["[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]"],
["[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]"],
["[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]"],
["[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]","[]"]
];

//Function that calls the other functions to print the categories in designated area on screen 
function writeTable(){
    table = document.getElementById("puzzles");
    table.innerHTML = getTableHTML(noDuplicate(puzzles));
}

//Function that will print the categories 
function getTableHTML(data){
    table_html = "<table>";
    for(var r = 0; r < data.length; r++){
        table_html += "<tr>";
            table_html += "<td><a href='?puzzleID=" + data[r] + "'>"; //prints each category as a link so user can chose
            table_html += data[r];
            table_html += "</a></td>";
        table_html += "</tr>";
    }
    table_html += "</table>";
    return table_html;
}

//Function to make sure duplicate categories don't show up 
function noDuplicate(data){
    var categories = [];
    for(var i = 0; i < data.length; i++){
        if(categories.indexOf(data[i][1]) == -1)
            categories.push(data[i][1]);
    }
    return categories;
}

//Function that will find the right area to print the table to 
function getTable(){
    var tableButton = document.getElementById("load_puzzles");
    tableButton.onclick = writeTable; 
    }

//Funtion that will display the game board
function displayBoard(){
    getPuzzle(); 
  
    //creates the 12,14,14,12 style of board
    var sOut = "<table>";
    for(var y = 0; y < board.length; y++){
        sOut += "<tr>";
        for(var x = 0; x < board[y].length; x++){
            if(board[y][x] == board[0][0]){
                board[0][0] = "";
            }
            else if(board[y][x] == board[0][13]){
                board[0][13] = "";
            }
            else if(board[y][x] == board[3][0]){
                board[3][0] = "";
            }
            else if(board[y][x] == board[3][13]){
                board[3][13] = "";
            }
        
             sOut += "<td>" + board[y][x] + "</td>";
        }
        sOut += "</tr>";
    }
    sOut += "</table>";
    

    //shows the current puzzle in progress under the board
    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    sOut += "<br>";
    sOut += "Category: ";
    sOut += $_GET['puzzleID'];
    document.getElementById("board").innerHTML = sOut; 

    letters($_GET['puzzleID']); //prints letters to chose under the board 
    findPuzzle(puzzles, $_GET['puzzleID']); //suppose to put the puzzle in the board 

}

//picks a puzzle to be played 
function getPuzzle(){
    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    
    alert("Your Puzzle is: " + $_GET['puzzleID']);
}

//Function that will display letters to chose for the puzzle
function letters(i){
    //All letters displayed will be buttons that upon clicking will call the necessary funtions to change the board
    var form = "";
    form += "<button onclick=\"currentBoard(Update_board(1));\">A</button>";
    form += "<button onclick=\"currentBoard(Update_board(2));\">B</button>";
    form += "<button onclick=\"Update_board(3);\">C</button>";
    form += "<button onclick=\"Update_board(4);\">D</button>";
    form += "<button onclick=\"Update_board(5);\">E</button>";
    form += "<button onclick=\"Update_board(6);\">F</button>";
    form += "<button onclick=\"Update_board(7);\">G</button>";
    form += "<button onclick=\"Update_board(8);\">H</button>";              // Goal was to add clickability to each button but I wanted to get the puzzle 
    form += "<button onclick=\"Update_board(9);\">I</button>";              // working first but that didn't happen so didn't see the point in continueing
    form += "<button onclick=\"Update_board(10);\">J</button>";             // adding clickability to all the buttons
    form += "<button onclick=\"Update_board(11);\">K</button>";
    form += "<button onclick=\"Update_board(12);\">L</button>";
    form += "<button onclick=\"Update_board(13);\">M</button><br>";
    form += "<button onclick=\"Update_board(14);\">N</button>";
    form += "<button onclick=\"Update_board(15);\">O</button>";
    form += "<button onclick=\"Update_board(16);\">P</button>";
    form += "<button onclick=\"Update_board(17);\">Q</button>";
    form += "<button onclick=\"Update_board(18);\">R</button>";
    form += "<button onclick=\"Update_board(19);\">S</button>";
    form += "<button onclick=\"Update_board(20);\">T</button>";
    form += "<button onclick=\"Update_board(21);\">U</button>";
    form += "<button onclick=\"Update_board(22);\">V</button>";
    form += "<button onclick=\"Update_board(23);\">W</button>";
    form += "<button onclick=\"Update_board(24);\">X</button>";
    form += "<button onclick=\"Update_board(25);\">Y</button>";
    form += "<button onclick=\"Update_board(26);\">Z</button>";

    document.getElementById("form").innerHTML = form; 

}

//Function will take in user's letter choice and display it on the board
function Update_board(letter){
    if(letter == 1 ){
       board[0][1]  = "A";
       currentBalance -= 150; //everytime a vowel is used $150 is deducted from the total Balance
       document.getElementById("bank").innerHTML = "Current Balance: " + currentBalance;
    }
    else if(letter == 2){
        board[2][4] = "B"; //was hardcoded in for debugging 
    }

    //Only A and B appear on the board because I was using them as tests, the other buttons dont do anything yet. 

    //creates the 12,14,14,12 style of board
    var sOut = "<table>";
    for(var y = 0; y < board.length; y++){
        sOut += "<tr>";
        for(var x = 0; x < board[y].length; x++){
            if(board[y][x] == board[0][0]){
                board[0][0] = ""; 
            }
            else if(board[y][x] == board[0][13]){
                board[0][13] = "";
            }
            else if(board[y][x] == board[3][0]){
                board[3][0] = "";
            }
            else if(board[y][x] == board[3][13]){
                board[3][13] = "";
            }
            
             sOut += "<td>" + board[y][x] + "</td>";
        }
        sOut += "</tr>";
    }
    sOut += "</table>";

    //shows the current puzzle in progress under the board
    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    sOut += "<br>";
    sOut += "Category: ";
    sOut += $_GET['puzzleID'];
    document.getElementById("board").innerHTML = sOut; 

    return sOut; 
}

//Function will return the latest version of the game board
function currentBoard(fnct){
    document.getElementById("board").innerHTML = fnct; 
}

//Function will spin imaginary wheel and return the result
function spinWheel(){
    var wheel = [5000, 500, 900, 700, 
                 300, 800, 550, 400, 
                 500, 600, 350, 500, 
                 900, "BANKRUPT", 650, 
                 700, 800, 500, 450,
                 500, 300, "BANKRUPT"];

     var result = wheel[Math.floor(Math.random()*wheel.length)]; //gets random result 

    if(result == "BANKRUPT"){
        alert("Sorry, you landed on BANKRUPT");
        currentBalance = 0; 
    }
    else{
        alert("You landed on " + result); 
        currentBalance += result; 

    }

    document.getElementById("bank").innerHTML = "Current Balance: " + currentBalance; 
     
}

//Function that will loop through csv file until the category selected is found and then put in in the game board
function findPuzzle(csv, choice){
    Loop1: for(var i=0; i<csv.length; i++){
        Loop2: for(var j=1; j<2; j++){
            if(choice == csv[i][j]){
                var puzzle = csv[i][0]; 
                // for(var k=0; k<puzzle.length; k++){
                //     for(var w=0; w<puzzle[k].length; w++){  //this was suppose to add the letters of the puzzle to the game board. 
                //         board[k][w] = puzzle[k];
                //     }
                // }
                console.log(board); //debugging 
                break Loop1; 
                break Loop2; 
            }
        }
    }
}