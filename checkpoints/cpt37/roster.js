/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 12.1
 *
 * File Name: roster.js
 * Username:  morini    
 * Username:  warrwa
 * Course:    CPTR 220
 * Date:      12/3/18
 */

window.onload = function(){
    document.getElementById("load_roster_csv").onclick = loadCsv;
    document.getElementById("load_roster_table").onclick = tableCSV;
};

function loadCsv(){
    var ajax = new XMLHttpRequest(); 
    ajax.open("GET", "roster_pink.csv", false);
    ajax.send(null);
    var dataCSV = "<pre>" + ajax.responseText + "</pre>";
    document.getElementById("roster_csv").innerHTML = dataCSV; 
    
}

function tableCSV(){
    var ajax = new XMLHttpRequest(); 
    ajax.open("GET", "roster_table.php", false);
    ajax.send(null);     
    document.getElementById("roster_table").innerHTML = ajax.responseText;  
}