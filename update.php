<?php
include 'conn.php';
$id = $_GET['p_id'];

// for displaying existing values in update form

$sql = "select * from `user` where u_id=$id";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
$weapon = $row['weapon'];
$map = $row['map'];
$my_character = $row['my_character'];

// ---------------------------
if(isset($_POST['done'])){
        $weapon =  $_POST['weapon'];
        $map = $_POST['map'];
        $my_character = $_POST['my_character'];
        $costume = $_POST['costume'];
    
        $q = " UPDATE `game`.`user` SET u_id=$id, weapon='$weapon', map='$map', my_character='$my_character' WHERE u_id = $id ";
        $query = mysqli_query($con,$q);
        
        if($query){
    
            // $qr = " CREATE TRIGGER `insert` AFTER UPDATE ON `user` FOR EACH ROW INSERT INTO inventory VALUES(NEW.u_id,NEW.weapon,NEW.my_character,NEW.map,'$costume'); ";
           $qr = " INSERT INTO `inventory`(`player_id`, `weapon`, `my_character`, `map`, `costume`) VALUES ('$id','$weapon','$my_character','$map','$costume'); "; 
            $query = mysqli_query($con,$qr);
            ?>
            <script>
                alert("Updated Sucessfully");
            </script>
            <?php
        }
      
}
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTORY</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"> -->
     <link href="stylee3.css" rel="stylesheet">
     <link href="stylee4.css" rel="stylesheet">
     <style>
         .navbar {
    display: inline-block;
    background:transparent;
    width: -webkit-fill-available;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
    margin-left: 23px;
    font-weight: 500;
    line-height: 1.2;
    color: white;
}
.form-label {
    margin-bottom: 0.5rem;
    color: white;
    font-weight: 450;
}
     </style>
</head>
<body>

<div class="mid">
            <ul class="navbar">
                <li> <a href="updated.php?id=<?php echo $id  ?>" > HOME </a> </li>
                <!-- <li> <a href="stats.php">STATS</a> </li> -->
               
                <li> <a href="#">ABOUT US</a> </li>
                <li> <a href="index.php">LOGOUT</a> </li> 
            </ul>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mb-3">
                <h3>INVENTORY</h3>
            </div>
            <form accept="" class="shadow p-4" method="post">                  
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">WEAPON</label>
                    <select class="form-select" id="validationCustom04"  name="weapon" >
                    <option selected disabled value=""><?php echo $weapon  ?></option>
                        <option  value="GROZA">GROZA</option>
                        <option  value="M416">M416</option>
                        <option  value="DP-28">DP-28</option>
                        <option  value="SHOTGUN">SHOTGUN</option>
                        <option  value="AKM">AKM</option>
                    </select>
                </div>
    <br>
               
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">CHARACTER</label>
                    <select class="form-select" id="validationCustom04"  name="my_character" >
                        <option selected disabled value=""><?php echo $my_character  ?></option>
                        <option  value="LARA">LARA</option>
                        <option  value="NARUTO">NARUTO</option>
                        <option  value="LUFFY">LUFFY</option>
                        <option  value="VICTOR">VICTOR</option>
                    </select>
                </div>
    <br>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">MAP</label>
                    <select class="form-select" id="validationCustom04"  name="map">
                        <option selected disabled value=""><?php echo $map  ?></option>
                        <option  value="ERANGEL">ERANGEL</option>
                        <option  value="SANHOK">SANHOK</option>
                        <option  value="MIRAMAR">MIRAMAR</option>
                        <option  value="VIKINDI">VIKINDI</option>
                    </select>
                </div>
    <br>
                
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">COSTUME</label>
                    <select class="form-select" id="validationCustom04"  name="costume">
                        <option selected disabled value="">Choose...</option>
                        <option  value="DRAGON_SET">DRAGON SET</option>
                        <option  value="HALLOWEN_SET">HALLOWEN SET</option>
                        <option  value="INVADER_SET">INVADER SET</option>
                        <option  value="MUMMY_SET">MUMMY SET</option>
                    </select>
                </div>
<br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="done" > UPDATE</button>
                  
       
                </div>

                <hr>
                
            </form>
        </div>
    </div>
</div>

</body>
</html> 

