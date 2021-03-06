<!doctype html>
<html>

<head>
    <title>Tarot Keeper</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="../public/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Lobster|Oswald|Pacifico|Righteous&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- <script src="data/tarot-cards.js"></script>
    <script src="data/tarot-spreads.js"></script> -->
    <script src="https://kit.fontawesome.com/8819ef24c8.js"></script>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php
    include "inc/connection.php";
    include "inc/topnav.php";
    ?>

    <!-- <a href="#">View Cards and Meanings</a> -->
    <!-- <a href="#">View Tarot Spreads </a> -->
    <h3>Add a New Reading</h3>
    <form id="newReadingForm">
        <select name="tarot_spread" id="tarotSpreadSelect">
            <option>Select a Tarot Spread</option>
        </select>
    </form>
    <?php include "inc/blank-spread.php";?>
    <h3>Your Latest Reading</h3>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>