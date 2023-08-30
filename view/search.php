<?php
session_start();
include ('../Functions/searchfunction.php');
include('../includes/header.php');

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
                    <div class="card" style="border-radius: 20px;
                                                width: 16pc;
                                                height: 26pc;
                                                margin-top: 4pc;
                                                margin-left: 10pc;">

                                            <a href="/Web_Clothes_php/view/product-view.php?product=<?= $item['slug']; ?>">
                                                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light" style="width: 16pc;
    height: 21pc;
    margin-left: -12px;">
                                                    <img src="/Web_Clothes_php/uploads/<?= $item['image']; ?>" class="w-100" style="    height: 19pc;border-top-left-radius: 20px;border-top-right-radius: 20px;" />
                                                    <a href="/Web_Clothes_php/view/product-view.php?product=<?= $item['slug']; ?>">

                                                        <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                
                                                    <a href="/Web_Clothes_php/view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
                                                        <p style="font-weight: 700;font-size: 20px;;text-align:center"><?= $item['name']; ?></p>
                                                    </a>
                                                    <h6 class="mb-3" style="font-size: 16px;text-align:center">
                                                        <s>$<?= $item['original_price']; ?></s><strong class="ms-2 text-danger">$<?= $item['selling_price']; ?></strong>
                                                    </h6>
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
                    <div class="card" style="border-radius: 20px;
                                                width: 16pc;
                                                height: 26pc;
                                                margin-top: 4pc;
                                                margin-left: 10pc;">

                                            <a href="/Web_Clothes_php/view/product-view.php?product=<?= $item['slug']; ?>">
                                                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light" style="width: 16pc;
    height: 21pc;
    margin-left: -12px;">
                                                    <img src="/Web_Clothes_php/uploads/<?= $item['image']; ?>" class="w-100" style="    height: 19pc;border-top-left-radius: 20px;border-top-right-radius: 20px;" />
                                                    <a href="/Web_Clothes_php/view/product-view.php?product=<?= $item['slug']; ?>">

                                                        <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                
                                                    <a href="/Web_Clothes_php/view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
                                                        <p style="font-weight: 700;font-size: 20px;;text-align:center"><?= $item['name']; ?></p>
                                                    </a>
                                                    <h6 class="mb-3" style="font-size: 16px;text-align:center">
                                                        <s>$<?= $item['original_price']; ?></s><strong class="ms-2 text-danger">$<?= $item['selling_price']; ?></strong>
                                                    </h6>
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

<?php include('../includes/footer.php'); ?>
