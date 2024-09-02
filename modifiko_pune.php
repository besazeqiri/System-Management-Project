<?php include "inc/header.php"; ?>
<main class="container page">
    <section id="content">
        <hr />

        <?php
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $pune = merrPuna($pid); // Adjusted function name to match your context
            $antariid = $pune['antariid'];
            $punaid = $pune['punaid'];
            $projekti = $pune['projektiid'];
            $datar = $pune['datar'];
            $pershkrimi = $pune['pershkrimi'];
        }

        if (isset($_POST['modifikoPune'])) {
            modifikoPune($_GET['punaid'], $_SESSION['anetari']['antariid'], $_POST['projekti'], $_POST['datar'], $_POST['pershkrimi']);
        }
        ?>

        <form id="modify-task-form" action="" method="post">
            <legend>Task Modification Form</legend>
            <div class="mb-3">
                <label for="projekti" class="form-label">Project:</label>
                <select name="projekti" id="projekti" class="form-select">
                    <option value="" disabled <?php if (empty($projekti)) echo 'selected'; ?>>Select a project</option>
                    <?php
                    $projektet = merrProjektet();
                    while ($pune = mysqli_fetch_assoc($projektet)) {
                        $projektiid = $pune['projektiid'];
                        $emri = $pune['emri'];
                        $selected = ($projektiid == $projekti) ? 'selected' : '';
                        echo "<option value='{$projektiid}' {$selected}>{$emri}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="datar" class="form-label">Registration Date:</label>
                <input type="date" name="datar" id="datar" class="form-control" value="<?php echo htmlspecialchars($datar ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label for="pershkrimi" class="form-label">Description:</label>
                <textarea name="pershkrimi" id="pershkrimi" class="form-control"><?php echo htmlspecialchars($pershkrimi ?? ''); ?></textarea>
            </div>
            <button type="submit" name="modifikoPune" class="mb-5 btn btn-primary">Edit</button>
        </form>

        <div id="errormessage" class="mt-3 alert alert-danger" style="display: none;"></div>
    </section>

    <script>
        document.getElementById("modify-task-form").addEventListener("submit", function(event) {
            var projekti = document.getElementById("projekti").value.trim();
            var datar = document.getElementById("datar").value.trim();
            var pershkrimi = document.getElementById("pershkrimi").value.trim();

            var errors = false;
            var message = "";

            if (projekti === "") {
                message += "Please select a project!<br>";
                errors = true;
            }
            if (datar === "") {
                message += "Please fill in the registration date!<br>";
                errors = true;
            }
            if (pershkrimi === "") {
                message += "Please fill in the project description!<br>";
                errors = true;
            }

            if (errors) {
                var errorDiv = document.getElementById("errormessage");
                errorDiv.innerHTML = message;
                errorDiv.style.display = "block";
                event.preventDefault();
            } else {
                return true;
            }
        });
    </script>
</main>
<?php include "inc/footer.php"; ?>
