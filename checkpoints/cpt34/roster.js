/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 9.3
 *
 * File Name: roster.js
 * Username:  morini    
 * Username:  owenja
 * Course:    CPTR 220
 * Date:      11/28/18
 */

window.onload = getDescriptions; 

 function getDescriptions(){
     var paragraphs = document.querySelectorAll("div#main p.description");
     var list = document.querySelectorAll("div#main li");
     
     for(var i=0; i<paragraphs.length; i++){
        document.getElementById("answers").appendChild(paragraphs[i]);
     }
     for(var j=0; j<list.length; j++){
         list[j].style.fontStyle = "italic";
     }
   
 }