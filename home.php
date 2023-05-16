<?php include 'header.php'; 
if ($interface == 'admin') { 
  if (isset($_REQUEST['category'])) { ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Category Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=HOME_URL; ?>">Home</a></li>
          <li class="breadcrumb-item">Category</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category, <a href="?add-category" class="btn btn-primary">Add Category</a></h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Drugs</th>
                  </tr>
                </thead>
                <tbody>
                <?php $cate = $dbh->query("SELECT * FROM category ");
                $x = 1;
                while ($row = $cate->fetch(PDO::FETCH_OBJ)) { ?>
                  <tr>
                    <td><?=$x++; ?></td>
                    <td><?=$row->cat_name; ?></td>
                    <td><a href="?add-drug=<?=base64_encode($row->cat_id); ?>" class="btn btn-primary">Add Drug</a> <br> 
                      <?php $dt = $dbh->query("SELECT * FROM drug_store WHERE cat_id = '".$row->cat_id."' ");
                      $a = 1; 
                      while ($rx = $dt->fetch(PDO::FETCH_OBJ)) { ?>
                         <h6><span class="badge bg-primary"><?=$a++; ?></span>. <?=$rx->drug_name; ?></h6>
                         <hr>
                        <!-- `drug_id`, `cat_id`, `drug_name`, `drug_qnty`, `drug_buying_price`, `drug_selling_price`, `manufacturer_name`, `manufacturer_phone`, `manufacturer_location`, `expiry_date` -->
                         <p class="card-body alert alert-primary">
                          Drug: <?=$rx->drug_name; ?><br>
                          Qnty: <?=$rx->drug_qnty; ?><br>
                          Buying Price: <?=$rx->drug_buying_price; ?><br>
                          Selling Price: <?=$rx->drug_selling_price; ?><br>
                          Manufucturer: <?=$rx->manufacturer_name; ?><br>
                          Manufucturr Phone: <?=$rx->manufacturer_phone; ?><br>
                          Manufucturer Address: <?=$rx->manufacturer_location; ?><br>
                          Expiry Date: <?=$rx->expiry_date; ?>
                         </p>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <?php }elseif (isset($_REQUEST['add-drug'])) {
    $cat_id = base64_decode($_GET['add-drug']);
    $res = $dbh->query("SELECT * FROM category WHERE cat_id = '$cat_id' ");
    $ro = $res->fetch(PDO::FETCH_OBJ);
   ?>
     <main id="main" class="main">
    <div class="pagetitle">
      <h1>Drug Store Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=HOME_URL; ?>">Home</a></li>
          <li class="breadcrumb-item">Drug Store</li>
          <li class="breadcrumb-item active">Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category Form</h5>
              <!-- General Form Elements -->
              <form method="POST" action="">
                <input type="hidden" value="<?=$ro->cat_id; ?>" name="cat_id">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" readonly value="<?=$ro->cat_name; ?>" name="cat_name" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Drug Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="drug_name" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Drug Quantity</label>
                  <div class="col-sm-10">
                    <input type="text" name="drug_qnty" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Drug Buying Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="drug_buying_price" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Drug Selling Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="drug_selling_price" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Manufucturer's Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="manufacturer_name" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Manufucturer Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="manufacturer_phone" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Manufucturer Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="manufacturer_location" required class="form-control">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Drug Expiry Date</label>
                  <div class="col-sm-10">
                    <input type="date" min="<?=$today; ?>" name="expiry_date" required class="form-control">
                  </div>
                </div>
                <!-- `drug_id`, `cat_id`, `drug_name`, `drug_qnty`, `drug_buying_price`, `drug_selling_price`, `manufacturer_name`, `manufacturer_phone`, `manufacturer_location`, `expiry_date` -->
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="drug_btn" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <?php }elseif (isset($_REQUEST['users'])) { ?>
 <main id="main" class="main">
    <div class="pagetitle">
      <h1>User's Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=HOME_URL; ?>">Home</a></li>
          <li class="breadcrumb-item">User's</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Date Registered</th>
                  </tr>
                </thead>
                <tbody>
              <!-- `userid`, `name`, `email`, `password`, `u_type`, `date_registered` -->
              <?php $users = dbSQL("SELECT * FROM users ");
              $x = 1;
                foreach ($users as $val) { ?>
                  <tr>
                    <th scope="row"><?=$x++; ?></th>
                    <td><?=$val->name; ?></td>
                    <td><?=$val->email; ?></td>
                    <td><?=$val->u_type; ?></td>
                    <td><?=$val->date_registered; ?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <?php }elseif (isset($_REQUEST['add-category'])) { ?>
    <main id="main" class="main">
    <div class="pagetitle">
      <h1>Category Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=HOME_URL; ?>">Home</a></li>
          <li class="breadcrumb-item">Category</li>
          <li class="breadcrumb-item active">Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category Form</h5>
              <!-- General Form Elements -->
              <form method="POST" action="">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="cat_name" required class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="category_btn" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <?php }elseif (isset($_REQUEST[''])) { ?>

  <?php }elseif (isset($_REQUEST[''])) { ?>

  <?php }elseif (isset($_REQUEST[''])) { ?>

  <?php }elseif (isset($_REQUEST[''])) { ?>
  
  <?php }else{ ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Categories</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <?php $category = $dbh->query("SELECT * FROM category ")->rowCount(); ?>
                      <h6><?=number_format($category); ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Products | Drugs</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <?php $drugs = $dbh->query("SELECT * FROM drug_store ")->rowCount(); ?>
                      <h6><?=number_format($drugs); ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Total Sales</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      ugx
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Users <span>| No. Of Users</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person"></i>
                    </div>
                    <div class="ps-3">
                    <?php $user = $dbh->query("SELECT * FROM users ")->rowCount(); ?>
                      <h6><?=number_format($user); ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
  </main><!-- End #main -->
  <?php } ?>

<?php }elseif ($interface == 'moderator') { ?>
  
<?php }else{ ?>

<?php } ?>
<?php include 'footer.php'; ?>