/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 8.4
 *
 * File Name: grade_book.js
 * Username:  morini    
 * Username:  floros
 * Course:    CPTR 220
 * Date:      11/14/18
 */

 array = []; 
 
 function getScore(){
     var score = document.getElementById('score').value;
     array.push(score);
    document.getElementById('scores').innerHTML = array; 
    getAverage();
 }

 function getAverage(){
    var average_value = 0;
     for (var i = 0; i < array.length; i++){
         var temp = parseInt(array[i], 10);
         console.log(temp);
         average_value += temp;
     }
     average_value /= array.length;
    document.getElementById('average').innerHTML = average_value;
    letterGrade(average_value);
 }

 function letterGrade(average){
     var letterGrade = "";
     if(average >= 90){
         letterGrade = "A"; 
     } 
     else if(average < 90 && average >= 80){
         letterGrade = "B"; 
     }
     else if(average < 80 && average >= 70){
         letterGrade = "C"; 
     }
     else if(average <70 && average >= 60){
         letterGrade = "D"; 
     }
     else{
         letterGrade = "F";
     }
     document.getElementById('letter_grade').innerHTML = letterGrade; 
 }

 //function that removes a given item from the array
    function remove_item(){
        var score = document.getElementById('score').value;
        var temp = parseInt(score, 10);

        for(var i = 0; i < array.length; i++){
            if (array[i] == temp){
                array.splice(i, 1);
            }
        }
        document.getElementById('scores').innerHTML = array;
        getAverage();
    }