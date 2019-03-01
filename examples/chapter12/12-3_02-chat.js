// the global variable for the logged in user
var sender = '';


// function to send message via ajax to the server
function sendMessage() {
    var msg = document.getElementById('msg').value;
    if (msg != "") {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) { getMessages(); }
        }

        xhr.open("GET", "12-3_02-chat.php?msg=" + msg + "&sender=" + sender);
        xhr.send(null);
        document.getElementById('msg').value = "";
    }
}


// function to get the chat messages from the server
function getMessages() {

    var xhr = new XMLHttpRequest();
    var ctl = document.getElementById('dsp');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseXML;
            var msgs = result.getElementsByTagName("message");
            ctl.innerHTML = '';
            for (var i = 0; i < msgs.length; i++) {
                var msgTxt = msgs[i].firstChild.nodeValue;
                var msgSnd = msgs[i].getAttribute('sender');
                ctl.innerHTML += "<div>" + msgSnd + ": " + msgTxt + "</div>";
            }
        }
    }

    xhr.open("GET", "12-3_02-chat.php");
    xhr.send(null);

}


// set a timer to get messages after a set amount of time
function delayGetMessages() {
    getMessages();
    setTimeout("delayGetMessages()", 2000);
}


window.onload = function() {
    sender = prompt('Enter your name');
    document.getElementById('sender').innerHTML = sender;
    document.getElementById('send').onclick = sendMessage;
    delayGetMessages();
}