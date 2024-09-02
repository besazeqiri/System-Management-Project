<?php
error_reporting(0);
include "inc/header.php";
?>

<main class="container page">
    <section id="content">
        <hr />

        <?php
        if (isset($_GET['projektiid'])) {
            $projektiid = $_GET['projektiid'];
            $projekti = merrProjekt($projektiid);

            if ($projekti) {
                $emri = $projekti['emri'];
                $pershkrimi = $projekti['pershkrimi'];
                $datafillimit = $projekti['datafillimit'];
                $datambarimit = $projekti['datambarimit'];

                echo "<h1>Project</h1>";
                echo "<article class='pitem'>";
                echo "<img src='images/pitem{$projektiid}.png' alt='Projekti i pare' class='img-fluid'>";
                echo "<h4>{$emri}</h4>";
                echo "<p>{$pershkrimi}</p>";
                echo "<p>Start Date: {$datafillimit}</p>";
                echo "<p>End Date: {$datambarimit}</p>";
                echo "</article>";
            } else {
                echo "<h2>The project is not registered!</h2>";
            }
        } else {
            echo "<h2>Please select a project to view details.</h2>";
        }
        ?>
    </section>
</main>

<?php include "inc/footer.php"; ?>
