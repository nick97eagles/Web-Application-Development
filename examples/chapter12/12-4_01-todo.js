// open the popup for adding lists
function showAddList() {
    document.getElementById('new_list').style['display'] = 'block';
}


// close the popup for adding lists
function closeAddList() {

    // close the list popup
    document.getElementById('new_list').style['display'] = 'none';

    // reset the inputs
    document.getElementById('new_list_name').value = '';
    document.getElementById('new_list_due').value = '';

}


// actually add the list to the database
function doAddList() {

    // create an xhr object
    var xhr = new XMLHttpRequest();

    // create event handler
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) { loadLists(); }
    }

    // send the add list request
    xhr.open("GET", "12-4_01-todo.php?action=addL&new_list_name=" +
        document.getElementById('new_list_name').value + '&new_list_due=' +
        document.getElementById('new_list_due').value);
    xhr.send(null);

    // close the list box
    closeAddList();

}


// load the list of lists and put it in the select box
function loadLists() {

    // create a new xhr object
    var xhr = new XMLHttpRequest();

    // event handler
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var lst = document.getElementById('lists');
            while (lst.options.length > 0) {
                lst.removeChild(lst.options[0]);
            }
            var results = JSON.parse(xhr.responseText);
            for (var i = 0; i < results.length; i++) {
                var opt = document.createElement('option');
                opt.value = results[i].todo_list_id;
                opt.appendChild(document.createTextNode(results[i].todo_list_name));
                lst.appendChild(opt);
            }
        }
    }

    // send the request
    xhr.open("GET", "12-4_01-todo.php?action=loadL");
    xhr.send(null);

}


// delete a list
function delList() {

    // which list is selected?
    var which = document.getElementById('lists').selectedIndex;

    // if one is selected, delete it
    if (which >= 0) {

        xhr = new XMLHttpRequest();

        // define event handler
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) { loadLists(); }
        }

        // make the request
        xhr.open("GET", "12-4_01-todo.php?action=delL&id=" + document.getElementById('lists').options[which].value);
        xhr.send(null);

        // otherwise error message
    } else {

        alert('Please first select a list to delete.');

    }

}


// load list items into manage items area
function loadItems() {

    // which item is selected
    var which = document.getElementById('lists').selectedIndex;

    // if an item is selected
    if (which >= 0) {

        // put the list name on the page
        var opt = document.getElementById('lists').options[which];
        document.getElementById('list_name').innerHTML = opt.text;

        // load the list items
        xhr = new XMLHttpRequest();

        // handle the retured data
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var ul = document.getElementById('list_items');
                while (ul.children.length > 0) {
                    ul.removeChild(ul.children[0]);
                }
                var results = JSON.parse(xhr.responseText);
                for (var i = 0; i < results.length; i++) {
                    var li = document.createElement('li');
                    li.setAttribute('id', results[i].list_item_id);
                    li.addEventListener("dblclick", toggleDone);
                    li.innerHTML = '<span id="d' + results[i].list_item_id + '">' +
                        results[i].list_item_title + '</span><div class="item_desc">' +
                        results[i].list_item_desc + '</div>';
                    if (results[i].list_item_done != '' && results[i].list_item_done != null) {
                        li.style['text-decoration'] = 'line-through';
                    }
                    ul.appendChild(li);
                }
            }
        }

        // send the request
        xhr.open("GET", "12-4_01-todo.php?action=loadI&id=" + opt.value);
        xhr.send(null);

        // no item is selected
    } else {

        document.getElementById('list_name').innerHTML = 'None';

    }

}


// show the add item box
function showAddItem() {
    document.getElementById('new_item').style['display'] = 'block';
}


// close the popup for adding items
function closeAddItem() {

    // close the list popup
    document.getElementById('new_item').style['display'] = 'none';

    // reset the inputs
    document.getElementById('new_item_title').value = '';
    document.getElementById('new_item_desc').value = '';

}


// actually add the item to the database
function doAddItem() {

    // create an xhr object
    var xhr = new XMLHttpRequest();

    // create event handler
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) { loadItems(); }
    }

    // send the add list request
    xhr.open("GET", "12-4_01-todo.php?action=addI&new_item_title=" +
        document.getElementById('new_item_title').value + '&new_item_desc=' +
        document.getElementById('new_item_desc').value + '&id=' +
        document.getElementById("lists").options[document.getElementById('lists').selectedIndex].value);
    xhr.send(null);

    // close the list box
    closeAddItem();

}


// start the deletion of an item
var delItem = false;

function startDelItem() {
    var ul = document.getElementById('list_items');
    if (delItem) {
        delItem = false;
        this.style['color'] = 'black';
        for (var i = 0; i < ul.children.length; i++) {
            ul.children[i].removeEventListener('click', endDelItem);
        }
    } else {
        delItem = true;
        this.style['color'] = 'red';
        for (var i = 0; i < ul.children.length; i++) {
            ul.children[i].addEventListener('click', endDelItem);
        }
    }
}


// finish the item removal
function endDelItem() {

    ctl = document.getElementById("d" + this.id);

    if (confirm("Do you really wish to delete " + ctl.innerHTML + "?")) {
        xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) { loadItems(); }
        }

        xhr.open("GET", "12-4_01-todo.php?action=delI&id=" + this.id);
        xhr.send(null);

    }

    document.getElementById('del_item').click();

}


// toggle whether an event is done
function toggleDone() {

    if (this.style['text-decoration'] == 'line-through') {
        this.style['text-decoration'] = 'none';
    } else {
        this.style['text-decoration'] = 'line-through';
    }

    xhr = new XMLHttpRequest();
    xhr.open("GET", "12-4_01-todo.php?action=toggleI&id=" + this.id);
    xhr.send(null);

}


// hook up event handlers and initilize
window.onload = function() {

    document.getElementById('add_list').onclick = showAddList;
    document.getElementById('del_list').onclick = delList;

    document.getElementById('new_list_cancel').onclick = closeAddList;
    document.getElementById('new_list_add').onclick = doAddList;

    document.getElementById('lists').onchange = loadItems;

    document.getElementById('add_item').onclick = showAddItem;
    document.getElementById('del_item').onclick = startDelItem;

    document.getElementById('new_item_cancel').onclick = closeAddItem;
    document.getElementById('new_item_add').onclick = doAddItem;

    loadLists();
}