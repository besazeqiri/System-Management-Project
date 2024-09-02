<?php include "inc/header.php"; ?>
<main class="container page">
    <section id="content">
        <hr />

        <?php
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $pune = merrPune($pid); 
            $antariid = $pune['antariid'];
            $punaid = $pune['punaid'];
            $projekti = $pune['projektiid'];
            $datar = $pune['datar'];
            $pershkrimi = $pune['pershkrimi'];
        }

        if (isset($_POST['fshijPune'])) {
            fshijPune($_POST['punaid']);
        }
        ?>

        <form id="delete-task" action="" method="post" class="mt-4">
            <legend class="mb-3">Form for Deleting Task</legend>
            <input type="hidden" name="punaid" value="<?php echo htmlspecialchars($punaid ?? ''); ?>">
            
            <div class="mb-3">
                <label for="projekti" class="form-label">Project:</label>
                <select name="projekti" id="projekti" class="form-select">
                    <?php
                    $projektiList = merrProjektet(); // Adjusted function to fetch all projects
                    while ($projekti = mysqli_fetch_assoc($projektiList)) {
                        $projektiid = $projekti['projektiid'];
                        $emri = $projekti['emri'];
                        echo "<option value='{$projektiid}'" . ($projektiid == $projekti ? ' selected' : '') . ">{$emri}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="datar" class="form-label">Registration date:</label>
                <input type="date" name="datar" id="datar" class="form-control" value="<?php echo htmlspecialchars($datar ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="pershkrimi" class="form-label">Description:</label>
                <textarea name="pershkrimi" id="pershkrimi" class="form-control"><?php echo htmlspecialchars($pershkrimi ?? ''); ?></textarea>
            </div>

            <input type="submit" name="fshijPune" class="mb-4 btn btn-danger" value="Delete">
            
        </form>
    </section>
</main>
<?php include "inc/footer.php"; ?>
