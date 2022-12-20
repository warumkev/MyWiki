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
    <title>MyWiki | Anmelden</title>
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
                    <h1 class="fw-light">Log in</h1>
                    <p class="lead text-muted">Here at myWiki, we value your security and privacy. That's why we
                        have implemented a secure login system to protect your personal information and ensure that only
                        you have access to your account.</p>
                </div>
            </div>
        </section>
        <?php if ($loginCheck == False) { ?>

        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Please check your information!</h4>
        </div>

        <?php } else if ($loginError == True) { ?>

<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Please check your information!</h4>
</div>

<?php } ?>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <form class="col-sm-9" method="post" enctype="multipart/form-data">
                        <div class="col-9">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username"
                                placeholder="Please enter your username" name="username">
                        </div><br>
                        <div class="col-9">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="Please enter your password" name="password">
                        </div><br>
                        <div class="col-2">
                            <input type="submit" class="btn btn-warning mb-3" name="login" value="Log in">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>How to use.</h2>
                    <hr>
                    <p>We are glad you are here and want to make sure you have a seamless experience while accessing
                        your account. Whether you are a professional or a new user, logging in is quick and easy.
                        Simply enter your username and password in the fields provided and click "Log in".</p>
                    <p class="text-muted">If you are a new user and do not yet have an account with us, click the <a
                            class="link-warning" style="text-decoration: none;" href="register.php">here</a> to
                        create a new account.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
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