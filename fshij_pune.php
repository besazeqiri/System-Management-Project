<?php include "inc/header.php"; ?>
<main class="container page">
    <section id="content">
        <hr />

        <?php
        if (isset($_GET['punaid'])) {
            $punaid = $_GET['punaid'];
            $pune = merrPune($punaid); 
            
            if ($pune && is_array($pune)) {
                $antariid = $pune['antariid'] ?? ''; 
                $punaid = $pune['punaid'] ?? '';
                $projekti = $pune['projektiid'] ?? '';
                $datar = $pune['datar'] ?? '';
                $pershkrimi = $pune['pershkrimi'] ?? '';
            } else {
                die("Error: Task not found or invalid ID."); 
            }
        } else {
            die("Error: Task ID is missing."); 
        }
   
        if (isset($_POST['fshijPune'])) {
         
            $punaid = $_POST['punaid'];

            if (empty($punaid)) {
                die("Error: Task ID is missing for deletion.");
            }
            fshijPune($punaid); 
        }
        ?>

        <form id="delete-task" action="" method="post" class="mt-4">
            <legend class="mb-3">Form for Deleting Task</legend>
            <input type="hidden" name="punaid" value="<?php echo htmlspecialchars($punaid ?? ''); ?>">
            
            <div class="mb-3">
                <label for="projekti" class="form-label">Project:</label>
                <select name="projekti" id="projekti" class="form-select">
                    <?php
                    $projektiList = merrProjektet(); // Fetch all projects
                    while ($projektiData = mysqli_fetch_assoc($projektiList)) {
                        $projektiid = $projektiData['projektiid'];
                        $emri = $projektiData['emri'];
                        echo "<option value='{$projektiid}'" . ($projektiid == $projekti ? ' selected' : '') . ">{$emri}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="datar" class="form-label">Registration date:</label>
                <input type="date" name="datar" id="datar" class="form-control" value="<?php echo htmlspecialchars($datar ?? ''); ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="pershkrimi" class="form-label">Description:</label>
                <textarea name="pershkrimi" id="pershkrimi" class="form-control"><?php echo htmlspecialchars($pershkrimi ?? ''); ?></textarea>
            </div>

            <input type="submit" name="fshijPune" class="mb-4 btn btn-danger" value="Delete">
        </form>
    </section>
</main>