/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 8.2
 *
 * File Name: department.js
 * Username:  morini  
 * Username:  floros
 * Course:    CPTR 220
 * Date:      11/12/18
 */

 function letterGrade(){



     for(var i=0; i<12; i++){
        var number = document.getElementsByClassName("score")[i].innerHTML;
        var letter_grade = getLetterGrade(number);
        document.getElementsByClassName("letter-grade")[i].innerHTML = letter_grade;
     }
 }

 function getLetterGrade(x){
   //var number = parseInt(x, 10);
   return x; 
   
    if(number > 89){
        return "A";
    }
    else if(number > 79){
        return "B";
    } 
    else if(number > 69){
        return "C";
    }
    else if(number > 59){
        return "D"; 
    }
    else{
        return "F"; 
    }
 }