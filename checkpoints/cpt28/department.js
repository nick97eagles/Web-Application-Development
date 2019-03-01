/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 8.2
 *
 * File Name: department.js
 * Username:  morini 
 * Username:  bierca
 * Course:    CPTR 220
 * Date:      11/9/18
 */
// half was done on my machine half was done on Cameron's 

function getGradeAverage(){
    var hw1_score = +(document.getElementById("hw1-score").value);
    var hw2_score = +(document.getElementById("hw2-score").value);
    var hw3_score = +(document.getElementById("hw3-score").value);
    var hw1_total = +(document.getElementById("hw1-total").value);
    var hw2_total = +(document.getElementById("hw2-total").value);
    var hw3_total = +(document.getElementById("hw3-total").value);

    var total_score =  hw1_score + hw2_score + hw3_score;
    var whole_total = hw1_total + hw2_total + hw3_total;

    document.getElementById("hw-score").innerHTML = total_score; 
    document.getElementById("hw-total").innerHTML = whole_total; 
    document.getElementById("hw-average").innerHTML = ((total_score / whole_total) * 100 + "%"); 
}

function get_username(){
    var first = document.getElementById("first-name").value;
    var last = document.getElementById("last-name").value; 

    var splice1 = last.substring(0,4).toLowerCase(); 
    var splice2 = first.substring(0,1).toLowerCase();

    document.getElementById("cs_lab_account").innerHTML = splice1 + splice2;

}