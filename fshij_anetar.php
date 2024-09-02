<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <hr />
        
        <?php
        if(isset($_GET['aid'])){
            $aid = $_GET['aid'];
            $antari = merrAnetar($aid);
            $antariid = $antari['antariid'];
            $emri = $antari['emri'];
            $mbiemri = $antari['mbiemri'];
            $telefoni = $antari['telefoni'];
            $email = $antari['email'];
            $password = $antari['fjalekalimi'];
        }

        if (isset($_POST['fshijAnetar'])) {
            fshijAnetar($_POST['antariid']);
        }
        ?>

        <form id="delete-member" action="" method="post" class="mt-4">
            <legend class="mb-3">Form for Deleting Member</legend>
            <input type="hidden" name="antariid" value="<?php if(!empty($antariid)){ echo htmlspecialchars($antariid); } ?>">
            
            <div class="mb-3">
                <label for="emri" class="form-label">First Name:</label>
                <input type="text" name="emri" id="emri" class="form-control" value="<?php if(!empty($emri)){ echo htmlspecialchars($emri); } ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="mbiemri" class="form-label">Last Name:</label>
                <input type="text" name="mbiemri" id="mbiemri" class="form-control" value="<?php if(!empty($mbiemri)){ echo htmlspecialchars($mbiemri); } ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php if(!empty($email)){ echo htmlspecialchars($email); } ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="telefoni" class="form-label">Phone:</label>
                <input type="text" name="telefoni" id="telefoni" class="form-control" value="<?php if(!empty($telefoni)){ echo htmlspecialchars($telefoni); } ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php if(!empty($password)){ echo htmlspecialchars($password); } ?>" disabled>
            </div>

            <input type="submit" name="fshijAnetar" class=" mb-4 btn btn-danger" value="Delete">
        </form>
    </section>
</main>
<?php include "inc/footer.php";?>
