/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 11.1
 *
 * File Name: events.js
 * Username:  morini    
 * Username:  owenja
 * Course:    CPTR 220
 * Date:      11/30/18
 */

 var point = 1; 
 var X1;
 var Y1;
 var X2; 
 var Y2;


 document.addEventListener("click", printMousePos);

 function printMousePos(event){
    
    if(point == 1){
        X1 = event.clientX; 
        Y1 = event.clientY; 
        document.getElementById("mouse-point-1").textContent = "X: " + X1 + " Y: " + Y1;
        point = 2; 
    }
    else if(point == 2){
        X2 = event.clientX; 
        Y2 = event.clientY;
        document.getElementById("mouse-point-2").textContent = "X: " + X2 + " Y: " + Y2;
        point = 1; 
    }
    else{
        point = 1; 
    }
}

function get_distance(){
    point = 0; 
    var a = X1 - X2;
    var b = Y1 -Y2; 
    var square = Math.pow(a, 2) + Math.pow(b, 2);
    var c = Math.sqrt(square).toFixed(2);
    document.getElementById("distance").innerHTML = c; 
}


