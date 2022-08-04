<?php
include('head.php');
include('./admin/config.php');
?>
<?php
$name = $_GET['name'];
?>

<div class="px-4 py-5 my-3 text-center">
  <img class="d-block mx-auto mb-4" src="./img/logo.jpg" alt="logo" width="72" height="57">
  <h1 class="display-5 fw-bold">Search By Name</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Best place to look for any hotels near you and at the best prices.</p>
  </div>
</div>



<div class="album py-5 bg-light">
  <div class="container">

    <div class="row mt-4 row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      $query = "SELECT * FROM hotels WHERE name Like '%$name%'";
      $data = mysqli_query($conn, $query);
      $total = mysqli_num_rows($data);
      if ($total != 0) {
        while ($result = mysqli_fetch_assoc($data)) {
      ?>

          <div class="col">
            <div class="card shadow-lg">
              <img src="./img/hotels/<?= $result['img'] ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" />

              <div class="card-body">
                <h2 class="card-text"><?= $result['name'] ?></h2>
                <div class="row">
                  <div class="col-6">
                    <p>Location : <?= $result['location'] ?></p>
                  </div>
                  <div class="col-6">
                    <p>Time: <?= $result['time'] ?></p>
                  </div>
                </div>
                <div class="row">
                  <?php

                  switch ($result['rating']) {
                    case 1:
                      echo "<p style='color:yellow'><i class='fas fa-star'></i></p>";
                      break;
                    case 2:
                      echo "<p style='color:yellow'><i class='fas fa-star'></i> <i class='fas fa-star'></i></p>";
                      break;
                    case 3:
                      echo "<p style='color:yellow' ><i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i></p>";
                      break;
                    case 4:
                      echo "<p style='color:yellow'><i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i></p>";
                      break;
                    case 5:
                      echo "<p style='color:yellow'><i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i> <i class='fas fa-star'></i></p>";
                      break;
                    default:
                      echo "no rating";
                      break;
                  }

                  ?>
                </div>
                <h3 style="color:red">&#8377;<?= $result['price'] ?></h3>
              </div>
            </div>
          </div>

      <?php
        }

      }else{
        echo "no records found";
      }
      ?>

    </div>
  </div>
</div>


<?php include('footer.php') ?>