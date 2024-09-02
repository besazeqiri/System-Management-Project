<?php
    include 'functions.php';
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Projekti</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="jquery-1.12.1.js"></script>
</head>
<body>
<header class="bg-primary text-white py-3">
    <div class="container">
        <h1 class="display-4 font-weight-bold">SMP </h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link text-light" href="index.php">Home</a></li>
                <?php
                    if (isset($_SESSION['anetari'])) {
                          echo '<li class="nav-item"><a class="nav-link text-light" href="punet.php">Tasks</a></li>';

                     if ($_SESSION['anetari']['roli'] == 1) {
                           echo '<li class="nav-item"><a class="nav-link text-light" href="projektet.php">Projects</a></li>';
                         echo '<li class="nav-item"><a class="nav-link text-light" href="anetaret.php">Members</a></li>';
    }

    echo '<li class="nav-item"><span class="nav-link text-light">' . htmlspecialchars($_SESSION['anetari']['emrimbiemri']) . '</span></li>';
}
?>

            </ul>
        </nav>
    </div>
</header>