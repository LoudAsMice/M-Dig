<?php
// error_reporting(0);
include '../assets/php/db.php';
include '../assets/php/function.php';

session_start();
if (isset($_SESSION['login'])) {
    $id = $_SESSION['id'];
    $login = query("SELECT * FROM `user` INNER JOIN user_detail ON user_detail.userid=user.id WHERE user.id = $id");
    $username = $_SESSION['username'];
    if (hash('sha256', $login[0]['username']) !== $username) {
    ?>
    <script type="text/javascript">
        window.location.href = "login.php";
    </script>
    <?php
    }else{

    }
}else{
?>
<script type="text/javascript">
    window.location.href="login.php";
</script>
<?php
}


$page = $_GET['page']; 
$action = $_GET['action'];
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Hospital Dashboard - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="../assets/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <!-- Font awesome Start -->
    <link href="../assets/vendor/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome/css/solid.css" rel="stylesheet">
    <!-- Sweetalert start -->
    <link href="../assets/vendor/sweetalert/sweetalert.css" rel="stylesheet" />
    <script src="../assets/vendor/sweetalert/sweetalert.min.js"></script>
    <!-- Sweetalert End -->
    <!-- Font awesome ENd -->
    <link rel="stylesheet" type="text/css" href="../assets/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/datatables.min.css"/>

    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/bootstrap-extended.css">

    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- CKEDITOR start -->
    <script src="../assets/vendor/ckeditor/ckeditor.js"></script>
    <!-- CKEDITOR END -->
    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="../assets/app-assets/css/pages/hospital.css">
    <!-- END: Page CSS-->
    <style type="text/css">
body {
        --ck-z-default: 100;
        --ck-z-modal: calc( var(--ck-z-default) + 999 );
    }
    </style>
    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<?php 
    require 'page/header.php';

    require 'page/leftbar.php';

    if ($login[0]['status'] == "Not Yet Verified" && $login[0]['level'] == "Masyarakat") {
        if ($login[0]['nik'] == "") {
            include 'page/verify/verify1.php';
        }elseif ($login[0]['nama_sekolah'] == "") {
            include 'page/verify/verify2.php';
        }elseif ($login[0]['pekerjaan'] == "") {
            include 'page/verify/verify3.php';
        }elseif ($login[0]['facebook'] == "") {
            include 'page/verify/verify4.php';
        }
    }elseif ($login[0]['status'] == "Verified") {
        if ($page == "" || empty($page) || !isset($page)) {
            include 'page/dashboard.php';
        }elseif($page == "surat"){
            if ($action == "") {
                include 'page/surat/table.php';
            }elseif ($action == "delete") {
                include 'page/surat/delete.php';
            }
        }elseif($page == "blog-post"){
            if ($action == "") {
                include 'page/blog-post/table.php';
            }elseif ($action == "delete") {
                include 'page/blog-post/delete.php';
            }
        }elseif($page == "category-post"){
            if ($action == "") {
                include 'page/category-post/table.php';
            } elseif ($action == "delete") {
                include 'page/category-post/delete.php';
            }
        }elseif($page == "category-surat"){
            if($action == ""){
                include 'page/category-surat/table.php';
            }elseif($action == "delete"){
                include 'page/category-surat/delete.php';
            }
        }elseif ($page == "produk") {
            if ($action == "") {
                include 'page/product/table.php';
            }elseif ($action == "delete") {
                include 'page/product/delete.php';
            }
        }elseif ($page == "agenda") {
            if ($action == "") {
                include 'page/agenda/table.php';
            }elseif ($action == "delete"){
                include 'page/agenda/delete.php';
            }
        }elseif ($page == "staff-image") {
            if ($action == "") {
                include 'page/staff-image/table.php';
            }elseif ($action == "delete"){
                include 'page/staff-image/delete.php';
            }
        }
    }
 ?>
    <!-- BEGIN: Content-->
    

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="https://1.envato.market/modern_admin" target="_blank">PIXINVENT</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="../assets/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../assets/app-assets/vendors/js/charts/chart.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../assets/app-assets/js/core/app-menu.js"></script>
    <script src="../assets/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../assets/app-assets/js/scripts/pages/appointment.js"></script>
    <script src="../assets/app-assets/js/scripts/pages/hospital-add-doctors.js"></script>
    <!-- END: Page JS-->

    <script src="../assets/app-assets/vendors/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/vendor/datatables/datatables.min.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
    $('#table').DataTable({
        responsive: true
    });
} );
</script>


<script type="text/javascript">
$(document).on("click", ".modalcategoryedit", function () {
     var myBookId = $(this).data('category');
     var status =  $(this).data('status');
     var nama =  $(this).data('nama');
     var title = $(this).data('title');
     var detail = $(this).data('detail');
     var location = $(this).data('location');
     var waktu = $(this).data('waktu');
     var categoryimage = $(this).data('categoryimage');
     
     $(".modal-body #id").val( myBookId );
     $(".modal-body .form-group #status").val( status );
     $(".modal-body .form-group #nama").val( nama );
     $(".modal-body .form-group #title").val( title );
     $(".modal-body .form-group #detail").val( detail );
     $(".modal-body .form-group #location").val( location );
     $(".modal-body .form-group #waktu").val( waktu );
     $(".modal-body .form-group #category").val( categoryimage );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>

<?php 
if ($page == "surat") {
    include 'page/surat/modal.php';
}elseif($page == "category-post"){
    include 'page/category-post/modal.php';
}elseif($page == "category-surat"){
    include 'page/category-surat/modal.php';
}elseif($page == "blog-post"){
    include 'page/blog-post/modal.php';
}elseif($page == "produk"){
    include 'page/product/modal.php';
}elseif($page == "agenda"){
    include 'page/agenda/modal.php';
}elseif($page == "staff-image"){
    include 'page/staff-image/modal.php';
}
 ?>

</body>
<!-- END: Body-->

</html>