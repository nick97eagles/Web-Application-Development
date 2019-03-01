<?php

# read csv file
$csv = array_map('str_getcsv', file("8-4_02-todo_list.csv"));
foreach ($csv as $entry) {
    $lists[$entry[0]][] = $entry[1];
}

# header with correct type
Header('Content-Type: text/javascript');

?>
// this is the array of todo lists
var lists = new Array();

// create javascript object for each list
<?php

foreach ($lists as $name => $vals) {
?>
lists.push({
    listName: "<?= $name ?>",
    listItems: ["<?= join('","', $vals) ?>"]
});
<?php 
}
?>

// this function populates the select list from the array
//  created from our csv file.

function populateSelect()
{
    var selectList = document . getElementById('thelist');

    // add a label option to the list
    var option = document . createElement('option');
    option . value = '';
    option . text = '-- Select a Todo List --';
    selectList . add(option);

    // add our todo list options
    for (i = 0; i < lists . length; i ++) {
        var option = document . createElement('option');
        option . value = i;
        option . text = lists[i] . listName;
        selectList . add(option);
    }

    // link up other event handlers
    selectList . onchange = loadList;
    document . getElementById('add') . onclick = addItem;

}
window . onload = populateSelect;


// this function loads the todo items from the array of 
//   todo lists into the input boxes.

function loadList()
{
    var selectList = document . getElementById('thelist');
    for (i = 1; i < 11; i ++) {
        document . getElementById('LI' + i) . value = '';
    }
    if (selectList . selectedIndex > 0) {
        var whichList = selectList . options[selectList . selectedIndex] . value;
        for (i = 1; i <= lists[whichList] . listItems . length; i ++) {
            document . getElementById('LI' + i) . value = lists[whichList] . listItems[i - 1];
        }
    }
}


// this function adds an item to the end of the array
//  of todo list items for the selected list.

function addItem()
{
    var selectList = document . getElementById('thelist');
    if (selectList . selectedIndex > 0) {
        var whichList = selectList . options[selectList . selectedIndex] . value;
        if (lists[whichList] . listItems . length < 10) {
            var toadd = document . getElementById('toadd');
            lists[whichList] . listItems . push(toadd . value);
            toadd . value = '';
            loadList();
        } else {
            alert('This list is full');
        }
    } else {
        alert('Please select a list before adding an item');
    }
}
