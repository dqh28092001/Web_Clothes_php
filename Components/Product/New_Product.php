<?php
$page_title = "Home Page";
include('./Functions/homecode.php');
include('./Components/Product/fetch.php');
include("./Functions/categoriesfuntion.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<h4 style=" margin-left: 20pc;    font-size: 2pc;margin-top: 1pc;">Our Collections</h4>
<div  style=" margin-left: 20pc;    margin-bottom: 1pc;" class="underline mb-2"></div>

<div class="col-md-8" style="display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin-left: 20pc;">
                    <hr>
                    <div class="row" style="margin-top: 2pc;">
                        <?php
                        $categories = getAllActive("categories");

                        if (mysqli_num_rows($categories) > 0) {
                            foreach ($categories as $item) {
                        ?>
                                <div class="col-md-3 mb-2">
                                    <a href="/WEB_CLOTHES_PHP/view/products.php?category=<?= $item['slug']; ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="./uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100">
                                                <h4 class="text-center"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No data available";
                        }
                        ?>
                    </div>
                </div>



                
    <div class="py-5">
        <div class="container">
            <div class="row" >
                <div class="col-md-12">
                    <h4 style="   font-size: 2pc;margin-top: 1pc;">Trending Products</h4>
                    <div class="underline mb-2" ></div>
                    <div class="owl-carousel">
                        <?php
                        $trendingProducts = getAllTrending();
                        if (mysqli_num_rows($trendingProducts) > 0) {
                            foreach ($trendingProducts as $item) {
                        ?>
                                <div class="item">
                                    <a href="/WEB_CLOTHES_PHP/view/product-view.php?product=<?= $item['slug']; ?>">
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