<?php
session_start();
// include_once('db/connect.php');
?>


<?php
if (isset($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message']; ?> .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<?php
include('./Layout/Header/Header.php');

if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
} else {
    $tam = '';
}
if ($tam == 'trentop') {
    include('./Components/Trend/TrendTop.php');
} elseif ($tam == 'trenbottom') {
    include('./Components/Trend/TrendBotom.php');
} elseif ($tam == 'blog-detail') {
    include('./Components/Blog-Detail/blog-details.php');
} elseif ($tam == 'blog') {
    include('./Components/Blog/blog.php');
}  elseif ($tam == 'contact') {
    include('./Components/Contact/contact.php');
} elseif ($tam == 'products') {
    include('./products.php');
} elseif ($tam == 'shop') {
    include('./Components/Shop/shop.php');
} elseif ($tam == 'categories') {
    include('./view/categories.php');
} elseif ($tam == 'blog-details') {
    include('./Components/Blog-Detail/blog-details.php');
} elseif ($tam == 'search') {
    include('./view/search.php');
}elseif ($tam == 'cart') {
    include('./view/cart.php');
}  elseif ($tam == 'products') {
    include('./view/products.php');
}

else {

    include('./Components/Categories/Categories.php');
    include('./Components/Product/New_Product.php');
    include('./Components/Banner/Banner.php');
    include('./Components/Trend_Section/Trend_Section.php');
    include('./Components/Discount/Discount.php');
    include('./Components/Services_Section/Services_Section.php');
}
include('./Components/instagram/instagram.php');
include('./Layout/Footer/Footer.php');

?>