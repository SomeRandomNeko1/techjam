<?php
declare(strict_types=1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech";

function db_connect(): object
{
    global $servername;
    global $username;
    global $password;
    global $dbname;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Fout bij het maken van de connection: " . $e->getMessage();
    }
}


$conn = db_connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nieuws</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <header>
        <img class="logo" src="img/1280px-NOS_logo.svg.webp" alt="logo NOS">
        <ul>
            <li><a class="product-text" href="...">Nieuws</a></li>
            <li><a class="product-text" href="...">Sprot</a></li>
            <li><a class="product-text" href="...">Live</a></li>
            <li><a class="product-text" href="...">programma's</a></li>
        </ul>
    </header>
    <main>
    <?php

        $sql = "SELECT ImageSrc, TitleSrc FROM news";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $imageID = $row['ImageSrc'];
            $titleID = $row['TitleSrc'];

            echo '<section class="big_news">';
            echo '<img class="page__content-images" src="' . $imageID . '" alt="">';
            echo '<p class="page__content-text">' . $titleID . '</p>';
            echo '</section>';
        }
        ?>
        <section class="big_news">
            <article>
                <img src="img/VVD.webp" alt="VVD kiest voor ervaring in top kandidatenlijst Tweede Kamer">
                <H2>VVD kiest voor ervaring in top kandidatenlijst Tweede Kamer</H2>
            </article>

            <article>
                <img src="img/1280x720a.webp" alt="Dodental door overstromingen in Griekenland, Turkije en Bulgarije loopt op">
                <H2>Dodental door overstromingen in Griekenland, Turkije en Bulgarije loopt op</H2>
            </article>
        </section>
    </main>

</body>




<footer>
    <p>@Made by Li Hong</p>
</footer>

</html>