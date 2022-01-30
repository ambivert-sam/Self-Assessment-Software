<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Create Login Limits PHP Script</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Register</h2>
        <form action="" method="post" name="form1">
            <div class="input-field">
                <label for="name" class="input-label">Full Name</label>
                <input type="text" name="Full Name" id="name" class="form-control" placeholder="Enter your full name" required>
            </div>
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="text" name="Email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="Password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="input-field">
                <label for="cpassword" class="input-label">Confirm Password</label>
                <input type="password" name="Cpassword" id="cpassword" class="form-control" placeholder="Enter your confirm password" required>
                
                
             
            </div>
            <button type="submit" name="submit1" class="btn btn-success loginbtn">Register</button>
            <p>You have already an account! <a href="login.php">Login</a>.</p>

            <div class="alert alert-success" id="success" style="margin-top:10px display:none"> 
            <strong>Success!</strong> Account Registration Successfully.
            </div>

            <div class="alert alert-danger" id="failure" style="margin-top:10px display:none">
            <strong>Already Exist! </strong> Username Already Exist.
            </div>
        </form>
    </div>
    
<?php
if(isset($_POST["submit1"]))
{
    $count=0;
    $res=mysqli_query($link,"select * from registration where fullname ='$_POST[Full Name]'") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);

    if($count>0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="none";
            document.getElementById("failure").style.display="block";
        </script>
        <?php
    }
    else{

        mysqli_query($link,"insert into registration values(NULL,'$_POST[Full Name]','$_POST[Email]','$_POST[Password]','$_POST[Cpassword]')")or die(mysqli_error($link));
        ?>
        <script type="text/javascript">
        document.getElementById("success").style.display="block";
        document.getElementById("failure").style.display="none";
        </script>
        <?php


    }

}
?>
</body>
</html> 