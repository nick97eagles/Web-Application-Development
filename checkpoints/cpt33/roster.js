/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 9.2
 *
 * File Name: roster.js
 * Username:  morini    
 * Username:  owenja
 * Course:    CPTR 220
 * Date:      11/26/18
 */

window.onload = background; 



function background(){
 var roster = document.getElementById("roster_table");
 roster.style.backgroundColor = "lightblue";
 roster.style.position = "relative";
 roster.style.width = "25%";
 roster.style.left = "38%";

 document.getElementById("submit").onclick = textSize; 

}

function textSize(){
 var table = document.getElementById("roster_table");
 var txtSize = document.getElementById("size").value; 

 table.style.fontSize = txtSize + "px";
}