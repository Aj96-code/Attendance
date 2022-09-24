<?php
    $title = "Home";
    require_once("./includes/header.php");
    require_once("./db/conn.php");
    $result = $crud->getSpecialties();
    /*
        What is Needed for the Form[
            - First Name,
            - Last Name,
            - Date Of Birth ( Using a Date Picker ),
            - Specialty ( Database Admin, Software Developer, Web Administrator,other),
            - Email Address
            - Contact Number
        ]  
    */
?>
    <h1 class=" text-center">Registration for IT Conference</h1>
    <form action="success.php" method="post">
        <div class="row mb-3">
            <div class="col">
                <label for="firstName" class="form-label"> First Name</label>
                <input required type="text" name="firstName" class="form-control" id="firstName"/>
            </div>

            <div class="col">
                <label for="lastName" class="form-label">Last Name</label>
                <input required type="text" name="lastName" class="form-control" id="lastName"/>
            </div>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input  type="text" name="dob" class="form-control" id="dob"/>
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select id="specialty" name="specialty" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                <?php while($obj = $result->fetch(PDO::FETCH_ASSOC)){?>
                    <option value=<?php echo $obj["specialty_id"];?>>
                        <?php echo $obj["name"];?>
                    </option> 
                <?php }?>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="email" class="form-label">Email Address</label>
                <input required type="text" name="email" class="form-control" id="email" aria-describedby="emailWarning"/>
                <div id="emailWarning" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>
            <div class="col">
                <label for="contactNumber" class="form-label">Contact Number</label>
                <input type="text" name="contactNumber" class="form-control" id="contactNumber" aria-describedby="contactNumberWarning"/>
                <div id="contactNumberWarning" class="form-text">
                    We'll never share your number with anyone else.
                </div>
            </div>
        </div>
        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-primary btn-lg fw-semibold">Submit</button>
        </div>
    </form>
<?php
    require_once("./includes/footer.php");
?>

