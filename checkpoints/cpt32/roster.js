/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 9.1
 *
 * File Name: roster.js
 * Username:  morini    
 * Username:  floros
 * Course:    CPTR 220
 * Date:      11/16/18
 */

//calls function that will display table when button is clicked
window.onload = getTable; 

function writeTable() {
    table = document.getElementById("roster_table")
    table.innerHTML = getTableHTML(roster);
}

function getTableHTML(data) {
    table_html = "<table>";
    for (var r = 0; r < data.length; r++) {
        table_html += "<tr>";
        for (var c = 0; c < data[r].length; c++) {
            table_html += "<td>";
            table_html += data[r][c];
            table_html += "</td>";
        }
        table_html += "</tr>";
    }
    table_html += "</table>";
    return table_html;
}

//grabs button by id and makes it so that onclick will run the writeTable function 
function getTable(){
var tableButton = document.getElementById("load_roster");
tableButton.onclick = writeTable; 
}

function getInfo(){
    var span = document.getElementById('output');
    span.innerHTML = document.referrer;
}

function checkpoint(){
    var span = document.getElementById('cpt');
    var url = document.URL; 
    var cpt = url.slice(34, 39);
    span.innerHTML = cpt; 
}