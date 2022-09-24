<?php 
    require_once("./db/conn.php");
    if(isset($_POST["submit"]))
    {   $id = $_POST["id"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $contactNumber = $_POST["contactNumber"];
        $specialty = $_POST["specialty"];

        $isSuccess = $crud->editAttendee(
            $id,$firstName, $lastName,$dob,$email,
            $contactNumber,$specialty
        ); 

        if($isSuccess)
        {
           header("Location: index.php");
        }
        else
        {

            require_once("./includes/errorMessage.php");
        }
    }
    else 
    {
        require_once("./includes/errorMessage.php");
    }
?>