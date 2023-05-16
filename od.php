<?php include 'root/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>drugs in the store</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <main>
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12 col-md-12">
          <div class="row">
            <div class="card info-card sales-card bg-primary">
              <h2 class="text-center text-white"><span><a style="float: left; font-size: 14px;" class="btn btn-warning" href="<?=SITE_URL; ?>"><<-- Back</a></span> 
                Online Drug Store <span style="float: right; font-size: 14px;"><a href="login" class="btn btn-warning">Login</a></span></h2>
            </div>
            <?php 
              $id = base64_decode($_GET['a']);
              $cate = $dt = $dbh->query("SELECT * FROM drug_store WHERE drug_id = '$id' ");
              $rx = $cate->fetch(PDO::FETCH_OBJ);
            ?>
            <!-- Sales Card -->
            <div class="col-lg-12 col-md-12">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Drug <span>| <?=$rx->drug_name; ?></span></h5>
                  <div class="d-flex align-items-center">
                  <!-- `order_id`, `drug_id`, `customer_name`, `customer_phone`, `customer_location`, `order_date` -->
                   <form class="" method="POST" action="">
                     <div class="form-group">
                       <label>Customer Name</label>
                       <input type="text" name="customer_name" class="form-control" required>
                     </div>
                     <div class="form-group">
                       <label>Customer Phone</label>
                       <input type="text" name="customer_name" class="form-control" required>
                     </div>
                     <div class="form-group">
                       <label>Customer Location</label>
                       <input type="text" name="customer_name" class="form-control" required>
                     </div>
                     <div class="form-group">
                       <button class="btn btn-primary" name="submit_order_btn" type="submit">Submit Order</button>
                     </div>
                   </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
  </main>
  <!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>