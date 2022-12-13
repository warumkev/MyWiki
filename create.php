<?php
session_start();
include('./includes/connect.php');

if (!isset($_SESSION['loggedin'])) {
  header("Location: home.php");
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyWiki | Beitrag erstellen</title>
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
          <h1 class="fw-light">Beitrag erstellen</h1>
          <p class="lead text-muted">Hier kannst du neue Beiträge auf myWiki veröffentlichen.</p>
        </div>
      </div>
    </section>
    <div class="row">
      <?php if ($uploadSuccess == True) { ?>

      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Erfolgreich erstellt!</h4>
        <p>Der Beitrag wurde erfolgreich in die Datenbank übernommen und kann nun von jedermann eingesehen werden.
          Hurra!
        </p>
        <hr>
        <p>Danke für deinen Beitrag!</p>

      </div>

      <?php } else if (!empty($errors)) { {
        foreach ($errors as $error) { ?>
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Fehler beim Hochladen</h4>
        <p>
          <?php echo $error; ?>
        </p>
      </div>
      <?php }
      }
    } ?>
      <form class="row g-3" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="title" class="form-label">Titel des Beitrags</label>
          <input type="text" class="form-control" id="title" placeholder="Gib den Titel des Beitrags ein." name="title">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Inhalt des Beitrags</label> <a
            href="https://www.markdownguide.org/cheat-sheet/" target="_blank"><span class="badge bg-primary">Basic
              Markdown
              wird unterstützt</span></a>
          <textarea class="form-control" id="content" rows="3" placeholder="Gib den Inhalt des Beitrags ein."
            name="content"></textarea>
        </div>
        <div class="input-group mb-3">
          <input type="file" class="form-control" name="coverName" id="fileToUpload">
        </div>
        <div class="col-auto">
          <input type="submit" class="btn btn-primary mb-3" name="post">
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