<?php
    session_start();
    include('./includes/connect.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyWiki | Startseite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

<?php include('./components/navbar.php'); ?>

<br>

<div class="container">

<div class="jumbotron">
  <h1 class="display-4">myWiki</h1>
  <p class="lead">Willkommen auf der myWiki-Website. Hier kannst du dich mit deinen Kollegen über verschiedenste Themen austauschen.</p>
  <hr class="my-4">
  <p>Du kannst auch auf schon gelistete Ergebnisse zurückgreifen, um dir die Arbeit so entspannt wie möglich zu gestalten.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="about.php" role="button">Lerne mehr über uns</a>
  </p>
</div>
<br>
<br>
<div class="row">
<?php while ($row = pg_fetch_assoc($results)) { 
  
  $titel = $row['title'];
  $id = $row['id'];
  $cover = $row['cover']

  ?>
<div class="col-sm-6" style="width: 16rem;">
    <div class="card">
    <img src="./img/<?php echo $cover;?>" class="card-img-top img-thumbnail" alt="/img/<?php echo $cover;?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $titel; ?></h5>
        <p class="card-text">Autor des Beitrags</p>
        <a href="post.php?id=<?php echo $id; ?>" class="btn btn-primary">Zum Beitrag</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> 
  </body>
</html>
