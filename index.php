

<?php
session_start();
$page_title = "Home Page";
include('./functions/homecode.php');
include('./includes/header.php');
include('./includes/slider.php');

?>

<div class="py-5">
    <!-- <div class="container"> -->
    <h4 style="margin-left: 4pc;
    font-size: 2pc;
    font-weight: 500;">Trending Products</h4>
    <div class="underline mb-2" style="margin-left: 4pc;"></div>
    <div class="row">

        <div class="col-md-12">

            <div class="owl-carousel">


                <?php
                $trendingProducts = getAllTrending();
                if (mysqli_num_rows($trendingProducts) > 0) {
                    foreach ($trendingProducts as $item) {
                ?>
                        <div class="card" style="border-radius: 20px;
                                                width: 16pc;
                                                height: 26pc;
                                                margin-top: 2pc;
                                                margin-left: 3pc;">

                            <a href="view/product-view.php?product=<?= $item['slug']; ?>">
                                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light" style="width: 16pc;height: 21pc;">
                                    <img src="./uploads/<?= $item['image']; ?>" class="w-100" style="    height: 19pc;border-top-left-radius: 20px;border-top-right-radius: 20px;" />
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>">

                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <!-- <a href="view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
                                    <h5 class="card-title mb-3" style="font-weight: 700;font-size: 24px;"><?= $item['name']; ?></h5>
                                </a> -->
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
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

            </div>
        </div>
    </div>
</div>
</div>



<div class="py-5">
<h4 style="margin-left: 10pc;
    font-size: 2pc;
    font-weight: 500;"> Products</h4>
    <div class="underline mb-2" style="margin-left: 10pc;width:5pc"></div>
                <div class="row" style="margin-left:11pc;">
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
                                                margin-top: 2pc;
                                                margin-left: 3pc;">

                            <a href="view/product-view.php?product=<?= $item['slug']; ?>">
                                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light" style="width: 16pc;height: 21pc;">
                                    <img src="./uploads/<?= $item['image']; ?>" class="w-100" style="    height: 19pc;border-top-left-radius: 20px;border-top-right-radius: 20px;" />
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>">

                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <!-- <a href="view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
                                    <h5 class="card-title mb-3" style="font-weight: 700;font-size: 24px;"><?= $item['name']; ?></h5>
                                </a> -->
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
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
                        } else {
                            ?>
                            <div class="card card-body text-center shadow">
                                <h4 class="py-3">There are no products to search for</h4>
                            </div>
                            <?php
                        }
                    } else {
                        $homeProducts = getProducts();

                        if (mysqli_num_rows($homeProducts) > 0) {
                            foreach ($homeProducts as $item) {
                            ?>
                                <div class="card" style="border-radius: 20px;
                                                width: 16pc;
                                                height: 26pc;
                                                margin-top: 2pc;
                                                margin-left: 6pc;">

                            <a href="view/product-view.php?product=<?= $item['slug']; ?>">
                                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light" style="width: 16pc;
    height: 21pc;
    margin-left: -12px;">
                                    <img src="./uploads/<?= $item['image']; ?>" class="w-100" style="    height: 19pc;border-top-left-radius: 20px;border-top-right-radius: 20px;" />
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>">

                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <!-- <a href="view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
                                    <h5 class="card-title mb-3" style="font-weight: 700;font-size: 24px;"><?= $item['name']; ?></h5>
                                </a> -->
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>" class="text-reset">
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
                        <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination float-end">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <?php
                            $products = getAll('products');
                            $products_count = mysqli_num_rows($products);
                            $products_button = ceil($products_count / 8);
                            $i = 1;
                            for ($i; $i <= $products_button; $i++) {
                                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                            }
                            ?>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav> -->
                    <?php
                    }
                    ?>
                
            </div>
        </div>
   

<!-- Discount Section Begin -->
<section class="discount" style="margin-top: 5pc;">
    <div class="container">
        <div class="row" >
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="img/discount.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!--  -->

<?php include('./includes/footer.php'); ?>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    });
</script>
<script type="text/javascript">
    $("#reloader").click(function() {
        $("#content").load("#content");
    });
</script>
<?
