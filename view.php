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
    <div class="card col-12">
        <div class="card-body">
            <h5 class="card-title">
                <?php
                    echo $result["first_name"]. " ".
                         $result["last_name"]; 
                ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Specialty:</strong> 
                <?php 
                    echo " ".$result["name"];
                ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Date of Birth: </strong>
                <?php 
                    echo " ".$result["date_of_birth"];
                ?>
            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Email:</strong>
                <?php
                    echo " ".$result["email_address"];
                ?>

            </h6>
            <h6 class="card-subtitle mb-2 text-muted">
                <strong>Contact Number:</strong>
                <?php
                    echo " ".$result["contact_number"];
                ?>

            </h6>
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