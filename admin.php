<?php
$email = 'admin@gmail.com';
$password = 'admin';

if(isset($_POST['submit'])){

    if($email == $_POST['email'] && $password == $_POST['password']){
        header('location:adminpanel.php');
    }
    else{
        ?>
        <script>
            alert("Invalid Email or Password");
            location.replace("index.php");
        </script>

    <?php
            
    }

}



?>