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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <?php include('./components/navbar.php'); ?>

  <br>

  <div class="container">

    <?php if ($registerSuccess == False) { ?>

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Bitte fülle alle Felder aus!</h4>
    </div>

    <?php } else if ($passwordMatch == False) { ?>

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Die Passwörter stimmen nicht überein</h4>
    </div>

    <?php } else if ($usernameMatch == True) { ?>

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Dieser Nutzername ist bereits vergeben!</h4>
    </div>

    <?php } else if ($success == True) {

      sleep(3);
      header("Location: home.php");

    } ?>
    <form class="row g-3" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="username" class="form-label">Nutzername</label>
        <input type="text" class="form-control" id="username" placeholder="Gib dir einen Nutzernamen" name="username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Bitte gib deine Email-Adresse an" name="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Passwort</label>
        <input type="password" class="form-control" id="password" placeholder="Wähle ein Passwort" name="password">
      </div>
      <div class="mb-3">
        <label for="passwordCheck" class="form-label">Passwort bestätigen</label>
        <input type="password" class="form-control" id="passwordCheck" placeholder="Gib dein Passwort erneut ein."
          name="passwordCheck">
      </div>
      <!-- <div class="input-group mb-3"> -->
      <!-- <input type="file" name="coverName" id="fileToUpload"> -->
      <!-- </div> -->
      <div class="col-auto">
        <input type="submit" class="btn btn-primary mb-3" name="register">
      </div>
    </form>
    <div class="d-none">
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