<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <hr />
        
        <?php
        if (isset($_POST['shtoPune'])) {
            shtoPune($_SESSION['anetari']['antariid'], $_POST['projekti'], $_POST['datar'], $_POST['pershkrimi']);
        }
        ?>

        <form id="projectForm" action="" method="post" class="form-container">
            <h4>Task Registration Form</h4>
            <div class="form-group">
                <label for="projekti">Project:</label>
                <select name="projekti" id="projekti" class="form-control">
                    <option value="">Select the project</option>
                    <?php
                        $punet = merrProjektet();
                        while ($pune = mysqli_fetch_assoc($punet)) {
                            $projektiid = $pune['projektiid'];
                            $emri = $pune['emri'];
                            echo "<option value='{$projektiid}'>{$emri}</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="datar">Registration date:</label>
                <input type="date" name="datar" id="datar" class="form-control">
            </div>

            <div class="form-group">
                <label for="pershkrimi">Description:</label>
                <textarea name="pershkrimi" id="pershkrimi" class="form-control"></textarea>
            </div>
            
            <button type="submit" name="shtoPune" class="mb-4 btn btn-primary">Add Task</button>
            <div id="errormessage" class="error-message"></div>
        </form>
    </section>

    <script>
        $("#projectForm").submit(function(event) {
            var projekti = $("#projekti").val();
            var datar = $("#datar").val();
            var pershkrimi = $("#pershkrimi").val();

            var errors = false;
            var message = ""; 
            
            if (projekti === "") {
                message += "Please select the project! <br>";
                errors = true;
            }
            if (datar === "") {
                message += "Please fill in the project registration date! <br>";
                errors = true;
            }
            if (pershkrimi === "") {
                message += "Please fill in the description! <br>";
                errors = true;
            }
            
            if (errors) {
                $("#errormessage").html(message);
                return false;
            } else {
                return true;
            }
        });
    </script>
</main>
<?php include "inc/footer.php";?>
