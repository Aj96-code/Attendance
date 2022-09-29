<?php
    $title = "Success";
    require_once("./includes/header.php");
    require_once("./db/conn.php");
 //   require_once("sendemail.php");
    
    if(isset($_POST["submit"]))
    {
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

        $isSuccess = $crud->insertAttendees(
            $firstName, $lastName,$dob,$email,
            $contactNumber,$specialty, $destination
        ); 

        if($isSuccess)
        {
 //            SendEmail::SendMail($email, "Welcome to IT Conference 2022",
//             "You have successfully been registered");
            $sepName =  $crud->getSpecialtyById( $_POST["specialty"]);
            require_once("./includes/successMessage.php");    
        }
        else
        {
            require_once("./includes/errorMessage.php");
        }
    }
?>
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo empty($destination) ? "./uploads/default.png" : $destination ?>" alt="avatar"
              class="rounded img-fluid" style="width: 35%;">
            <h5 class="my-3"><?php echo "$firstName $lastName"?></h5>
            <p class="text-muted mb-1"><?php echo $sepName["name"]?></p>
            <p class="text-muted mb-4">
                <?php  echo "<strong>Email</strong>: $email, <strong>Phone Number</strong>: $contactNumber"?>
            </p>
          </div>
        </div>
<?php require_once("./includes/footer.php")?>
