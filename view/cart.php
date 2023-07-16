<?php 
session_start();
    $page_title = "Cart"; 
    include ('../Functions/userfunctions.php');
    
    // include('../functions/authenticate.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Css Styles -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../../css/form.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <!-- Alertify Js -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
</head>
<body>
<div class="py-3 bg-light">
    <div class="container">
        <h6>
            <a class="text-dark" href="../index.php">
                Home / 
            </a>
                Cart
        </h6>
    </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div id="mycart">
                <?php 
                $items = getCartItems();
                
                if(mysqli_num_rows($items) > 0)
                {
                ?>
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Name</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Action</h6>
                        </div>
                    </div>
                    <?php 
                    if (mysqli_num_rows($items) > 0)
                    {
                        foreach ($items as $citem)
                        {
                    ?>
                            <div class="card product_data shadow-sm mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2 p-3">
                                        <img src="../uploads/<?= $citem['image']; ?>" alt="Image" width="80px">
                                    </div>
                                    <div class="col-md-3">
                                        <h5><?= $citem['name']; ?></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>Price: <?= $citem['selling_price']; ?> $</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" class="prodId" value="<?= $citem['prod_id']; ?>">
                                        <div class="input-group mb-3" style="width: 110px;">
                                            <button class="input-group-text decrement-btn updateQty">-</button>
                                                <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty']; ?>" disabled>
                                            <button class="input-group-text increment-btn updateQty">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-danger btn-sm deteleItem" value="<?= $citem['cid']; ?>"><i class="fa fa-trash"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                    <?php 
                        }
                    }
                    ?>
                    <div class=" float-end">
                        <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                    </div>
                <?php 
                }else{
                ?>
                    <div class="card card-body text-center shadow">
                        <h4 class="py-3">Your cart is empty</h4>
                    </div>
                <?php 
                }
                ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


<!-- Footer Section End -->

<script src="../assets/js//bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>


<!-- Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
          alertify.set('notifier','position', 'top-right');
            <?php 
                if(isset($_SESSION['status']))
                {
            ?>
                    alertify.success('<?=$_SESSION['status']?>');
            <?php
                    unset($_SESSION['status']);        
                } 
            ?>
        </script>

</body>
</html>



  