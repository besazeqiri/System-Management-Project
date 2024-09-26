<?php include "inc/header.php"; ?>
<main class="container page">
    <section id="content">
        <hr />
        
        <?php
        if (isset($_GET['aid'])) {
            $aid = $_GET['aid'];
            $antari = merrAnetar($aid);
            $antariid = $antari['antariid'];
            $emri = $antari['emri'];
            $mbiemri = $antari['mbiemri'];
            $telefoni = $antari['telefoni'];
            $email = $antari['email'];
            $password = $antari['fjalekalimi'];
        }

        if (isset($_POST['modifikoAnetar'])) {
            modifikoAnetar($_POST['antariid'], $_POST['emri'], $_POST['mbiemri'], $_POST['telefoni'], $_POST['email'], $_POST['password']);
        }
        ?>

        <form id="modify-form" action="" method="post">
            <legend>Edit Form</legend>
            <input type="hidden" name="antariid" value="<?php echo htmlspecialchars($antariid ?? ''); ?>">
            
            <div class="mb-3">
                <label for="emri" class="form-label">Name:</label>
                <input type="text" name="emri" id="emri" class="form-control" value="<?php echo htmlspecialchars($emri ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="mbiemri" class="form-label">Surname:</label>
                <input type="text" name="mbiemri" id="mbiemri" class="form-control" value="<?php echo htmlspecialchars($mbiemri ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="telefoni" class="form-label">Phone:</label>
                <input type="text" name="telefoni" id="telefoni" class="form-control" value="<?php echo htmlspecialchars($telefoni ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email ?? ''); ?>">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($password ?? ''); ?>">
            </div>

            <button type="submit" name="modifikoAnetar" class="mb-4 btn btn-primary">Edit</button>
        </form>

        <div id="errormessage" class="mt-3 alert alert-danger" style="display: none;"></div>
    </section>

    <script>
        document.getElementById("modify-form").addEventListener("submit", function(event) {
            var emri = document.getElementById("emri").value.trim();
            var mbiemri = document.getElementById("mbiemri").value.trim();
            var email = document.getElementById("email").value.trim();
            var telefoni = document.getElementById("telefoni").value.trim();
            var password = document.getElementById("password").value.trim();

            var errors = false;
            var message = "";

            if (emri === "") {
                message += "Please fill in the name!<br>";
                errors = true;
            }
            if (mbiemri === "") {
                message += "Please fill in the surname!<br>";
                errors = true;
            }
            if (email === "") {
                message += "Please fill in the email!<br>";
                errors = true;
            }
            if (telefoni === "") {
                message += "Please fill in the phone!<br>";
                errors = true;
            }
            if (password === "") {
                message += "Please fill in the password!<br>";
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
