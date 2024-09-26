<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <hr />
        
        <?php
        if (isset($_POST['shtoProjekt'])) {
            shtoProjekt($_POST['emri'], $_POST['pershkrimi'], $_POST['datafillimit'], $_POST['datambarimit']);
        }
        ?>

        <form id="projectForm" action="" method="post" class="form-container">
            <h4>Project registration form</h4>
            <div class="form-group">
                <label for="emri">Name:</label>
                <input type="text" name="emri" id="emri" class="form-control">
            </div>
            <div class="form-group">
                <label for="pershkrimi">Description:</label>
                <textarea name="pershkrimi" id="pershkrimi" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="datafillimit">Start Date:</label>
                <input type="date" name="datafillimit" id="datafillimit" class="form-control">
            </div>
            <div class="form-group">
                <label for="datambarimit">End Date:</label>
                <input type="date" name="datambarimit" id="datambarimit" class="form-control">
            </div>
            
            <button type="submit" name="shtoProjekt" class="mb-3 btn btn-primary">Add Project</button>
            <div id="errormessage" class="error-message"></div>
        </form>
    </section>

    <script>
        $("#projectForm").submit(function(event) {
            var emri = $("#emri").val();
            var pershkrimi = $("#pershkrimi").val();
            var datafillimit = $("#datafillimit").val();
            var datambarimit = $("#datambarimit").val();

            var errors = false;
            var message = ""; 
            
            if (emri === "") {
                message += "Please fill in the name! <br>";
                errors = true;
            }
            if (pershkrimi === "") {
                message += "Please fill in the description! <br>";
                errors = true;
            }
            if (datafillimit === "") {
                message += "Please fill in the start date! <br>";
                errors = true;
            }
            if (datambarimit === "") {
                message += "Please fill in the end date! <br>";
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

