
<?php
include("../../db/connect.php");
include('../../Functions/locgiasp.php');

?>


<?php
if(isset($_POST['min_price']) && isset($_POST['max_price'])) {

    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];

    $query = "SELECT * FROM products WHERE locgiasp = '1' AND selling_price BETWEEN '$min_price' AND '$max_price' ";
    
    $r = mysqli_query($con, $query);
    $count = mysqli_num_rows($r);
    
  
    if ($count == 0) {
        echo "Sorry,No data found";
    }
?>
    <div class="row">
        <?php

       while($row = mysqli_fetch_assoc($r)){
        $name = $row['name'];
        $slug = $row['slug'];
        $small_description = $row['small_description'];
        $description = $row['description'];
        $original_price = $row['original_price'];
        $selling_price = $row['selling_price'];
        $image = $row['image'];
        $qty = $row['qty'];
        $status = $row['status'];
        $trending = $row['trending'];
        $meta_title = $row['meta_title'];
        $meta_keywords = $row['meta_keywords'];
        $meta_description = $row['meta_description'];

      
        ?>
                <div class="card" style="border-radius: 20px;
                                                width: 16pc;
                                                height: 26pc;
                                                margin-top: 4pc;
                                                margin-left: 10pc;">

<a href="/WEB_CLOTHES_PHP/view/product-view.php?product=<?php echo $slug ?>" >
                                                <div class="bg-image hover-zoom ripple" data-mdb-ripple-color="light" style="width: 16pc;
    height: 21pc;
    margin-left: -12px;">
                                                    <img src="/WEB_CLOTHES_PHP/uploads/<?php echo $image ?>" class="w-100" style="    height: 19pc;border-top-left-radius: 20px;border-top-right-radius: 20px;" />
                                                    <a href="/WEB_CLOTHES_PHP/view/product-view.php?product=<?php echo $slug ?>" >

                                                        <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                 
                                                    <a href="/WEB_CLOTHES_PHP/view/product-view.php?product=<?php echo $slug ?>" class="text-reset">
                                                        <p style="font-weight: 700;font-size: 20px;;text-align:center"><?php echo $name ?></p>
                                                    </a>
                                                    <h6 class="mb-3" style="font-size: 16px;text-align:center">
                                                        <s>$<?php echo $original_price ?></s><strong class="ms-2 text-danger">$<?php echo $selling_price  ?></strong>
                                                    </h6>
                                                </div>
                                            </a>
                                        </div>
                
       <?php } ?>

    </div>

<?php
}
?> 