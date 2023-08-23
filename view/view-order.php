<?php 
session_start();
    $page_title = "View Order"; 
    include ('../Functions/userfunctions.php');
    
    include('../Functions/authenticate.php');

    if (isset($_GET['t'])) // t ở đây nằm ở my-order.php trong thẻ <a> class="view-order.php?t=   <------- " </a> 
    {
        $tracking_no = $_GET['t'];

        $orderData = checkTrackingNoValid($tracking_no);
        if (mysqli_num_rows($orderData) < 0)
        {
            ?>
                <h4>Something went wrong</h4>
            <?php
            die();
        }

    }else{
        ?>
            <h4>Something went wrong 12</h4>
        <?php
        die();

    }
    $data = mysqli_fetch_array($orderData);
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
            <a class="text-dark" href="../view/my-orders.php">
                My Orders / 
            </a>
                View Orders
        </h6>
    </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <span class="text-white fs-4">View Order</span>
                        <a href="../view/my-orders.php" class="float-end btn btn-warning"><i class="fa fa-reply"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Delivery Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                         <label class="fw-bold">Name</label>
                                         <div class="border p-1">
                                             <?= $data['name']; ?>
                                         </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                         <label class="fw-bold">Email</label>
                                         <div class="border p-1">
                                             <?= $data['email']; ?>
                                         </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                         <label class="fw-bold">Phone</label>
                                         <div class="border p-1">
                                             <?= $data['phone']; ?>
                                         </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                         <label class="fw-bold">Tracking No</label>
                                         <div class="border p-1">
                                             <?= $data['tracking_no']; ?>
                                         </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                         <label class="fw-bold">Address</label>
                                         <div class="border p-1">
                                             <?= $data['address']; ?>
                                         </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                         <label class="fw-bold">Pin code</label>
                                         <div class="border p-1">
                                             <?= $data['pincode']; ?>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $userId = $_SESSION['auth_user']['user_id'];
                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, products p  WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no' ";
                                            $order_query_run = mysqli_query($con, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                                    ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <img src="../uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?> " width="50px">
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= $item['price']; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                x <?= $item['orderqty']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <hr>
                                <h4>Total Price : <span class="float-end fw-bold"><?= $data['total_price']; ?>.00 $</span></h4>
                                <hr>
                                <label class="fw-bold">Payment Mode</label>
                                <div class="border p-1 md-3">
                                    <?= $data['payment_mode']; ?>
                                </div>
                                <label class="fw-bold">Status</label>
                                <div class="border p-1 md-3">
                                    <?php
                                        if ($data['status'] == 0)
                                        {
                                            echo "Under Process";
                                        }
                                        else if($data['status'] == 1)
                                        {
                                            echo "Completed";

                                        }else if($data['status'] == 2)
                                        {
                                            echo "Cancelled";

                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

</body>
</html>
  