<?php
include('config.php');
$id=$_GET['id'];

$query="SELECT * FROM hotels WHERE id='$id'";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_array($data);
$img = $result['img'];

if(isset($_POST['update'])){
    // getting all values
    $name= $_POST['name'];
    $location=$_POST['location'];
    $rating=$_POST['rating'];
    $price=$_POST['price'];
    $time = $_POST['time'];
    $image = $_FILES['image'];

    if($image['name'] == ''){
        $file_name = $img;
    }else{
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../img/hotels/".$file_name);
    }

    $query="UPDATE hotels SET name='$name',location='$location',rating='$rating',price='$price',time='$time',img='$file_name' WHERE id ='$id'";
    $data = mysqli_query($conn,$query);
    if($data){
    echo"<script>window.location = 'http://localhost/hotel/admin/main.php'</script>";
    }
}

?>
<div class="container d-flex justify-content-center align-items-center" style="margin-top: 2%;">
    <div class="row px-5 py-5" style="background-color: skyblue;">
        <h3 class="text-center">Update Hotel Data</h3>
        <form enctype="multipart/form-data" method="post" action="">
            <input class="form-control mt-3" type="file" name="image" /> 
            <input value="<?= $result['name'] ?>" class="form-control mt-3" type="text" name="name" placeholder="Enter Your Name">
            <input value="<?= $result['location'] ?>" class="form-control mt-3" type="text" name="location" placeholder="Enter Your Location">
            <input value="<?= $result['rating'] ?>" class="form-control mt-3" type="text" name="rating" placeholder="Enter Your Rating">
            <input value="<?= $result['price'] ?>" class="form-control mt-3" type="text" name="price" placeholder="Enter Your Price">
            <input value="<?= $result['time'] ?>" class="form-control mt-3" type="text" name="time" placeholder="Enter Time Period">
            <button class="btn btn-primary mt-3"  type="submit" name="update">Submit</button>
        </form>
    </div>
</div>