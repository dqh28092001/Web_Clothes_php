
<?php
    session_start();
    require_once '../Views/Headmenu.php';

?>
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8  col-lg-4 order-lg-last">
                            <img class="img-fluid" src="../Public//img//cac-thuong-hieu-thoi-trang-noi-tieng-2.png" alt="">
                        </div>
                        <div class="col-lg-8 mb-0 d-flex align-items-center ">
                            <div class="text-align-left">
                                <h1 class="h1">Welcome to Ashion</h1>
                                <h3 class="h2">Ashion shop is reputable </h3>
                                <p>
                                Ashion sở hữu những bộ sưu tập vô cùng đa dạng, phong phú với thiết kế thủ công tinh xảo, tỉ mỉ đến từng chi tiết. 
                                Đó cũng là lý do khiến thương hiệu này trở thành cái tên số 1 thế giới trong lĩnh vực thời trang.Đó cũng là lý do khiến thương hiệu này trở thành cái tên số 1 thế giới trong lĩnh vực thời trang.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Hero -->
    <div class="row mt-4 mb-4 ml-4 mr-4">
        <div class="col-md-10 mx-auto"> <!-- Sử dụng lớp mx-auto để căn giữa -->
            <!-- product -->
            <h1 class="h1 text-center"> Products</h1>
            <div class="row" id="load_data">
                <!-- Nội dung bạn muốn chèn vào đây -->
            </div>
            <div class="text-center mt-4">
                <div id="pagination" class="pagination"></div>
            </div>
        </div>
    </div>
<?php
    require_once '../Views/Footer.php';
?>
<script> 
$(document).ready(function() {
    var currentPage = parseInt(localStorage.getItem('currentPage')) || 1;
    var totalPages = 0;

    function view_data(searchValue = null, page = null) {
        $("#load_data").empty();
        $.ajax({
            url: "../Authentication/Listproduct.php",
            type: "POST",
            data: {
                searchValue: searchValue,
                page: page || currentPage, 
            },
            success: function (data) {
                var responseData = JSON.parse(data);
                var productsHtml = responseData.products;
                var totalPages = responseData.total_pages;

                if (page === 1) {
                    $("#load_data").html(productsHtml);
                } else {
                    $("#load_data").append(productsHtml);
                }      
                updatePagination(currentPage, totalPages);
            },
        });
    }

    function updatePagination(currentPage, totalPages) {
        var paginationHtml = '';
        if(totalPages>1){
            for (var i = 1; i <= totalPages; i++) {
                paginationHtml += '<button class="page-number ' + (i === currentPage ? 'active' : '') + '">' + i + '</button>';
            }
        }
        $("#pagination").html(paginationHtml);
    }
    $(document).on('click', '.page-number', function(event) {
        event.preventDefault();
        var selectedCategory = $('.idcategory.activecustom').data('id');
        var searchValue = $("#search-input").val();
        var newPage = parseInt($(this).text()); // Trang mới chọn

        if (newPage !== currentPage) { // Chỉ thực hiện khi chọn trang mới
            view_data(searchValue, newPage);

            // Cập nhật currentPage và lưu vào localStorage
            currentPage = newPage;
            localStorage.setItem('currentPage', currentPage);
            

            // Cập nhật URL bằng pushState
            var newUrl = window.location.origin + window.location.pathname + '?page=' + currentPage;
            window.history.pushState({ page: currentPage }, '', newUrl);
        }
    });
    $("#search-btn").click(function(event) {
        var searchValue = $("#search-input").val();
        if (searchValue.trim() === "") {
            event.preventDefault(); // Ngăn chặn thực hiện tải trang
            Toastify({
                text: "Vui lòng nhập thông tin tìm kiếm",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "right", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                },
                onClick: function () { } // Callback after click
            }).showToast();
        } else {
            var searchUrl = "../Views/Search.php?search=" + encodeURIComponent(searchValue);
            window.location.href = searchUrl;
        }
    });
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('page')) {
        currentPage = parseInt(urlParams.get('page'));
    }
    view_data();
});
</script>
