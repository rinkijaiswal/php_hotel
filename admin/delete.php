<?php
include('config.php');
$id = $_GET['id'];
$query = "DELETE FROM hotels WHERE id = '$id'";
$data = mysqli_query($conn,$query);
if($data){
    echo "<script>window.location = 'http://localhost/hotel/admin/main.php'</script>";
}

?>