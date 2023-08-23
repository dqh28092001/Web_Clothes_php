<?php

include ('./Functions/searchfunction.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Products</h4>
                <div class="underline mb-2"></div>
                <div class="row">
                    <?php 
                if (isset($_POST['search_btn'])) {

                  $data = $_POST['search_data'];
                  $searchProducts = getSearch($data);
                  
                  if (mysqli_num_rows($searchProducts) > 0) {
                    foreach ($searchProducts as $item) {
                      ?>
                    <div class="col-md-3 mb-2">
                        <a href="view/product-view.php?product=<?=$item['slug']; ?>">
                            <div class="card">
                                <div class="card-body mt-2">
                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                    <h6 class="text-center mt-2"><?= $item['name']; ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                  }else{
                    ?>
                    <div class="card card-body text-center shadow">
                        <h4 class="py-3">There are no products to search for</h4>
                    </div>
                    <?php 
                  }
                }else{
                  $homeProducts = getProducts();
                  
                  if (mysqli_num_rows($homeProducts) > 0)
                  {
                    foreach ($homeProducts as $item)
                    {
                      ?>
                    <div id="content" class="col-md-3 mb-2">
                        <a href="view/product-view.php?product=<?=$item['slug']; ?>">
                            <div class="card">
                                <div class="card-body mt-2">
                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                    <h6 class="text-center mt-2"><?= $item['name']; ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                  }
                  ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination float-end">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <?php 
                        $products = getAll('products');
                        $products_count = mysqli_num_rows($products);
                        $products_button = ceil($products_count / 8);
                        $i = 1;
                        for($i; $i <= $products_button; $i++){ 
                          echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                        } 
                      ?>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                    <?php 
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

