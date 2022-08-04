<?php
session_start();
include('config.php');

// checking session ki admin login hai ya ni
$user = $_SESSION['loggedin'];
if(!$user){
    header('location:hotel/admin/login.php');
}

if(isset($_POST['submit'])){
    // getting all values
    $name= $_POST['name'];
    $location=$_POST['location'];
    $rating=$_POST['rating'];
    $price=$_POST['price'];
    $time = $_POST['time'];

    // for file
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($file_tmp,"../img/hotels/".$file_name);
    
    //database query
    $data=mysqli_query($conn,"INSERT INTO hotels VALUES('','$name','$file_name','$location','$rating','$price','$time')");
    if($data){
        echo"<script> alert('record added successfully')</script>";
    }else{
        echo"error occurred";
    }
}
?>
<div class="container px-5 py-5">
    
    <div class="row px-3 py-3" style="background-color:#eeeeee">
        <div class="col-8">
            <h3 class="text-center">All Hotels</h3>
        </div>
        <div class="col-4" align="end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#try">
            Add Restaurant
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="try" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="try">Add Restaurant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" method="post" action="">
            <input class="form-control mt-3" type="file" name="image" /> 
            <input class="form-control mt-3" type="text" name="name" placeholder="Enter Your Name">
            <input class="form-control mt-3" type="text" name="location" placeholder="Enter Your Location">
            <input class="form-control mt-3" type="text" name="rating" placeholder="Enter Your Rating">
            <input class="form-control mt-3" type="text" name="price" placeholder="Enter Your Price">
            <input class="form-control mt-3" type="text" name="time" placeholder="Enter Time Period">
            <button class="btn btn-primary mt-3"  type="submit" name="submit">Submit</button>
        </form>
        </div>
        </div>
    </div>
    </div>


    <div class="row mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Rating</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th colspan="2" >Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // query likhni hai
                $query = "SELECT * FROM hotels";
                $data = mysqli_query($conn,$query);
                $total = mysqli_num_rows($data);
                if($total !=0){
                    while($result = mysqli_fetch_assoc($data)){
                ?>

                <tr>
                   <td><?= $result['id'] ?></td> 
                   <td>
                       <img src="../img/hotels/<?= $result['img'] ?>" alt="hotel" height="100" width="100" />
                   </td>
                   <td><?=$result['name']?></td>
                   <td><?=$result['location']?></td>
                   <td><?=$result['rating']?></td>
                   <td><?=$result['time']?></td>
                   <td><?=$result['price']?></td>
                    <td>
                        <a href="/hotel/admin/update.php?id=<?= $result['id'] ?>" class="btn btn-primary">Update</a>
                        <a href="/hotel/admin/delete.php?id=<?= $result['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                
                <?php 
                        }
                    } 
                ?>
            </tbody>
        </table>
    </div>
</div>
    

