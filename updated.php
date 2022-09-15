
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylee3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
</head>
<style>
    
.form-select {
    width:400%;
}
    
.form-select {
    width:400%;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    color: #ecf404;
    font-weight: 500px;
    font-weight: 900;
}
.form-label {
    margin-bottom: 0.5rem;
    color: aliceblue;
    font-weight: 800;
}

</style>
<body>
<div class="mid">
            <ul class="navbar">
                <!-- <li> <a href="user.php" > HOME </a> </li> -->
                <!-- <li> <a href="stats.php">STATS</a> </li> -->
              
                <li> <a href="#">ABOUT US</a> </li>
                <li> <a href="index.php">LOGOUT</a> </li>
            </ul>
</div>
    
    <div class="container">
        <div class="col-lg-12">
            <h1 class="text-warning text-center">CRITICAL OPS</h1>
            <br>
      
            <table class=" table table-striped table-hover table-bordered ">
                <tr class="bg-dark text-white text-center">
                    <th>USER_ID</th>            
                    <th>USER_NAME</th>             
                    <th>CHARACTER</th>                                  
                    <th>WEAPON</th>            
                    <th>MAP</th>                       
                    <th>INVENTORY</th>                      
                    <th>DELETE </th>                      
                </tr>
                
<?php
    include 'conn.php';
    $u_id = $_GET['id'];
                $q = " SELECT * FROM `user` WHERE u_id = $u_id ";
                $query = mysqli_query($con,$q);

                while($res = mysqli_fetch_array($query)){

        ?>
                        <tr class=" text-center">
                            
                            <td><?php echo $res['u_id']; ?></td>            
                            <td><?php echo $res['u_name']; ?></td>            
                            <td><?php echo $res['my_character']; ?></td>                       
                            <td><?php echo $res['weapon']; ?></td>            
                            <td><?php echo$res['map']; ?></td>            
                        
                            <td> <button class="btn-primary btn"> <a href="update.php?p_id=<?php echo $res['u_id'];?>" class="text-white">INVENTORY</a></button></td>    
                            <td><button class="btn-danger btn"> <a href="delete.php?p_id=<?php echo $res['u_id'];?>" class="text-white">DELETE ACCOUNT</a></button></td> 
                        </tr>
                        
                        <?php
                    } 
                
        ?>
  
</table>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <form accept="" class="shadow p-4" method="post">                  
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">GAMETYPE</label>
                    <select class="form-select" id="validationCustom04" name="gametype" >
                    <option selected disabled value=""></option>
                        <option  value="CLASSIC">CLASSIC</option>
                        <option  value="TDM">TDM</option>
                        <option  value="QUICK MATCH">QUICK_MATCH</option>
                       
                    </select>
                </div>
                <br>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">PLAYTYPE</label>
                    <select class="form-select" id="validationCustom04" name="playtype" >
                    <option selected disabled value=""></option>
                        <option  value="SOLO">SOLO</option>
                        <option  value="DUO">DUO</option>
                        <option  value="SQUAD">SQUAD</option>
                    </select>
                </div>
            
        </div>
    </div>
</div>
<br>
<br>

<form method="post">
<button class="btn-dark grey btn " class="text-white" name="start">START GAME</button>
</form>
  

        </div>

    </div>

</body>
</html>


<?php
 include 'conn.php';
 $u_id = $_GET['id'];
 if(isset($_POST['start']))
 {
    $game_type =  $_POST['gametype'];
    $play_type =  $_POST['playtype'];
    // $game_type =  'classic';
    // $play_type =  'duo';
    
    ?>
    <script>
        alert("Game Started");
    </script>
    <?php
    $q =  " INSERT INTO `game`.`type`(`p_id`,`play_type`,`game_type`) VALUES ('$u_id','$play_type','$game_type'); ";
    
    if($query = mysqli_query($con,$q) ){
        
        // $ins = " INSERT INTO `demogame`.`admin`( `u_id`,`process_name`, `process_on`) VALUES ( '$u_id','GAME_STARTED', current_timestamp()); ";
       $ins = " CREATE TRIGGER `insert2` AFTER INSERT ON `inventory` FOR EACH ROW INSERT INTO admin VALUES(null,NEW.player_id,'GAME_STARTED',NOW()); ";

        $query = mysqli_query($con,$ins);
}
}

?>

