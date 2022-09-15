<?php
    include 'conn.php';
    session_start();
/*it means that if smeone sent post request with name then only the entire php should be executed */
if(isset($_POST['register'])){
// server is the one for which we need to connect
    $server = "localhost";
// if in local host then username is root
    $username = "root";
// and  when in local host password is empty
    $password = "";
// used to establish connection
    // $con = mysqli_connect($server,$username,$password);

    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $my_character = 'VICTOR';
    $weapon = 'AKM';
    $map = 'VIKINDI';
    // $id = $_POST['u_id'];

// validation of email and username
$emailquery  = " select * from register where email='$email' ";

$query = mysqli_query($con,$emailquery);

$emailcount = mysqli_num_rows($query);

$namequery  = " select * from register where name='$name' ";
$query = mysqli_query($con,$namequery);
$namecount = mysqli_num_rows($query);

if($emailcount>0 ){
    ?>
    <script>
        alert("Email Already Exists");
    </script>
    <?php
}

elseif($namecount>0 ){
    ?>
    <script>
        alert("UserName Already Exists");
    </script>
    <?php
}


else{
$q = "INSERT INTO `game`.`register` (`u_id`,`name`, `age`, `email`, `password`,`country`) VALUES ('$id','$name', '$age', '$email', '$password', '$country');";
  
    /* the below line means that the connection established query if sql is inserted sucessfully then print success else give error and 
        give acces  to that error from con*/
        
    if( $query  = mysqli_query($con,$q))
    {
        $_SESSION['status'] = "Registered Successfully!!";  
        header('location:index.php');
    }
    else{
        echo "ERROR $q <br> $con->error";
    }
    // $id = $_POST['u_id'];

    if($query==1){
        // $ins = " INSERT INTO `demogame`.`user` ( `name`, `my_character`) VALUES ('$name','$my_char');";
        
        // $ins = " INSERT INTO `game`.`user` (`u_id`,`u_name`, `my_character`, `email`, `pass`, `weapon`, `map`) VALUES (NEW.u_id,'$name','$my_character','$email', '$password', '$weapon','$map');";
        $ins = " CREATE TRIGGER `insert` AFTER INSERT ON `register` FOR EACH ROW INSERT INTO user VALUES(NEW.u_id,NEW.name,NEW.email,NEW.password,'VICTOR','AKM','VIKINDI'); ";
        $query = mysqli_query($con,$ins) or die (mysqli_error($con));
   }

    $con->close();
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylee2.css">

</head>
<body>
    

    <h1>CREATE YOUR ACCOUNT!!</h1>
    <form method="post">
        <label>NAME</label>
        <input type="text" name="name" placeholder="Enter Your Name" required > <br>

        <label>AGE</label>
        <input type="number" name="age" placeholder="Enter Your Age" required > <br>

        <label>EMAIL</label>
        <input type="email" name="email" placeholder="Enter Your Email" required > <br>

        <label>PASSWORD</label>
        <input type="password" name="password" placeholder="Enter Your Password" required > <br>

        </div>
                        <div class="col-md-3">
                        <label for="validationCustom04" class="form-label">COUNTRY</label>
                        <select class="form-select" id="validationCustom04" required name="country">
                        <option selected disabled value="">Choose...</option>
                        <option  value="INDIA">INDIA</option>
                        <option  value="USA">USA</option>
                        <option  value="KOREA">KOREA</option>
                        <option  value="JAPAN">JAPAN</option>
                        </select>
        </div>
    <br>
        
        <button class="button" type="submit" name="register">REGISTER</button>

    </form>
</body>
</html>
