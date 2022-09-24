<?php
    require_once("./db/conn.php");
    if(!isset($_GET["id"]))
    {
        require_once("./includes/errorMessage.php");
        header("Location: viewAttendeeRecords.php");
    }
    else
    {
        $id = $_GET["id"];
        if($crud->deleteAttendee($id))
        {
            header("Location: viewAttendeeRecords.php");
        }
        else
        {
            require_once("./includes/errorMessage.php");
        }
    }
?>