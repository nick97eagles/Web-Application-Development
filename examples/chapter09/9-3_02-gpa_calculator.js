// global variables for number of rows in two entry tables and transition

var clsRows = 1;
var cumRows = 1;
var transitioning = false;
var repeatWhich = null;


// function to add a row to the classes list
function addTo_cls() {

    // add one to number of rows
    clsRows++;

    // define variables for new row
    var clsRowsDiv = document.getElementById("clsRows");
    var className = "clsClass" + clsRows;
    var credName = "clsCredits" + clsRows;
    var gpaName = "clsGPA" + clsRows;
    var rptName = "clsRepeat" + clsRows;
    var rptGrade = "clsRepeatGrade" + clsRows;

    // create the new row
    var row = document.createElement('div');
    row.className = "clsRow toHide";
    row.innerHTML =
        "<div><input id=\"" + className + "\" name=\"" + className + "\" size=\"15\" /></div>" +
        "<div><input id=\"" + credName + "\" name=\"" + credName + "\" size=\"5\" onchange=\"recalc()\"/></div>" +
        "<div><select id=\"" + gpaName + "\" name=\"" + gpaName + "\" onchange=\"recalc()\"><option  value=\"\">-</option><option value=\"4\">A</option><option  value=\"3.7\">A-</option><option value=\"3.3\">B+</option><option  value=\"3\">B</option><option value=\"2.7\">B-</option><option  value=\"2.3\">C+</option><optionvalue=\"2\">C</option><option  value=\"1.7\">C-</option><option value=\"1.3\">D+</option><option  value=\"1\">D</option><option value=\"0.7\">D-</option><option  value=\"0\">F</option><option value=\"-\">S/NC</option></select></div>" +
        "<div><input type=\"checkbox\" id=\"" + rptName + "\" onclick=\"showRepeat(" + clsRows + ")\"\>" +
        "<input type=\"text\" id=\"" + rptGrade + "\" class=\"clsRep\" value=\"\" size=\"4\" disabled/> </div>";

    // add the row
    clsRowsDiv.appendChild(row);

    // transition to showing the new row
    transitioning = true;
    setTimeout(function() { showRow(row, 'clsRow'); }, 10);
}


// function to add a row to the cumulative list    
function addTo_cum() {

    // add one more row
    cumRows++;

    // define variables for new row
    var cumRowsDiv = document.getElementById("cumRows");
    var credName = "cumCredits" + cumRows;
    var gpaName = "cumGPA" + cumRows;
    var typeName = "cumType" + cumRows;

    // define new row
    var row = document.createElement('div');
    row.className = "cumRow toHide";
    row.innerHTML =
        "<div><input id=\"" + credName + "\" name=\"" + credName + "\" size=\"5\" onchange=\"recalc()\"/></div>" +
        "<div><input id=\"" + gpaName + "\" name=\"" + gpaName + "\" size=\"5\" onchange=\"recalc()\"/></div>" +
        "<div><select id=\"" + typeName + "\" name=\"" + typeName + "\" onchange=\"recalc()\"><option  value=\"q\">Quarter</option><option value=\"s\">Semester</option></select></div>";

    // add it 
    cumRowsDiv.appendChild(row);

    // transition to showing it
    transitioning = true;
    setTimeout(function() { showRow(row, 'cumRow'); }, 10);
}


// function to initiate transition and show a row
function showRow(row, type) {
    row.className = type + " toShow";
    transitioning = false;
}


// function to delete a row from the class list
function delFrom_cls() {
    if (clsRows > 1 && transitioning == false) {

        // reduce number of rows
        clsRows--;
        var clsRowsObj = document.getElementById("clsRows");
        while (clsRowsObj.lastChild.nodeName !== "DIV") {
            clsRowsObj.removeChild(clsRowsObj.lastChild);
        }

        // set classes
        clsRowsObj.lastChild.className = "clsRow toHide";

        // and set up transition		  
        transitioning = true;
        setTimeout(function() { delRow(clsRowsObj); }, 500);

    }
}


// function to delete a row from the cumulative gpa list
function delFrom_cum() {
    if (cumRows > 1 && transitioning == false) {

        // delete the row
        cumRows--;
        var cumRowsObj = document.getElementById("cumRows");
        cumRowsObj.lastChild.className = "cumRow toHide";

        // perform transition
        transitioning = true;
        setTimeout(function() { delRow(cumRowsObj); }, 500);

    }
}


// function to perform deletion transition
function delRow(row) {
    row.removeChild(row.lastChild);
    transitioning = false;
    recalc();
}


