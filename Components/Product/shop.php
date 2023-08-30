<?php
session_start();
$page_title = "Home Page";
include('../../Functions/shopsoluonh.php');
include('../../Components/Product/fetch.php');
include('../../includes/header.php');

?>



<body>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->


    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar" style="margin-left: 11pc;">
                        <div class="sidebar__categories">
                            <!-- <div class="section-title">
                                <h4>Categories</h4>
                            </div> -->
                            <div class="categories__accordion">
                                <div class="sidebar__filter">
                                    <div class="section-title">
                                        <h4>Shop by price</h4>
                                    </div>
                                    <div class="price-range-block">

                                        <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

                                        <div style="margin:30px auto">
                                            <input type="number" min=0 max="500" oninput="validity.valid||(value='500');" id="min_price" class="price-range-field" />
                                            <input type="number" min=0 max="500" oninput="validity.valid||(value='500');" id="max_price" class="price-range-field" />
                                        </div>
                                    </div>

                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne">Women</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Men</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree">Kids</a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFour">Accessories</a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFive">Cosmetic</a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Coats</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">T-shirts</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar__sizes">
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list">
                                <label for="xxs">
                                    xxs
                                    <input type="checkbox" id="xxs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xs">
                                    xs
                                    <input type="checkbox" id="xs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xss">
                                    xs-s
                                    <input type="checkbox" id="xss">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="s">
                                    s
                                    <input type="checkbox" id="s">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="m">
                                    m
                                    <input type="checkbox" id="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="ml">
                                    m-l
                                    <input type="checkbox" id="ml">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="l">
                                    l
                                    <input type="checkbox" id="l">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xl">
                                    xl
                                    <input type="checkbox" id="xl">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list color__list">
                                <label for="black">
                                    Blacks
                                    <input type="checkbox" id="black">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="whites">
                                    Whites
                                    <input type="checkbox" id="whites">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="reds">
                                    Reds
                                    <input type="checkbox" id="reds">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greys">
                                    Greys
                                    <input type="checkbox" id="greys">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="blues">
                                    Blues
                                    <input type="checkbox" id="blues">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="beige">
                                    Beige Tones
                                    <input type="checkbox" id="beige">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greens">
                                    Greens
                                    <input type="checkbox" id="greens">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="yellows">
                                    Yellows
                                    <input type="checkbox" id="yellows">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <div id="searchResults" class="search-results-block">
                            <div class="row">

                                <?php

                                $homeProducts = getProducts();

                                if (mysqli_num_rows($homeProducts) > 0) {
                                    foreach ($homeProducts as $item) {
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
                            </div>


                        </div>

                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination float-end" style="justify-content: center;">

                                        <?php
                                        $products = getAll('products');
                                        $products_count = mysqli_num_rows($products);
                                        $products_button = ceil($products_count / 8);
                                        $i = 1;
                                        for ($i; $i <= $products_button; $i++) {
                                            echo '<li class="page-item">
                                    <a class="page-link" 
                                    style="border-radius: 20px;
                                    margin-right: 7px;
                                    justify-content: center;
                                    display: flex;
                                    align-items: center;" 
                                    href="../../Components/Product/shop.php?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        ?>
                                        <a href="#"><i class="fa fa-angle-right"></i></a>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

            $("#min_price , #max_price").on('keyup', function() {
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
<!-- Shop Section End -->
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery-3.6.0.min.js"></script>
<script src="../../assets/js/custom.js"></script>
<script src="../../assets/js/owl.carousel.min.js"></script>


<!-- Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php
    if (isset($_SESSION['status'])) {
    ?>
        alertify.success('<?= $_SESSION['status'] ?>');
    <?php
        unset($_SESSION['status']);
    }
    ?>
</script>


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

        $("#min_price , #max_price").on('keyup', function() {
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
<?php
include('../../includes/footer.php');
?>