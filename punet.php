<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <hr />
        <!-- Message Section -->
        <div id="message" class="alert alert-info mb-4" role="alert">
            <?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?>
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
            <table id="members" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Project</th>
                        <th>Registration Date</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $punet = merrPunet();
                        if(mysqli_num_rows($punet) > 0) {
                            $i = 0;
                            while ($puna = mysqli_fetch_assoc($punet)) {
                                if($i % 2 == 0) {
                                    echo "<tr>";
                                } else {
                                    echo "<tr class='table-secondary'>";
                                }
                                $punaid = $puna['punaid'];
                                $i++;
                                echo "<td>" . htmlspecialchars($puna['emri']) . "</td>";
                                echo "<td>" . htmlspecialchars($puna['data']) . "</td>";
                                echo "<td>" . htmlspecialchars($puna['pershkrimi']) . "</td>";
                                echo "<td><a href='modifiko_pune.php?punaid={$punaid}' class='btn btn-warning btn-sm'>Edit</a></td>";
                                echo "<td><a href='fshij_pune.php?punaid={$punaid}' class='btn btn-danger btn-sm'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>There are no records in DB</td></tr>";
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-center">
                            <a href="shto_pune.php" class="btn btn-success">Add Task</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</main>
<?php include "inc/footer.php";?>
