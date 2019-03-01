/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 8.1
 *
 * File Name: quote.js
 * Username:  morini   
 * Username:  bierca
 * Course:    CPTR 220
 * Date:      11/6/18
 */

 function sayMagicWord(){
     quote = "Please!";
    alert("Please!");
 }

 function famousQuote(n = 0){
     switch (n) {
         case 0:
            alert("\"Computers themselves, and software yet to be developed, will revolutionize the way we learn.\" \n-Steve Jobs");
            quote = "\"Computers themselves, and software yet to be developed, will revolutionize the way we learn.\" \n-Steve Jobs";
            break;
        case 1:
            alert("\"Never trust a computer you can't throw out a window.\" \n-Steve Wozniak");
            quote = "\"Never trust a computer you can't throw out a window.\" \n-Steve Wozniak";
            break;

     }
 }

 function favoriteQuote(n = 0){
    
    switch (n) {
        case 0:
        document.getElementById("favorite").innerHTML = "\"Computers themselves, and software yet to be developed, will revolutionize the way we learn.\" <br>-Steve Jobs";
           break;
       case 1:
       document.getElementById("favorite").innerHTML = "\"Never trust a computer you can't throw out a window.\" <br>-Steve Wozniak";
           break;

    }
 }

 function previousQuotes(n){
    var addItem = document.getElementById("previous");
    addItem.innerHTML = addItem.innerHTML + "<li>" + quote + "</li>"; 
 }

