

<?php
session_start();
$page_title = "Home Page";
// include('../functions/homecode.php');
include('../Functions/userfunctions.php');

include('../view/header.php');
include('../view/slider2.php');
// include('../../db/connect.php');

?>

<?php
    if (isset($_GET['category']))
    {
        $category_slug = $_GET['category'];
        $category_data = getSlugActive("categories",$category_slug);
        $category = mysqli_fetch_array($category_data);
    
        if ($category)
        {
            $cid = $category['id'];
        ?>
    
            <div class="py-3">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <h1><?= $category['name']; ?></h1>
                    <hr>
                    <div class="row">
                        <?php 
                            $products = getProdByCategory($cid);
                            
                            if (mysqli_num_rows($products) > 0)
                            {
                                foreach($products as $item)
                                {
                                    ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="product-view.php?product=<?=$item['slug']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body mt-2">
                                                    <img src="../uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                                    <h4 class="text-center mt-2"><?= $item['name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
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
    
        <?php 
        }
        else
        {
            echo "Something went wrong";
        }
    }
    else
    {
        echo "Something went wrong";
    }
    
    ?>


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
