<?php

if(isset($_GET['search'])) {

    $keyWord = $_GET['search'];

    header("Location: ./home.php?keyword=".$keyWord);

} else {

    $results = pg_query($dbConn, "SELECT id, title, cover FROM public.posts");

}

if(isset($_GET['keyword'])) {

    $query = $_GET['keyword'];

    $results = pg_query($dbConn, "SELECT id, title, cover FROM public.posts WHERE title LIKE '%$query%'");

} else {

$results = pg_query($dbConn, "SELECT id, title, cover FROM public.posts");

}

?>