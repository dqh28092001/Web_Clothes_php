<?php
$page_title = "Home Page";
include('./Functions/homecode.php');
include('./Components/Product/fetch.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline mb-2"></div>
                    <div class="owl-carousel">
                        <?php
                        $trendingProducts = getAllTrending();
                        if (mysqli_num_rows($trendingProducts) > 0) {
                            foreach ($trendingProducts as $item) {
                        ?>
                                <div class="item">
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>">
                                        <div class="card">
                                            <div class="card-body mt-2">
                                                <img src="./uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                                <h6 class="text-center mt-2"><?= $item['name']; ?></h6>
                                                <h6 style="margin-left: 3pc;display:flex" class="cart__price">Price : <p style="color:red"><?= $item['selling_price']; ?>.00 $</p>
                                                </h6>

                                            </div>
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="display:flex;justify-content: space-between;">
                        <h4>Products</h4>

                        
                        
                        <div class="price-range-block">
                        <h2>Tìm Giá Sản Phẩm</h2>
                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

                            <div style="margin:30px auto">
                                <input type="number" min=0 max="500" oninput="validity.valid||(value='500');" id="min_price" class="price-range-field" />
                                <input type="number" min=0 max="500" oninput="validity.valid||(value='500');" id="max_price" class="price-range-field" />
                            </div>
                        </div>
                       

                        </div>

                    </div>
                    <div class="underline mb-2"></div>
                    <div id="searchResults" class="search-results-block">
                    <div class="row">

                        <?php

                        $homeProducts = getProducts();

                        if (mysqli_num_rows($homeProducts) > 0) {
                            foreach ($homeProducts as $item) {
                        ?>
                                <div id="content" class="col-md-3 mb-2">
                                    <a href="view/product-view.php?product=<?= $item['slug']; ?>">
                                        <div class="card">
                                            <div class="card-body mt-2">
                                                <img src="./uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                                <h6 class="text-center mt-2"><?= $item['name']; ?></h6>
                                                <h6 style="margin-left: 3pc;display:flex" class="cart__price">Price : <p style="color:red"><?= $item['selling_price']; ?> $</p>
                                                </h6>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination float-end">
                                <li class="page-item"><a class="page-link" href="/Web_Clothes_php/index.php">Previous</a></li>
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
                        </nav>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            function filterProducts() {

                $("#searchResults").html("<p>Loading....</p>")
                var min_price = $("#min_price").val();
                var max_price = $("#max_price").val();

                // alert(min_price + max_price);


                $.ajax({
                    url: "/WEB_CLOTHES_PHP/Components/Product/fetch_data.php",
                    type: "POST",
                    data: {
                        min_price: min_price,
                        max_price: max_price
                    },
                    success: function(data) {

                        $("#searchResults").html(data);
                    }
                });
            }

            $("#min_price , #max_price").on('keyup', function(){
                filterProducts();

            });
            $("#slider-range").slider({
                range: true,
                orientation: "horizontal",
                min: 0,
                max: 1000,
                values: [0, 1000],
                step: 100,

                slide: function(event, ui) {
                    if (ui.values[0] == ui.values[1]) {
                        return false;
                    }

                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);

                    filterProducts();

                }
            });

            $("#min_price").val($("#slider-range").slider("values", 0));
            $("#max_price").val($("#slider-range").slider("values", 1));

        })
    </script>


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
</body>

</html>