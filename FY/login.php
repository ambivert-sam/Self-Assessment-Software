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
        <h2 class="title">Login</h2>
        <form action="" method="post" name="form1">
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Login</button>
            <p>Create Account! <a href="register.php">Register</a>.</p>
            <div class="alert alert-danger" id="failure" style="margin-top:10px display:none">
            <strong>Does not match </strong> Invalid email or password.
            </div>
        </form>
    </div>


<?php
if(isset($_POST["login"]))
{
    $count=0;
    $res=mysqli_query($link,"select * from registration where email='$_POST[Email]' && password='$_POST[Password]'");
    $count=mysqli_num_rows($res);

    if($count==0)
    {  
        ?>
        <script type="text/javascript">
            document.getElementById("failure").style.display="block";
        </script>
        <?php



    }
    else{
        ?>
<script type="text/javascript">
    window.location="demo.php"

</script>
        <?php
    }
}

?>
</body>
</html>