var which = 1;

function rotateSayings() {

    var xhr = new XMLHttpRequest();
    var one = document.getElementById("one_c");
    var two = document.getElementById("two_c");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            if (which == 1) {
                one.innerHTML = result;
                which = 2;
            } else {
                two.innerHTML = result;
                which = 1;
            }
            setTimeout("rotateSayings()", 5000);
        }
    }

    xhr.open("GET", "12-2_01-random_sayings.php");
    xhr.send(null);

}

setTimeout("rotateSayings()", 5000);