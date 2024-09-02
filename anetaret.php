<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <h3 class="mt-4">Members</h3>
        <hr />
        
        <!-- Message Display -->
        <div id="message" class="alert alert-info"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?></div>

        <!-- Table for Members -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name and Surname</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch members from the database
                    $anetaret = merrAnetaret();
                    if(mysqli_num_rows($anetaret) > 0){
                        $i = 0;
                        while ($antari = mysqli_fetch_assoc($anetaret)) {
                            $antariid = $antari['antariid'];
                            echo $i % 2 == 0 ? "<tr>" : "<tr class='alt'>";
                            echo "<td>" . htmlspecialchars($antari['emri']) . " " . htmlspecialchars($antari['mbiemri']) . "</td>";
                            echo "<td>" . htmlspecialchars($antari['telefoni']) . "</td>";
                            echo "<td>" . htmlspecialchars($antari['email']) . "</td>";
                            echo "<td><a href='modifiko_anetar.php?aid={$antariid}' class='btn btn-warning btn-sm'>Edit</a></td>";
                            echo "<td><a href='fshij_anetar.php?aid={$antariid}' class='btn btn-danger btn-sm'>Delete</a></td>";
                            echo "</tr>";
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Nuk ka shenime ne DB</td></tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="5" class="text-center"><a href="shto_anetar.php" class="btn btn-success">Add Member</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php include "inc/footer.php";?>
