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
        $origin_file = $_FILES["avatar"]["tmp_name"];
        $ext = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);
        $target_dir = "uploads/";
        $destination = $target_dir . $contactNumber. "." .$ext;
        move_uploaded_file($origin_file,$destination);

        $isSuccess = $crud->editAttendee(
            $id,$firstName, $lastName,$dob,$email,
            $contactNumber,$specialty,$destination
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