<?php
session_start();
include('config.php');
 if(isset($_POST["login"])){

    $email=$_POST['email'];
    $password=$_POST['pass'];
    $query = "SELECT * FROM admin_login WHERE email='$email' AND password='$password'";
    $data = mysqli_query( $conn ,$query);
    $total = mysqli_num_rows($data);
    if($total !=0){
        $_SESSION['loggedin'] = 'true';
        header('location:/php/hotel/admin/main.php');
    }else{
        echo "no";
    }
    
 }


?>
<div class="container d-flex justify-content-center align-items-center" style="margin-top: 10%;">
    <div class="row py-3 px-3" style="background-color: #eeeeee;">
        <h3>Admin Login</h3>
    <form method="post" action="">
        <input class="form-control mt-3" type="text" name="email" placeholder="Enter Email">
        <input class="form-control mt-3" type="text" name="pass" placeholder="Enter Password">
        <button class="btn btn-primary mt-3" type="submit" name="login"> submit</button>
    </form>
    </div>
</div>