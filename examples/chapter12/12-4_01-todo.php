<?php

# if an action is specified, take it
if (isset($_REQUEST['action'])) {
   
    # set up a database connection
    include('db.php');
      
    # add new list
    if ($_REQUEST['action'] == 'addL') {

        $lname = filter_var($_REQUEST['new_list_name'], FILTER_SANITIZE_STRING);
        $ldue = filter_var($_REQUEST['new_list_due'], FILTER_SANITIZE_STRING);

        $SQL = "INSERT INTO todo_list (todo_list_name,todo_list_deadline) VALUE ";
        $SQL .= "('$lname','$ldue')";
        $dbh->query($SQL);
    
    # delete a list
    } else if ($_REQUEST['action'] == 'delL') {

        $lid = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

        $dbh->query("DELETE FROM list_item WHERE todo_list_id=$lid");
        $dbh->query("DELETE FROM todo_list WHERE todo_list_id=$lid");
    
    # get the lists
    } else if ($_REQUEST['action'] == 'loadL') {

        $SQL = "SELECT todo_list_id,todo_list_name,todo_list_deadline FROM todo_list ";
        $SQL .= "ORDER BY todo_list_deadline";
        $sth = $dbh->prepare($SQL);
        $sth->execute();

        $data = array();
        while ($tmp = $sth->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $tmp;
        }
        echo json_encode($data);
    
    # get list items for a list
    } else if ($_REQUEST['action'] == 'loadI') {

        $lid = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

        $SQL = "SELECT list_item_id,list_item_title,list_item_desc,list_item_done ";
        $SQL .= "FROM list_item WHERE todo_list_id=$lid ORDER BY list_item_id";
        $sth = $dbh->prepare($SQL);
        $sth->execute();

        $data = array();
        while ($tmp = $sth->fetch(PDO::FETCH_ASSOC)) {
            if ($tmp['list_item_done'] == '0000-00-00 00:00:00') {
                $tmp['list_item_done'] = '';
            }
            $data[] = $tmp;
        }
        echo json_encode($data);
    
    # mark and item done
    } else if ($_REQUEST['action'] == 'toggleI') {

        $iid = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

        $SQL = "SELECT list_item_done FROM list_item WHERE list_item_id=$iid";
        $sth = $dbh->prepare($SQL);
        $sth->execute();
        $data = $sth->fetch(PDO::FETCH_ASSOC);
        if ($data['list_item_done'] != '0000-00-00 00:00:00') {
            $newd = '';
        } else {
            $newd = date('Y-m-d H:i:s');
        }
        $dbh->query("UPDATE list_item SET list_item_done = '$newd' WHERE list_item_id=$iid");	
    
    # add item to a list
    } else if ($_REQUEST['action'] == 'addI') {

        $ititle = filter_var($_REQUEST['new_item_title'], FILTER_SANITIZE_STRING);
        $idesc = filter_var($_REQUEST['new_item_desc'], FILTER_SANITIZE_STRING);
        $lid = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);

        $SQL = "INSERT INTO list_item (list_item_title,list_item_desc,list_item_done,todo_list_id) VALUES ";
        $SQL .= "('$ititle','$idesc','',$lid)";
        $dbh->query($SQL);
    
    # delete item from a list
    } else if ($_REQUEST['action'] == 'delI') {

        $iid = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

        $dbh->query("DELETE FROM list_item WHERE list_item_id=$iid");

    }

}


?>