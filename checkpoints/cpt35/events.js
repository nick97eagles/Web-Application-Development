/*************************************************************************
 *
 * In-Class Checkpoint:  Chapter 11.1
 *
 * File Name: events.js
 * Username:  morini    
 * Username:  owenja
 * Course:    CPTR 220
 * Date:      11/29/18
 */



function letters(num){
    if(num == 1){
        alert("a was clicked");
    }
    else if(num == 2){
        alert("b was clicked");
    }
    else if(num == 3){
        alert("c was clicked");
    }
}

window.onkeypress = keyboard; 

function keyboard(e){
    switch(e.key){
        case "j":
        case "k":
        case "l":
            alert(e.key);
    }
}

window.onload = function(){
    document.getElementById("letter").addEventListener("onkeypress", alertUser);
}

function alertUser(event){
    alert(event.key + "was entered");
}

