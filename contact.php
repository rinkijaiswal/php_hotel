<?php include('head.php'); 
include('./admin/config.php');

if(isset($_POST["contact"])){

    $name=$_POST['email'];
    $email=$_POST['email'];
    $query=$_POST['query'];
    $data = mysqli_query( $conn ,"INSERT INTO contact VALUE('','$name','$email','$query')");
    if($data){
        echo "Your contact is successfully";
    }else{

        echo "NO successfully";
    }
}

?>


<div class="container d-flex justify-content-center align-items-center" style="margin-top:3%;">
    <div class="row py-3 px-3" style="background-color: #eeeeee;">
        <h3> Contact </h3>
        <form method="post" action="">
            <input class="form-control mt-3" type="text" name="name" placeholder="Enter Name">
            <input class="form-control mt-3" type="text" name="email" placeholder="Enter Email">
            <textarea rows="3" class="form-control mt-3" name="query" placeholder="Enter query"></textarea>
            <button class="btn btn-primary mt-3" type="submit" name="contact"> submit</button>
        </form>
    </div>

</div>

    <?php include('footer.php'); ?>