// This is the function that does all of the work!
function recalc(toReturn) {

    // set default to false
    toReturn = typeof toReturn !== 'undefined' ? toReturn : false;

    // zero out our variables
    var credits = 0;
    var honorPts = 0;
    var termCredits = 0;
    var termHonorPts = 0;

    // start with invalid assumption and define multiple
    var mult = 0;
    var cumValid = false;
    var clsValid = false;

    // recompute cumulative GPA
    var i = 1;
    while (document.getElementById("cumCredits" + i)) {
        var tmpCred = document.getElementById("cumCredits" + i);
        var tmpGPA = document.getElementById("cumGPA" + i);
        var tmpType = document.getElementById("cumType" + i);

        if (tmpCred.value > 0 && tmpGPA.value > 0 && tmpGPA.value <= 4) {
            cumValid = true;
            if (tmpType.options[tmpType.selectedIndex].value === 's') { mult = 1.5; } else { mult = 1; }
            credits += parseFloat(tmpCred.value * mult);
            honorPts += parseFloat(tmpCred.value * mult * tmpGPA.value);
        }

        if (tmpCred.value !== "" && isNaN(parseFloat(tmpCred.value))) {
            tmpCred.className = "error";
        } else {
            tmpCred.className = "noerror";
        }

        if (tmpGPA.value !== "" && (isNaN(parseFloat(tmpGPA.value)) || tmpGPA.value > 4)) {
            tmpGPA.className = "error";
        } else {
            tmpGPA.className = "noerror";
        }

        i++;
    }

    // cumCredits is saved for error checking in repeated courses (we can't repeat more credits that we've taken)
    var cumCredits = credits;

    // add in classes
    var i = 1;

    while (document.getElementById("clsCredits" + i)) {

        var tmpCred = document.getElementById("clsCredits" + i);
        var tmpGPA = document.getElementById("clsGPA" + i);
        var tmpRepeat = document.getElementById("clsRepeat" + i);
        var tmpRepeatGPA = document.getElementById("clsRepeatGrade" + i);
        if (tmpCred.value > 0 && tmpGPA.options[tmpGPA.selectedIndex].value !== "") {
            clsValid = true;
            termCredits += parseFloat(tmpCred.value);
            credits += parseFloat(tmpCred.value);
            termHonorPts += parseFloat(tmpCred.value * tmpGPA.options[tmpGPA.selectedIndex].value);
            honorPts += parseFloat(tmpCred.value * tmpGPA.options[tmpGPA.selectedIndex].value);

            if (tmpRepeat.checked) {
                if (cumCredits >= parseFloat(tmpCred.value)) {
                    credits -= parseFloat(tmpCred.value);
                    honorPts -= parseFloat(tmpCred.value * tmpRepeatGPA.value);
                } else {
                    tmpRepeatGPA.className = "error";
                }
            }

        }

        if (tmpCred.value !== "" && isNaN(parseFloat(tmpCred.value))) {
            tmpCred.className = "error";
        } else {
            tmpCred.className = "noerror";
        }
        i++;

    }

    // print out values
    if (!toReturn) {

        // update results
        if (cumValid) {
            var gpa = honorPts / credits;
            document.getElementById("cumRes").innerHTML = gpa.toFixed(2);
        } else {
            document.getElementById("cumRes").innerHTML = 'unknown';
        }

        if (clsValid) {
            var gpa = termHonorPts / termCredits;
            document.getElementById("clsRes").innerHTML = gpa.toFixed(2);
        } else {
            document.getElementById("clsRes").innerHTML = 'unknown';
        }

        // update chart
        showChart();

        // return values
    } else {

        if (cumValid) {
            return [credits, honorPts];
        } else {
            return false;
        }

    }
}


// function to display the repeat box
function showRepeat(which) {

    // checkboxk object
    var checkObj = document.getElementById("clsRepeat" + which);

    // checked means setting up a repeat
    if (checkObj.checked) {

        // save which one we're repeating in global
        repeatWhich = which;

        // detect position of repeat box
        var rect = checkObj.getBoundingClientRect();
        var posx = Math.ceil((rect.left + rect.right) / 2);
        var posy = Math.ceil((rect.top + rect.bottom) / 2) + document.body.scrollTop;

        // fill in name of class, if it exists
        var clsNameObj = document.getElementById("clsClass" + which);
        var clsNameSpan = document.getElementById("clsRepWhich");

        if (clsNameObj.value === "") {
            clsNameSpan.innerHTML = "this class";
        } else {
            clsNameSpan.innerHTML = clsNameObj.value;
        }

        // position and open box
        var clsRepEntry = document.getElementById("clsRepEntry");
        clsRepEntry.style.top = posy + "px";
        clsRepEntry.style.left = posx + "px";
        clsRepEntry.className = 'open';

        // unchecked means clearning a repeat    
    } else {

        // clear the repeated grade
        var gradeObj = document.getElementById("clsRepeatGrade" + which);
        gradeObj.value = null;

        // reset its class name
        gradeObj.className = "clsRep";

        // reclacluate without it
        recalc();

    }
}


