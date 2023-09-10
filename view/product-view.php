<?php
session_start();
$page_title = "Home Page";
// include('../functions/homecode.php');
include('../Functions/userfunctions.php');

include('../view/header.php');
include('../view/slider2.php');
// include('../../db/connect.php');

?>

<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <!-- PHP read -->
            <?php

            if (isset($_GET['product'])) {
                $product_slug = $_GET['product'];
                $product_data = getSlugActive("products", $product_slug);
                $row = mysqli_fetch_array($product_data);
                if ($row)
                {

             
                    $name = $row['name'];
                    $selling_price = $row['selling_price'];
                    $formattedPrice = number_format($selling_price, 2, '.', ',');
                    $slug = $row['slug'];
                    $description = $row['description'];
                    $image = $row['image'];
                    // $color = $row['color'];
                    $qty = $row['qty'];
            ?>
                    <div class="col-lg-5 mt-5">
                        <div class="card mb-3">
                            <img class="card-img img-fluid"src="../uploads/<?php echo $image; ?>" alt="Card image cap" id="product-detail">
                        </div>
                    </div>
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="h2">
                                    <?php echo $name; ?>
                                </h1>
                                <p class="h3 py-2">Price:
                                    <?php echo '$' . $formattedPrice; ?>
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Brand:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>
                                                <?php echo $slug; ?>
                                            </strong></p>
                                    </li>
                                </ul>
                                <h6>Description:</h6>
                                <p>
                                    <?php echo $description; ?>
                                </p>
                              
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Số Lượng Hiện Có:</h6>
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>
                                                <?php echo $qty; ?>
                                            </strong></p>
                                    </li>
                                </ul>
                                <form method="POST">
                                    <input type="hidden" id="idproduct" value="<?php echo $_GET['product']; ?>">
                                    <div class="row">
                                        <div class="col-auto">
                                            <ul class="list-inline pb-3">
                                                <li class="list-inline-item text-right">
                                                    Quantity:
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-success btn-number" data-type="minus" data-field="product-quantity">
                                                                -
                                                            </button>
                                                        </span>
                                                        <input type="number" name="product-quantity" id="product-quantity" class="form-control col-5 ml-1 mr-1" value="1" />
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="product-quantity">
                                                                +
                                                            </button>
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="ml-3 mb-3" id="result" style="color: red;"></div>
                                        <div class="col-12 d-grid">
                                            <button type="button" class="btn btn-success btn-lg" name="addtocart" id="addtocart">Add To Cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                } else {
                    echo '<p>No product found.</p>';
                }
            } else {
                echo '<p>Invalid product ID.</p>';
            }
        
            mysqli_close($con);
            ?>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        view_data();

        function view_data() {
            $.post('../Functions/listproduct.php', function(data) {
                $("#load_data").html(data);
            });
        }
        $('#product-quantity').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        $(document).on('click', '#addtocart', function() {
            
            var id = $('#idproduct').val();
            var quantity = $('input[name="product-quantity"]').val(); // Lấy giá trị số lượng từ trường nhập liệu
            $.ajax({
                type: 'POST',
                url: '../Functions/addtocart.php',
                data: {
                    id: id,
                    quantity: quantity
                },
                dataType: 'json',
                success: function(response) {
                    var color = "red";
                    if (response.message == "true") {
                        var color = "linear-gradient(to right, #00b09b, #96c93d)";
                        response.message = "Thêm Thành Công";
                    }
                    
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        // destination: "https://github.com/apvarun/toastify-js",
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: color,
                        },
                        onClick: function() {} // Callback after click
                    }).showToast();
                    // $('#result').text(response.message);
                },
                error: function() {
                    $('#result').text('An error occurred during the AJAX request.');
                    // console.error('An error occurred during the AJAX request:', $('#result'));

                }
            });
        });

        // Xử lý sự kiện click nút (+)
        $(document).on('click', '.btn-number', function(e) {
            e.preventDefault();
            var fieldName = $(this).attr('data-field');
            var type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            if (!isNaN(currentVal)) {
                if (type === 'minus') {
                    if (currentVal > 1) {
                        input.val(currentVal - 1).change();
                    }
                } else if (type === 'plus') {
                    input.val(currentVal + 1).change();
                }
            } else {
                input.val(1);
            }
        });

      
    });
</script>
<?php include('../view/footer.php'); ?>
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
