<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <hr />

        <?php
        if (isset($_POST['shtoAnetar'])) {
            shtoAnetar($_POST['emri'], $_POST['mbiemri'], $_POST['telefoni'], $_POST['email'], $_POST['password']);
        }
        ?>

        <form id="registerForm" action="" method="post" class="form-container">
            <h4>Registration form</h4>
            <div class="form-group">
                <label for="emri">Name:</label>
                <input type="text" name="emri" id="emri" class="form-control">
            </div>
            <div class="form-group">
                <label for="mbiemri">Surname:</label>
                <input type="text" name="mbiemri" id="mbiemri" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefoni">Phone:</label>
                <input type="text" name="telefoni" id="telefoni" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            
            <button type="submit" name="shtoAnetar" class="mb-3 btn btn-primary">Add Member</button>
            <div id="errormessage" class="error-message"></div>
        </form>
    </section>

    <script>
        $("#registerForm").submit(function(event) {
            var emri = $("#emri").val();
            var mbiemri = $("#mbiemri").val();
            var email = $("#email").val();
            var telefoni = $("#telefoni").val();
            var password = $("#password").val();

            var errors = false;
            var message = ""; 
            
            if (emri === "") {
                message += "Please fill in the name! <br>";
                errors = true;
            }
            if (mbiemri === "") {
                message += "Please fill in the surname! <br>";
                errors = true;
            }
            if (telefoni === "") {
                message += "Please fill in the phone! <br>";
                errors = true;
            }
            if (email === "") {
                message += "Please fill in the email! <br>";
                errors = true;
            }
            if (password === "") {
                message += "Please fill in the password! <br>";
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

