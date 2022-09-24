<?php 
    $title = "View Attendee Records";
    require_once("./includes/header.php");
    require_once("./db/conn.php");
    $results = $crud->getAttendees();
?>

    <table class=" table table-striped table-hover">
        <thead class="bg-dark text-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Specialty</th>
                <th class="text-center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($obj = $results->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                   <td><?php echo $obj["attendee_id"]; ?></td> 
                   <td><?php echo $obj["first_name"]; ?></td> 
                   <td><?php echo $obj["last_name"]; ?></td> 
                   <td><?php echo $obj["name"]; ?></td> 
                   <td class="d-flex justify-content-center">
                        <div class="row row-cols-auto">
                            <div class="col">
                                <a href=<?php echo "view.php?id=".$obj["attendee_id"] ?>
                                class=" btn btn-primary fw-semibold ">
                                    View
                                </a>
                            </div>
                            <div class="co">
                                <a href=<?php echo "edit.php?id=".$obj["attendee_id"] ?>
                                class="btn btn-warning">
                                    Edit
                                </a>
                            </div>
                                <div class="col">
                                <a onclick ="return confirm('Are sure you want to delete this record')" 
                                    href=<?php echo "delete.php?id=".$obj["attendee_id"] ?>
                                class="btn btn-danger"> 
                                    Delete
                                </a>
                            </div>
                        </div>
                   
                   
                   </td> 
                </tr>

            <?php }?>
        </tbody>
    </table>

<?php require_once("./includes/footer.php");?>