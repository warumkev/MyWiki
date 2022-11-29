<?php
session_start();
include('./includes/connect.php');

if (!isset($_SESSION['loggedin'])) {
    header("Location: home.php");
}

$userID = $_SESSION['userid'];

$accountInfo = pg_fetch_assoc(pg_query($dbConn, "SELECT * FROM public.users WHERE id = $userID"));


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyWiki | Accountdaten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php include('./components/navbar.php'); ?>

    <br>

    <div class="container">

        <div class="jumbotron">
            <h1 class="display-4">Accountdaten</h1>
            <p class="lead">Hier findest du deine gespeicherten Accountdaten bei myWiki.</p>
            <hr class="my-4">
        </div>
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2>Klicke auf den Knopf, um dich von myWiki abzumelden.</h2>
                    <p></p>
                    <a href="logout.php"><button class="btn btn-outline-light" type="button">Abmelden</button></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Information</h2>
                    <p>Wir arbeiten stets daran, die Benutzeroberfläche so einfach und verständlich wie möglich zu
                        halten. Dennoch kommt es immer wieder zu Fragen. Die wichtigsten Antworten findest du
                        aufgelistet in unserem <a href="faq.php">FAQ.</a></p>
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Wie lautet meine Email-Adresse?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Deine Email-Adresse lautet <strong><?php echo $accountInfo['email']?></strong>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Wie lautet mein Nutzername
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Dein Nutzername lautet <strong><?php echo $accountInfo['username']?></strong>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Ich möchte mein Passwort ändern.
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>Passwort zurücksetzen</strong>
                    </div>
                </div>
            </div>
        </div>

        <?php include('./components/footer.php'); ?>

        <div>
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