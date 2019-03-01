// Insert Student's names into html form 
window.onload = function(){
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "gradebook.php?load=yes", false);
    ajax.send(null);

    // changes the string to an array 
    var students = ajax.responseText;
    students = students.split(', ');
    students.pop(); 

    // places student's names into the option tag
    for(var i=0; i<students.length; i++){
        var create_option = document.createElement('OPTION');
        var option_txt = document.createTextNode(students[i]);
        create_option.appendChild(option_txt);
        document.getElementById("show_students").appendChild(create_option);
    }
    
    document.getElementById('button').onclick = showGrades; 
}

// gets grade for selected student
function showGrades(){
    var student = document.getElementById('show_students').value; 
    var ajax = new XMLHttpRequest(); 
    ajax.open("GET", "gradebook.php?load=no&student=" + student, false);
    ajax.send(null);

    // creates a 2d array of grades
    var grades = ajax.responseText;
    grades = grades.split(', ');
    grades.pop();

    var table = "<table style=\"margin: 0 auto;border: 2px dotted black\">\n";
    for(var i=0; i<grades.length; i++){
        var space = grades[i].split(' ');
        table += "<tr>\n";
        table += "<td>" + space[0] + "</td>\n";
        table += "<td>" + space[1] + "</td>\n";
        table += "</tr>\n";
    }
    document.getElementById('show_grades').innerHTML = table; 
}








