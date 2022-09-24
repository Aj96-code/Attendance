<?php
    $title = "Edit Attendee";
    require_once("./includes/header.php");
    require_once("./db/conn.php");
    $specialties = $crud->getSpecialties();
    if(!isset($_GET["id"]))
    {
        require_once("./includes/errorMessage.php");
        header("Location: viewAttendeeRecords");
    }
    else
    {
        $id = $_GET["id"];
        $attendeeInformation = $crud->getAttendeeDetails($id);
 ?>
<h1 class="text-center">Edit Attendee Information</h1>
<form action="editPost.php" method="post">
    <input type = "hidden" name="id" value="<?php echo $attendeeInformation["attendee_id"]; ?>"/>
        <div class="row mb-3">
            <div class="col">
                <label for="firstName" class="form-label"> First Name</label>
                <input type="text" name="firstName" 
                    class="form-control" id="firstName" value="<?php echo $attendeeInformation["first_name"]; ?>"/>
            </div>

            <div class="col">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" 
                    class="form-control" id="lastName" value="<?php echo $attendeeInformation["last_name"];?>"/>
            </div>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input type="text" name="dob" 
                class="form-control" id="dob" value="<?php echo $attendeeInformation["date_of_birth"]; ?>"/>
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>

            <select id="specialty" name="specialty" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                <?php while($obj = $specialties->fetch(PDO::FETCH_ASSOC)){?>
                    <?php if($obj["name"] == $attendeeInformation["name"]){ ?>
                        <option value=<?php echo $obj["specialty_id"];?> selected>
                            <?php echo $obj["name"];?>
                        </option>

                    <?php continue; }?>
                        <option value=<?php echo $obj["specialty_id"];?>>
                            <?php echo $obj["name"];?>
                        </option> 
                <?php }?>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" name="email" 
                    class="form-control" id="email"
                     aria-describedby="emailWarning" value="<?php echo $attendeeInformation["email_address"];?>"/>
                <div id="emailWarning" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>
            <div class="col">
                <label for="contactNumber" class="form-label">Contact Number</label>
                <input type="text" name="contactNumber" 
                    class="form-control" id="contactNumber" 
                    aria-describedby="contactNumberWarning" value="<?php echo $attendeeInformation["contact_number"]; ?>"/>
                <div id="contactNumberWarning" class="form-text">
                    We'll never share your number with anyone else.
                </div>
            </div>
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-success btn-lg fw-semibold">Save Changes</button>
        </div>
    </form>
    <br/>
    <a href="viewAttendeeRecords.php"
    class=" btn btn-outline-info fw-semibold ">
        Back to List View
    </a>
            
<?php }require_once("./includes/footer.php"); ?>