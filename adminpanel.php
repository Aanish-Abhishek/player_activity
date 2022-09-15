<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style>
  body{
    background-image:url('img9.jpeg');
    /* background-image: url(img9.jpeg); */
    background-size: cover;
    background-position-y: center;
    /* background-position-y: top; */
    /* background-position-x: center; */
    /* background-blend-mode: unset; */
    background-attachment: fixed;
  }
  .table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #343a40;
}
.table td, .table th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #343a40;
    color: white;
    font-weight: 700;
}
  .btn {
    display: inline-block;
    float:right;
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
  .btn2 {
    display: inline-block;
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

  <button class="btn-dark grey btn " class="text-white" name="start" ><a href="index.php">LOGOUT</a></button>
<br>
    <h1 class="text-warning text-center">WELCOME ADMIN</h1>
    <button class="btn2-light grey btn2 " class="text-white" name="view" ><a href="view.php">VIEW DETAILS</a></button>
<table  class=" table table-striped table-hover table-bordered>
  <thead class="thead-dark">
    <tr class="bg-dark text-white text-center">
      <th scope="col">AUDIT_ID</th>
      <th scope="col">USER_ID</th>
      <th scope="col">PROCESS_NAME</th>
      <th scope="col">PROCESSS_ON</th>
      <!-- <th scope="col">LOGOUT</th> -->
    </tr>
  </thead>
  <tbody>
    <?php
include 'conn.php';
$q = " SELECT * FROM `admin` ";
$query = mysqli_query($con,$q);
while($res = mysqli_fetch_array($query)){

      ?>
      <tr class=" text-center">
      <td><?php echo $res['audit_id']; ?></td> 
      <td><?php echo $res['u_id']; ?></td> 
      <td><?php echo $res['process_name']; ?></td> 
      <td><?php echo $res['process_on']; ?></td> 
      <!-- <td><button class="btn-danger btn"> <a href="index.php" class="text-white">LOGOUT</a></button></td> -->
      </tr>
      <?php
}

?>
  
  </tbody>
</table>
<br>


</body>
</html>

