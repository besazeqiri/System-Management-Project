<?php include "inc/header.php";?>
<main class="container page">
    <section id="content">
        <hr />
        
        <?php
        if(isset($_GET['pid'])){
            $pid = $_GET['pid'];
            $projekti = merrProjekt($pid);
            $projektiid = $projekti['projektiid'];
            $emri = $projekti['emri'];
            $pershkrimi = $projekti['pershkrimi'];
            $datafillimit = $projekti['datafillimit'];
            $datambarimit = $projekti['datambarimit'];
        }

        if (isset($_POST['fshijProjekt'])) {
            fshijProjekt($_POST['projektiid']);
        }
        ?>

        <form id="delete-project" action="" method="post" class="mt-4">
            <legend class="mb-3">Form for Deleting Project</legend>
            <input type="hidden" name="projektiid" value="<?php if(!empty($projektiid)){ echo htmlspecialchars($projektiid); } ?>">
            
            <div class="mb-3">
                <label for="emri" class="form-label">Name:</label>
                <input type="text" name="emri" id="emri" class="form-control" value="<?php if(!empty($emri)){ echo htmlspecialchars($emri); } ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="pershkrimi" class="form-label">Description:</label>
                <input type="text" name="pershkrimi" id="pershkrimi" class="form-control" value="<?php if(!empty($pershkrimi)){ echo htmlspecialchars($pershkrimi); } ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="datafillimit" class="form-label">Start Date:</label>
                <input type="date" name="datafillimit" id="datafillimit" class="form-control" value="<?php if(!empty($datafillimit)){ echo htmlspecialchars($datafillimit); } ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="datambarimit" class="form-label">End Date:</label>
                <input type="date" name="datambarimit" id="datambarimit" class="form-control" value="<?php if(!empty($datambarimit)){ echo htmlspecialchars($datambarimit); } ?>" disabled>
            </div>

            <input type="submit" name="fshijProjekt" class=" mb-4 btn btn-danger" value="Delete">
        </form>
    </section>
</main>
<?php include "inc/footer.php";?>
