<?php 
    session_start();

    $page_title = "My Order"; 
    include '../Functions/userfunctions.php';
    include('../Functions/authenticate.php');
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
                My Orders
        </h6>
    </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tracking No</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $orders = getOrders();

                            if (mysqli_num_rows($orders) > 0)
                            {
                                foreach($orders as $item){
                                    ?>
                                        <tr>
                                            <td><?= $item['id']; ?></td>
                                            <td><?= $item['tracking_no']; ?></td>
                                            <td><?= $item['total_price']; ?></td>
                                            <td><?= $item['created_at']; ?></td>
                                            <td>
                                                <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View details</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }else{
                                ?>
                                    <tr>
                                        <td colspan="5">No Orders yet</td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                    $orders = getOrders();

                    if (mysqli_num_rows($orders) > 0)
                    {
                        foreach($orders as $item){

                        }
                    }else{
                        echo "No data available";
                    }
                ?>
            </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>


  