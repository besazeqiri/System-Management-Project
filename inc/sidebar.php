<?php
    if (isset($_POST['login'])) {
        Login($_POST['email'],$_POST['password']);
    }
?>

<aside class="bg-light p-4 rounded">
    <form id="login" action="" method="post">
        <legend class="h4 mb-3">Login Form</legend>
        <div class="form-group">
            <label for="perdoruesi">Email:</label>
            <input type="email" name="email" id="perdoruesi" class="form-control">
        </div>
        <div class="form-group">
            <label for="paswordi">Password:</label>
            <input type="password" name="password" id="paswordi" class="form-control">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Log in</button>
    </form>
    <div id="errormessage" class="alert alert-danger mt-3" style="display: none;"></div>
    
    <h3 class="mt-4">SMP includes the following functionalities:</h3>
    <ul class="list-unstyled">
        <li>Member management (Add | Delete | Edit)</li>
        <li>Project management (Add | Delete | Edit)</li>
        <li>Task management (Add | Delete | Edit)</li>
        <li>Login and Logout</li>
        <li>Other management options</li>
    </ul>
    
    <h3 class="mt-4">SMP offers these features:</h3>
    <ul class="list-unstyled">
        <li>HTML & CSS Theory and Exercises</li>
        <li>HTML & CSS Practice</li>
        <li>JavaScript & jQuery Theory and Exercises</li>
        <li>JavaScript & jQuery Practice</li>
        <li>MySQL and PHP Theory and Exercises</li>
        <li>MySQL and PHP Practice</li>
    </ul>
</aside>

<script>
    $("#login").submit(function(event){
        var perdoruesi=$("#perdoruesi").val();
        var paswordi=$("#paswordi").val();

        var errors=false;
        var message="";
        if(perdoruesi==""){
            message+="Please fill in the email! <br>";
            errors=true;
        }
        if(paswordi==""){
            message+="Please fill in the password! <br>";
            errors=true;
        }
        if(errors){
            $("#errormessage").html(message);
            return false;
        }else{
            return true;
        }
    });
</script>
