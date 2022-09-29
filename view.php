<?php
    $title = "View Attendee Record";
    require_once("./includes/header.php");
    require_once("./db/conn.php");
    require_once("./includes/auth_check.php");
    if(!isset($_GET["id"]))
    {
        echo "<h1 class='text-danger'> Please Check details
        and try again</h1>";
    }
    else
    {
        $id = $_GET["id"];
        $result = $crud->getAttendeeDetails($id);
?>
  
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo empty($result["avatar_path"]) ?"./uploads/default.png": $result["avatar_path"] ?>" alt="avatar"
              class="rounded img-fluid" style="width: 35%;">
            <h5 class="my-3"><?php echo  $result["first_name"] . "" .$result["last_name"]?></h5>
            <p class="text-muted mb-1"><?php echo $result["name"]?></p>
            <p class="text-muted mb-4">
                <?php  echo "<strong>Email</strong>:". $result["email_address"]
                .", <strong>Phone Number</strong>:". $result["contact_number"]."?>";
                ?>
            </p>
          </div>
        </div>
    <br/>
    <div class="d-flex justify-content-center">
        <div class="row row-cols-auto">
            <div class="col">
                <a href="viewAttendeeRecords.php"
                class=" btn btn-outline-info fw-bold fs-6">
                    Back to List View
                </a>
            </div>
            <div class="col">
                <a href=<?php echo "edit.php?id=".$result["attendee_id"] ?>
                class="btn btn-outline-warning fw-bold fs-6">
                    Edit Attendee Information
                </a>
            </div>
                <div class="col">
                <a onclick ="return confirm('Are sure you want to delete this record')" 
                    href=<?php echo "delete.php?id=".$result["attendee_id"] ?>
                class="btn btn-outline-danger fw-bold fs-6"> 
                    Delete Attendee Information
                </a>
            </div>
        </div>
    </div>
                   
                   
                   

<?php }
    require_once("./includes/footer.php"); ?>