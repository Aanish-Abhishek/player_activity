<?php
include 'conn.php';

$id = $_GET['p_id'];

?>

<script>
confirm("Are You Sure You Want To Delete Your Acount");

<?php

$q = " DELETE FROM `register` WHERE u_id = $id " ;
// $q = " DELETE FROM `user` WHERE u_id = $id ";

mysqli_query($con,$q);
?>
</script>

<script>
location.replace("index.php");
</script>


