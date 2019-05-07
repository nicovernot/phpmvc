<?php
 //var_dump($_SERVER["REQUEST_METHOD"]);
if ($_SERVER["REQUEST_METHOD"] == "GET") {

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'list') {
        //var_dump($_GET['action']);
       include "controller/list.php";
    }
    elseif ($_GET['action'] == 'edit') {
        include "controller/edit.php";
    }
    elseif ($_GET['action'] == 'delete') {
        include "controller/delette.php";
    }
    elseif ($_GET['action'] == 'new') {
        include "controller/new.php";
    }
}
else {
   require "template/IndexView.php";
}
}