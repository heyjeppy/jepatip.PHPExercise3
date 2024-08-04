<?php 
session_start(); 
require "dbConnection.php";

if(isset($_POST['inputName']) && isset($_POST['inputUsername']) &&isset($_POST['inputImage']) && isset($_POST['inputPassword'])) {

    $name = $_POST['inputName'];
    $userName = $_POST['inputUsername'];
    $userImage = $_POST['inputImage'];
$userPassword = $_POST['inputPassword'];
    
    if(empty($userName) && empty($userName) && empty($userPassword)) {
        echo 'empty';
    } else {
        $sql = "INSERT INTO users (name, username, password, img_url) VALUES (?, ?, ?, ?)";
        $result = $host->prepare($sql);
        $result->bind_param('ssss', $name, $userName, $userImage, $userPassword);
        $result->execute();
        $stmt=$result->fetch();
        $result->close();

        header("Location: login.php");
        exit();
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-2 mt-md-4 pb-2">

              <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
            
              <form method="POST">
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="text" id="inputName" name="inputName" class="form-control form-control-lg" placeholder="Name" required/>
                  <label class="form-label visually-hidden" for="inputName">Name</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="text" id="inputUsername" name="inputUsername" class="form-control form-control-lg" placeholder="Username" required/>
                  <label class="form-label visually-hidden" for="inputUsername">Username</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="text" id="inputImage" name="inputImage" class="form-control form-control-lg" placeholder="Image Url" required/>
                  <label class="form-label visually-hidden" for="inputImage">Image URL</label>
                </div>

                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" id="inputPassword" name="inputPassword" class="form-control form-control-lg" placeholder="Password" required/>
                  <label class="form-label visually-hidden" for="inputPassword">Password</label>
                </div>

                <button class="btn btn-outline-light btn-lg px-5 mt-3" type="submit">Login</button>
              </form>

            </div>

            <div class="pt-2">
              <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Log in</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>