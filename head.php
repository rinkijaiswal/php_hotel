<?php

if (isset($_POST['search'])) {
  $title = $_POST['title'];
  header("location:search.php?name=$title");
}


?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hotel Recommender App</title>
  </head>
  <body>
  <header class="p-3 text-white" style="background-color:black">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="./index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="./img/logo.jpg" class="bi me-2" width="80" height="60" />
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="./about.php" class="nav-link px-2 text-white">About</a></li>
          <li><a href="./contact.php" class="nav-link px-2 text-white">Contact</a></li>
        </ul>

        <form method="post" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <div class="row">
            <div class="col-8">
              <input name="title" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </div>
            <div class="col-4">
              <button name="search" class="btn btn-primary" type="submit">Search</button>
            </div> 
          </div>
        </form>
      </div>
    </div>
  </header>

    
    