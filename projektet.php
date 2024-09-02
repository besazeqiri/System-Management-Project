<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <hr />

        <!-- Table for Projects -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description:</th>
                        <th>Start Date:</th>
                        <th>End Date:</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch projects from the database
                    $projektet = merrProjektet();
                    if (mysqli_num_rows($projektet) > 0) {
                        while ($projekti = mysqli_fetch_assoc($projektet)) {
                            $projektiid = $projekti['projektiid'];
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($projekti['emri']) . "</td>";
                            echo "<td>" . htmlspecialchars($projekti['pershkrimi']) . "</td>";
                            echo "<td>" . htmlspecialchars($projekti['datafillimit']) . "</td>";
                            echo "<td>" . htmlspecialchars($projekti['datambarimit']) . "</td>";
                            echo "<td><a href='modifiko_projekt.php?pid={$projektiid}' class='btn btn-warning btn-sm'>Edit</a></td>";
                            echo "<td><a href='fshij_projekt.php?pid={$projektiid}' class='btn btn-danger btn-sm'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Nuk ka shenime ne DB</td></tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="6" class="text-center"><a href="shto_projekt.php" class="mb-2 btn btn-success">Add Project</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php include "inc/footer.php";?>
