<?php
session_start();
include('./includes/connect.php');

if (isset($_SESSION['loggedin'])) {
  header("Location: home.php");
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWiki | Registrieren</title>
  <link rel="icon" type="image/x-icon" href="assets/brand/wikiLogo.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <?php include('./components/navbar.php'); ?>

  <br>

  <div class="container">
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <img src="./assets/brand/wikiLogo.svg" class="rounded mx-auto d-block" height="100px"><br>
          <h1 class="fw-light">Sign up</h1>
          <p class="lead text-muted">Creating an account allows you to access all of our services and features,
            including the ability to create and edit entries.</p>
        </div>
      </div>
    </section>
    <?php if ($registerSuccess == False) { ?>

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Please fill out the form!</h4>
    </div>

    <?php } else if ($passwordMatch == False) { ?>

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">The passwords do not match!</h4>
    </div>

    <?php } else if ($usernameMatch == True) { ?>

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">This username is already taken!</h4>
    </div>

    <?php } else if ($success == True) {

      sleep(3);
      header("Location: home.php");

    } ?>
    <form class="row g-3" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Choose a username" name="username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Please tell us your email" name="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Choose a password" name="password">
      </div>
      <div class="mb-3">
        <label for="passwordCheck" class="form-label">Confirm password</label>
        <input type="password" class="form-control" id="passwordCheck" placeholder="Please confirm your password"
          name="passwordCheck">
      </div>
      <!-- <div class="input-group mb-3"> -->
      <!-- <input type="file" name="coverName" id="fileToUpload"> -->
      <!-- </div> -->
      <div class="col-auto">
        <input type="submit" class="btn btn-outline-warning mb-3" name="register" value="Create my account">
      </div>
    </form>
    <div class="text-muted">
      <p>We take the protection of your personal information seriously, and use industry-standard encryption to keep your data safe. If you have any questions or concerns about the security of your account, please don't hesitate to contact us.</p>
    </div>

    <?php include('./components/footer.php'); ?>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
    crossorigin="anonymous"></script>
</body>

</html>