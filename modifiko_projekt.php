<?php include "inc/header.php"; ?>
<main class="container page">
    <section id="content">
        <hr />

        <?php
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $projekti = merrProjekt($pid);
            $projektiid = $projekti['projektiid'];
            $emri = $projekti['emri'];
            $pershkrimi = $projekti['pershkrimi'];
            $datafillimit = $projekti['datafillimit'];
            $datambarimit = $projekti['datambarimit'];
        }

        if (isset($_POST['modifikoProjekt'])) {
            modifikoProjekt($_POST['projektiid'], $_POST['emri'], $_POST['pershkrimi'], $_POST['datafillimit'], $_POST['datambarimit']);
        }
        ?>

        <form id="modify-project-form" action="" method="post">
            <legend>Project Modification Form</legend>
            <input type="hidden" name="projektiid" value="<?php echo htmlspecialchars($projektiid ?? ''); ?>">
            
            <div class="mb-3">
                <label for="emri" class="form-label">Name:</label>
                <input type="text" name="emri" id="emri" class="form-control" value="<?php echo htmlspecialchars($emri ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="pershkrimi" class="form-label">Description:</label>
                <input type="text" name="pershkrimi" id="pershkrimi" class="form-control" value="<?php echo htmlspecialchars($pershkrimi ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="datafillimit" class="form-label">Start Date:</label>
                <input type="date" name="datafillimit" id="datafillimit" class="form-control" value="<?php echo htmlspecialchars($datafillimit ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="datambarimit" class="form-label">End Date:</label>
                <input type="date" name="datambarimit" id="datambarimit" class="form-control" value="<?php echo htmlspecialchars($datambarimit ?? ''); ?>">
            </div>

            <button type="submit" name="modifikoProjekt" class="mb-4 btn btn-primary">Edit</button>
        </form>

        <div id="errormessage" class="mt-3 alert alert-danger" style="display: none;"></div>
    </section>

    <script>
        document.getElementById("modify-project-form").addEventListener("submit", function(event) {
            var emri = document.getElementById("emri").value.trim();
            var pershkrimi = document.getElementById("pershkrimi").value.trim();
            var datafillimit = document.getElementById("datafillimit").value.trim();
            var datambarimit = document.getElementById("datambarimit").value.trim();

            var errors = false;
            var message = "";

            if (emri === "") {
                message += "Please fill in the name of the project!<br>";
                errors = true;
            }
            if (pershkrimi === "") {
                message += "Please fill the project description!<br>";
                errors = true;
            }
            if (datafillimit === "") {
                message += "Please fill in the project start date!<br>";
                errors = true;
            }
            if (datambarimit === "") {
                message += "Please fill in the project end date!<br>";
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