// cancel or save repeated grade 
function closeRepeat(save) {

    // get reference for grade list
    var clsGradeList = document.getElementById("clsRepGrade");

    // save the grade
    if (save && clsGradeList.selectedIndex > 0) {

        // get reference for grade box
        var clsGradeBox = document.getElementById("clsRepeatGrade" + repeatWhich);
        clsGradeBox.value = parseFloat(clsGradeList.options[clsGradeList.selectedIndex].value).toFixed(2);

        // cancel the grade save
    } else {

        // uncheck the checkbox
        var checkObj = document.getElementById("clsRepeat" + repeatWhich);
        checkObj.checked = false;

    }

    // clear the global repeatWhich variable 
    repeatWhich = null;

    // close the box
    var clsRepEntry = document.getElementById("clsRepEntry");
    clsRepEntry.className = "";

    // reset the selection list to zero entry
    clsGradeList.selectedIndex = 0;

    // recalc in case something changed
    recalc();

}


// show the chart for gpa plot
function showChart() {

    // object for the target GPA
    var golGPA = document.getElementById("golGPA");

    // object for the canvas
    var cvObj = document.getElementById("canvas");

    // object for the error message
    var erObj = document.getElementById("golNoCum");

    // hide or show?
    if (parseFloat(golGPA.value) > 0) {

        // clear any error in GPA box
        golGPA.className = 'noerror';

        // get cumulative gpa
        var data = recalc(true);

        // now if we got data, we can proceed
        if (data) {

            // hide the error message
            erObj.className = 'toHide';

            // show the canvas
            cvObj.className = "toChart";
            cvObj.style.height = 400;

            // figure out starting GPA
            start = parseFloat(golGPA.value);

            // list of standard grade points and letters
            var gpList = [0.7, 1.0, 1.3, 1.7, 2.0, 2.3, 2.7, 3.0, 3.3, 3.7, 4.0];
            var ltList = ['D-', 'D', 'D+', 'C-', 'C', 'C+', 'B-', 'B', 'B+', 'A-', 'A'];

            // empty arrays for grade labels and credits needed
            var grades = [];
            var credits = [];

            // add grade letters that are above starting GPA (since it is above cumulative)
            if (start > data[1] / data[0]) {

                // set title
                var subTitle = 'Number of credits needed at each average grade to raise your GPA to ' + golGPA.value;

                // compute credits needed to raise cumulative to goal
                for (i = 0; i < gpList.length; i++) {
                    if (start < gpList[i]) {
                        grades.push(ltList[i] + ' (' + gpList[i].toFixed(1) + ')');
                        credits.push(Math.ceil((golGPA.value * data[0] - data[1]) / (gpList[i] - golGPA.value)));
                    }
                }

                // add grade letters that are below starting GPA (since it is lower than cumulative)
            } else {

                // set title
                var subTitle = 'Number of credits possible at each average grade while maintaining GPA of ' + golGPA.value;

                // compute credits possible while mainitaining cumulative at goal
                for (i = 0; i < gpList.length; i++) {
                    if (start > gpList[i]) {
                        grades.push(ltList[i] + ' (' + gpList[i].toFixed(1) + ')');
                        credits.push(Math.ceil((golGPA.value * data[0] - data[1]) / (gpList[i] - golGPA.value)));
                    }
                }

            }

            // data for line graph
            var lineChartData = {
                labels: grades,
                datasets: [{
                    label: "GPA",
                    strokeColorw: "rgba(121,109,72,0.6)",
                    pointColor: "rgba(121,109,72,1)",
                    pointStrokeColor: "#fff",
                    pointHiglightFill: "#fff",
                    pointHighlightStroke: "rgba(121,109,72,1)",
                    data: credits,
                }]
            };

            var ctx = cvObj.getContext("2d");
            window.myLine = new Chart(ctx).Line(lineChartData, {
                responsive: true,
                bezierCurve: false,
                datasetFill: false,
                xAxisLabel: 'GPA Earned',
                yAxisLabel: 'Credits Taken',
                graphTitle: 'Grades vs. Credits',
                graphSubTitle: subTitle,
                graphSubTitleFontSize: 12,
                inGraphDataShow: true,
            });

            // no cumulative GPA, show the error
        } else {

            // otherwise there is an error
            erObj.className = 'toShow';

            // remove the gpa so that user has to reenter
            golGPA.value = "";

        }

        // we are trying to hide
    } else {

        // check to see if we have error in GPA entry
        if (golGPA.value !== "") {
            golGPA.className = 'error';
        } else {
            golGPA.className = 'noerror';
        }

        // make sure the error message and canvas are hidden
        erObj.className = 'toHide';
        cvObj.className = "toHide";
        cvObj.style.height = 0;

    }
}


function getOffset(el) {
    var _x = 0;
    var _y = 0;
    while (el && !isNaN(el.offsetLeft) && !isNaN(el.offsetTop)) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
    }
    return { top: _y, left: _x };
}