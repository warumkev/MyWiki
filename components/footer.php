<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
  <div class="col mb-3">
    <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
      <p> <a class="bi me-2" href="home.php"><img src="./assets/brand/wikiLogo.svg" width="30" height="30"
            class="d-inline-block align-top" alt=""></p>
    </a>
    <p class="text-muted">© 2022</p>
  </div>

  <div class="col mb-3">

  </div>

  <div class="col mb-3">
    <h5>Links</h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2"><a href="home.php" class="nav-link p-0 text-muted">Startseite</a></li>
      <li class="nav-item mb-2"><a href="about.php" class="nav-link p-0 text-muted">Über uns</a></li>
      <li class="nav-item mb-2"><a href="home.php" class="nav-link p-0 text-muted">Beiträge</a></li>
      <li class="nav-item mb-2"><a href="faq.php" class="nav-link p-0 text-muted">FAQs</a></li>
      <li class="nav-item mb-2"><a href="https://github.com/kev9euf3rois/Wiki/" target="_blank"
          class="nav-link p-0 text-muted">GitHub</a></li>
    </ul>
  </div>

  <?php

// Beliebtesten Beitrag heraussuchen


$favoritePost = pg_query($dbConn, "SELECT * FROM public.posts WHERE views = (SELECT MAX(views) FROM public.posts)");

$favoritePostInfo = pg_fetch_assoc($favoritePost);

?>

  <div class="col mb-3">
    <h5>Beliebtester Beitrag</h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2"><a href="post.php?id=<?php echo $favoritePostInfo['id']; ?>" class="nav-link p-0 text-muted">
          <?php echo $favoritePostInfo['title']; ?>
        </a><span class="badge badge-warning">Warning</span></li>
    </ul>
  </div>

  <div class="col mb-3">
    <h5>Information</h5>
    <ul class="nav flex-column">
      <li class="nav-item mb-2"><a href="faq.php" class="nav-link p-0 text-muted">FAQs</a></li>
      <li class="nav-item mb-2"><a href="impressum.php" class="nav-link p-0 text-muted">Impressum</a></li>
    </ul>
  </div>
</footer>

<script type="module" src="https://md-block.verou.me/md-block.js"></script>