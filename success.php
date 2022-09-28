<?php
    $title = "Success";
    require_once("./includes/header.php");
    require_once("./db/conn.php");
    require_once("sendemail.php");
    
    if(isset($_POST["submit"]))
    {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $contactNumber = $_POST["contactNumber"];
        $specialty = $_POST["specialty"];

        $isSuccess = $crud->insertAttendees(
            $firstName, $lastName,$dob,$email,
            $contactNumber,$specialty
        ); 

        if($isSuccess)
        {
             SendEmail::SendMail($email, "Welcome to IT Conference 2022",
                "You have successfully been registered");
            $sep =  $crud->getSpecialtyById( $_POST["specialty"]);
            require_once("./includes/successMessage.php");    
        }
        else
        {
            require_once("./includes/errorMessage.php");
        }
    }
?>
    <div class="card col-12">
        <div class="card-body">
            <h5 class="card-title">
                <?php
                    echo $_POST["firstName"]. " ".
                         $_POST["lastName"]; 
                ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Specialty:</strong> 
                <?php 
                    echo " ". $sep["name"];
                ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Date of Birth: </strong>
                <?php 
                    echo " ".$_POST["dob"];
                ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Email:</strong>
                <?php
                    echo " ".$_POST["email"];
                ?>

            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Contact Number:</strong>
                <?php
                    echo " ".$_POST["contactNumber"];
                ?>

            </h6>
        </div>
    </div> 
<?php require_once("./includes/footer.php")?>
