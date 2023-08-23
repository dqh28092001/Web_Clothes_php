
<?php
include("../../db/connect.php");
include('../../Functions/locgiasp.php');

?>

<!-- <?php
echo "ádfasfasdf";
?> -->

<?php
if(isset($_POST['min_price']) && isset($_POST['max_price'])) {

    $min_price = $_POST['min_price'];
    $max_price = $_POST['max_price'];

    $query = "SELECT * FROM products WHERE locgiasp = '1' AND selling_price BETWEEN '$min_price' 
    AND '$max_price' ";
    
   
    
    $r = mysqli_query($con, $query);
    $count = mysqli_num_rows($r);
    
    print_r($count) ;
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
                <div id="content" class="col-md-3 mb-2">
                    
                    <a href="view/product-view.php?product=<?php echo $slug ?>" >
                        <div class="card" style=" width: 14pc;    margin-left: 15pc;" >
                            <div class="card-body mt-2">
                                <img src="./uploads/<?php echo $image ?>" alt="Product Image" class="w-100">
                                <h6 class="text-center mt-2"><?php echo $name ?></h6>
                                <h6 style="margin-left: 3pc;display:flex" class="cart__price">Price : $<?php echo $selling_price  ?></p>
                                </h6>

                            </div>
                        </div>
                    </a>
                </div>
                
       <?php } ?>

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
<?php
}
?> 