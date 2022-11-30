<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"><img src="./assets/brand/wikiLogo.svg" width="30" height="30"
        class="d-inline-block align-top" alt=""> <span class="text-warning">my</span>Wiki</a>
        
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Startseite</a>
        </li>
        <?php if (!isset($_SESSION['loggedin'])) { ?>
        <li class="nav-item">
          <a class="nav-link active" href="login.php">Anmelden</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link active" href="create.php">Beitrag erstellen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="account.php">Mein Account</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link active" href="faq.php">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="post.php?id=<?php echo $randomPost;?>">Entdecken</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2 btn btn-outline-warning" type="search" placeholder="Search" name="search" aria-label="Search">
        <input class="btn btn-outline-dark" type="submit">
      </form>
    </div>
  </div>
</nav>