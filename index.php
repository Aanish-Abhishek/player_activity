<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAME_DATABASE</title>
    <link rel="stylesheet" href="stylee1.css">
</head>
<body>
        
    <div class="cont">
        <form action="user.php" method="post">
            <h2>USER LOGIN</h2>
        <?php
            if(isset($_SESSION['status']))
            {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php  echo $_SESSION['status']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
            
        <?php
                unset($_SESSION['status']);
            }
        ?>

            <label>Email</label>
            <input type="email" name="email" required> <br>

            <label>Password</label>
            <input type="password" name="password" required> <br>

            <button class="button" type="submit" name="login" >Login</button> 

        </form>

        <a href="register.php">
            <button  id="register" type="submit" name="register" >New User?</button>
        </a>
    
    </div>
   
    
    <div class="cont1">
        <form action="admin.php" method="post">
            <h2>ADMIN LOGIN</h2>
            <label>Email</label>
            <input type="email" name="email" > <br>

            <label>Password</label>
            <input type="password" name="password" > <br>
            <button class="button" type="submit" name="submit">Login</button>
        </form>
    </div>

</body>
</html>



