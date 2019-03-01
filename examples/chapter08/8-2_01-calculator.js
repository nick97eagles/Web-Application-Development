var reg = '';
var op = '';
var shouldReplace = false;

function numPressed(num) {
    var calcInput = document.getElementById("calcInput");
    if (shouldReplace || calcInput.value == '0') {
        calcInput.value = num;
        shouldReplace = false;
    } else {
        calcInput.value = calcInput.value + num;
    }
}

function clearInput() {
    var calcInput = document.getElementById("calcInput");
    calcInput.value = '0';
}

function decPressed() {
    var calcInput = document.getElementById("calcInput");
    if (calcInput.value.indexOf(".") == -1) {
        calcInput.value = calcInput.value + '.';
    }
}

function changeSign() {
    var calcInput = document.getElementById("calcInput");
    if (calcInput.value != '0') {
        if (calcInput.value.indexOf("-") == -1) {
            calcInput.value = '-' + calcInput.value;
        } else {
            calcInput.value = calcInput.value.slice(1, calcInput.value.length);
        }
    }
}

function oneOver() {
    var calcInput = document.getElementById("calcInput");
    if (calcInput.value != '0') {
        calcInput.value = 1 / calcInput.value;
    }
}

function squareMe() {
    var calcInput = document.getElementById("calcInput");
    calcInput.value = Math.pow(calcInput.value, 2);
}

function squareRoot() {
    var calcInput = document.getElementById("calcInput");
    if (calcInput.value.indexOf("-") == -1) {
        calcInput.value = Math.pow(calcInput.value, 0.5);
    } else {
        calcInput.value = NaN;
    }
}

function opPressed(MyOp) {
    var calcInput = document.getElementById("calcInput");
    op = MyOp;
    shouldReplace = true;
    reg = calcInput.value;
}

function eqPressed() {
    var calcInput = document.getElementById("calcInput");
    if (op) {
        calcInput.value = eval(reg + op + calcInput.value);
        op = '';
        reg = '';
    }
}