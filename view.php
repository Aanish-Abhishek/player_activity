<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAILS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    .btn {
    display: block;
    /* float:right; */
    margin: auto;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<body>
  <br>
    <h1 class="text-warning text-center">USER DETAILS</h1>
 
<table  class=" table table-striped table-hover table-bordered>
  <thead class="thead-dark">
    <tr class="bg-dark text-white text-center">
      <th scope="col">USER_ID</th>
      <th scope="col">USER_NAME</th>
      <th scope="col">EMAIL</th>
      <!-- <th scope="col">LOGOUT</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
include 'conn.php';
// $q = " CREATE VIEW `details` AS SELECT u_id,u_name,country,age FROM `register`,`user`; ";
// $query = mysqli_query($con,$q);

$ins = "select * from details";
$query = mysqli_query($con,$ins);
while($res = mysqli_fetch_array($query)){

      ?>
      <tr class=" text-center">
      <td><?php echo $res['u_id']; ?></td> 
      <td><?php echo $res['u_name']; ?></td> 
  
      <td><?php echo $res['email']; ?></td> 
      <!-- <td><button class="btn-danger btn"> <a href="index.php" class="text-white">LOGOUT</a></button></td> -->
      </tr>
      <?php
}

$new = "select u_id from details";
$new_run = mysqli_query($con,$new);
$row = mysqli_num_rows($new_run );

echo"<h2> Total Users : $row </h2>";

?>
  
  </tbody>
</table>
<br>
<button class="btn-dark grey btn " class="text-white" name="start" ><a href="adminpanel.php">BACK</a></button>

</body>
</html>