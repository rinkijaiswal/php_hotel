<?php
include('head.php');
include('./admin/config.php');
?>
<?php
$price = $_GET['price'];
$sp = explode("-", $price);
$price1 = $sp[0];
$price2 = $sp[1];
?>
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row mt-4 row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            $query = "SELECT * FROM hotels WHERE price <= '$price2' AND price >='$price1'";
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
                                        <p>Locatiocn: <?= $result['location'] ?></p>
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
                echo "No record found";
            }
            ?>

        </div>
    </div>
</div>


<?php include('footer.php') ?>