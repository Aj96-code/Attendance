<?php
    $title = "User Login";
    require_once("./includes/header.php");
    require_once("./db/conn.php");

    function echoError()
    {
          echo "<div class='alert alert-danger'>
           Username or Password is Incorrect</div>";
    }

?>



<section class="intro">
  <div class="mask d-flex align-items-center h-100 gradient-custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
          <div class="card">
            <div class="card-body p-5">
                <?php
                        
                        if($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            $username = strtolower(trim($_POST["username"])); 
                            $password = $_POST["password"]; 
                            $hash_password = md5($password.$username);
                            $doesUserExist = $user->getUser($username,$hash_password);
                        
                            if($doesUserExist == false)
                            {
                                echoError();          
                            }
                            else
                            {
                                $_SESSION["username"] = $username;
                                $_SESSION["userId"] = $doesUserExist["id"];
                                header("Location: viewAttendeeRecords.php");
                            }
                        }
                ?>
              <div class="row d-flex align-items-center">
                <div class="col-md-6 col-xl-7">

                  <div class="text-center pt-md-5 pb-5 my-md-5" style="padding-right: 24px;">
                    <i class="bi bi-laptop" style="color: #D6D6D6; font-size: 18rem;"></i>
                  </div>

                </div>
                <div class="col-md-6 col-xl-4 text-center">

                <h2 class="fw-bold mb-4 pb-2"><?php echo $title ?></h2>
                <form action=<?php echo htmlentities($_SERVER["PHP_SELF"]);?> method="post" >
                  <div class="form-outline mb-3">
                    <label class="form-label" for="typeUsername">Username</label>
                    <input type="text" id="typeUsername" name="username" 
                      class="form-control form-control-lg" 
                      value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $_POST["username"];?>"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="typePassword">Password</label>
                    <input type="password" id="typePassword" name="password" 
                        class="form-control form-control-lg"/>
                  </div>

                  <div class="text-center d-grid">
                    <button class="btn btn-info  fs-5 fw-bold text-light" type="submit" name="submit">Login</button>
                    <p class="small mt-3 mb-4 text-muted">Forgot <span class="fw-bold">
                    <a href="#!" class="text-muted">Password</a>?</span></p>
                    <a href="#!" class="link-info">Create your Account <i class="bi bi-arrow-right"></i></a>
                  </div>
                </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once("./includes/footer.php");?>