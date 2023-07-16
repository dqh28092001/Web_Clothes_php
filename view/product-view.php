<?php 
session_start();
$page_title = "Products"; 
include('../Functions/userfunctions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../../css/form.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Alertify Js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />
</head>
<body>
    <?php
    
if (isset($_GET['product']))
{
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products",$product_slug);
    $product = mysqli_fetch_array($product_data);
    
    if ($product)
    {
        ?>
        <div class="bg-light py-4">
            <div class="py-3 bg-light">
                <div class="container">
                    <h6 class="text-dark">
                        <a href="../index.php" class="text-dark">Home /</a>
                        <a href="../view/categories.php" class="text-dark">Collections / </a>
                        <?= $product['name']; ?></h6>
                </div>
            </div>
            <div class="container product_data">
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="shadow p-3">
                            <img src="../uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name']; ?>
                            <span class="float-end text-danger"><?php if($product['name']){echo "Trending";} ?></span>
                        </h4>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <hr>
                        <div class="row text-danger">
                            <div class="col-md-6">
                                <h5> Price : <span class="text-danger"><s><?= $product['original_price']; ?></s> $</span></h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Price : <span class="text-success"><?= $product['selling_price']; ?> $</span></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width: 110px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                            </div>
                        </div>
                        <hr>
                        <h6>Product Description</h6>
                        <p><?= $product['description']; ?></p>
                        <hr>
                        <section>
                            <div class="container ">
                                <div class="col-md-12 ">
                                    <div class="card">
                                    <?php 
                                        $prod_id = $product['id'];
                                        $userId = $_SESSION['auth_user']['user_id'];
                                        $data_cmt = comment($prod_id);

                                        foreach($data_cmt as $item){
                                            ?>
                                            <div class="card-body">
                                                <div class="d-flex flex-start align-items-center">
                                                    <div>
                                                        <h6 class="fw-bold text-primary mb-1"><?=$item['name'] ?></h6>
                                                    </div>
                                                </div>
    
                                                <p class="ms-4">
                                                    <?=$item['content'] ?>
                                                </p>
                                            </div>
                                            <?php 
                                        }
                                    ?>
                                        <form action="../Functions/commentcode.php" method="POST">
                                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                                <div class="d-flex flex-start w-100">
                                                    <div class="form-outline w-100">
                                                        <label class="form-label" for="textAreaExample">Message</label>
                                                        <textarea class="form-control" id="textAreaExample" name="ct_cmt" rows="2"
                                                        style="background: #fff;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="float-end pt-1">
                                                    <input type="hidden" name="prod_id" value="<?= $product['id']?>">
                                                    <input type="submit" name="add_comment" class="btn btn-primary btn-sm"></input>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <?php 
    }else
    {
        echo "Product Not Found";
    }
}
else
{
    redirect("../index.php","Something went wrong");
}

    ?>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
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



