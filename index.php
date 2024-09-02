<?php include "inc/header.php"; ?>
<main class="container page mt-4">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8 col-md-12">
            <section id="content">
            <h3>SMP Project - Description</h3>
                <p>
                    Welcome to our Project Management System, SMP! <br>
                    This system is designed to assist in the organization and monitoring of projects more effectively. It includes advanced features that offer a simple and convenient way to manage projects and team members.<br>
                    In this section, you will find information on various projects that are either in progress or completed. We provide a detailed view of each project, including descriptions, start and end dates, and images that better illustrate the progress and results achieved.
                    Our project is focused on providing a reliable and user-friendly platform that helps in planning, tracking, and successfully completing projects. Every detail is designed to maximize efficiency and ensure that every step of the project aligns with your objectives and expectations.<br>
                    Explore our latest projects below and learn how we have managed to create innovative solutions and enhance overall project performance for our clients.
                </p>
                <hr />
                <section id="projects">
    <h4>Recent projects</h4>
    <div class="row">
        <?php
            $projektet = merrProjektet();
            while ($projekti = mysqli_fetch_assoc($projektet)) {
                $projektiid = $projekti['projektiid'];
                $emri = $projekti['emri'];
                $pershkrimi = $projekti['pershkrimi'];
                echo "<div class='col-md-4 mb-4'>";
                echo "<article class='pitem'>";
                echo "<img src='images/pitem{$projektiid}.png' alt='Projekti {$emri}' class='img-fluid mb-3'>";
                echo "<h5 class='mb-3'>{$emri}</h5>";
            /*    if (strlen($pershkrimi) > 300) {
                    $pershkrimi = substr($pershkrimi, 0, 300) . "...";
                }
                echo "<p>{$pershkrimi}</p>";*/
                echo "<a href='projekt.php?projektiid={$projektiid}' class='btn btn-info'>More &gt;&gt;</a>";
                echo "</article>";
                echo "</div>";
            }
        ?>
    </div>
</section>

                <section id="members">
                    <h4>Members</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name and Surname</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $anetaret = merrAnetaret();
                                if (mysqli_num_rows($anetaret) > 0) {
                                    $i = 0;
                                    while ($antari = mysqli_fetch_assoc($anetaret)) {
                                        $antariid = $antari['antariid'];
                                        $i++;
                                        echo "<tr class='" . ($i % 2 == 0 ? "" : "table-secondary") . "'>";
                                        echo "<td>" . $antari['emri'] . " " . $antari['mbiemri'] . "</td>";
                                        echo "<td>" . $antari['telefoni'] . "</td>";
                                        echo "<td>" . $antari['email'] . "</td>";
                                        echo "</tr>";
                                        if ($i > 5) break;
                                    }
                                } else {
                                    echo "<tr><td colspan='3' class='text-center'>Nuk ka shenime në DB</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </section>
            </section>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-md-12">
            <?php include "inc/sidebar.php"; ?>
        </div>
    </div>
</main>
<?php include "inc/footer.php"; ?>
