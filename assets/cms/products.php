<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>Dashboard - Infinity Computers</title>
      <link href="css/styles.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body class="sb-nav-fixed">
      <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
         <a class="navbar-brand" href="dashboard.php"><i class="fas fa-tools"></i> Infinity Dashboard</a>
         <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

         <!-- Navbar-->
         <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="#">Activity Log</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../Index.php">Logout</a>
               </div>
            </li>
         </ul>
      </nav>
      <div id="layoutSidenav">
         <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
               <div class="sb-sidenav-menu">
                  <div class="nav">
                     <div class="sb-sidenav-menu-heading">Core</div>
                     <a class="nav-link" href="dashboard.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                     </a>
                     <div class="sb-sidenav-menu-heading">Addons</div>
                     <a class="nav-link" href="products.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                        Products
                     </a>
                     <a class="nav-link" href="orders.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                        Orders
                     </a>
                     <a class="nav-link" href="users.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                        Users
                     </a>
                     <a class="nav-link" href="reviews.php">
                        <div class="sb-nav-link-icon"><i class="far fa-envelope"></i></div>
                        Reviews
                     </a>
                  </div>
               </div>
               <div class="sb-sidenav-footer">
                  <div class="small">Logged in as:</div>
                  Haseeb Ahmed
               </div>
            </nav>
         </div>
         <div id="layoutSidenav_content">
            <main>
               <div class="container-fluid">
                  <h1 class="mt-4">Products</h1>
                  <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item">Infinity</li>
                     <li class="breadcrumb-item">Dashboard</li>
                     <li class="breadcrumb-item active">Products</li>
                  </ol>
                  <div class="row">
                     <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="card bg-primary text-white mb-4">
                           <?php
                              include("connection.php");
                              error_reporting(0); 

                              $sql = "SELECT * FROM products";
                              $data = mysqli_query($conn, $sql);
                              $total_rows = mysqli_num_rows($data);

                              echo "<div class='card-body'>
                                       <i class='fas fa-boxes'></i>
                                       Products: ".$total_rows."
                                    </div>";
                           ?>
                           <div class="card-footer d-flex   align-items-center justify-content-between">
                              <a href="#" class="small text-white stretched-link" data-toggle="modal" data-target="#addProductModal"><i class="fas fa-plus-circle"></i> ADD PRODUCT</a>
                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- MODALS HERE -->
                  <!-- 1 Add News Product Modal -->
                  <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>

                           <form action="products.php" method="POST" enctype="multipart/form-data" >

                              <div class="modal-body">
                                 <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type='file' name='image' class='form-control'/>
                                 </div>
                                 <div class="form-group">
                                    <label>Serial #</label>
                                    <div class="input-group">
                                       <input type="text" name="serialNo" class="form-control" placeholder="Serial Number">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Name:</label>
                                    <div class="input-group">
                                       <input type="text" name="name" class="form-control" placeholder="Name">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Description:</label>
                                    <div class="input-group">
                                       <textarea type="text" name="description" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Warranty:</label>
                                    <div class="input-group">
                                       <input type="text" name="warranty" class="form-control" placeholder="Warranty">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Quantity:</label>
                                    <div class="input-group">
                                       <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Added On:</label>
                                    <div class="input-group">
                                       <input type="date" name="addedOn" class="form-control" placeholder="Date">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label>Price:</label>
                                    <div class="input-group">
                                       <input type="text" name="price" class="form-control" placeholder="Price">
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                 <button type="submit" name="addProduct" class="btn btn-success">Save</button>
                              </div>

                           </form>

                           <?php
                              include("../connection.php");

                                 if (isset($_POST['addProduct'])) {
                                    $serialNo = $_POST['serialNo'];
                                    $name = $_POST['name'];
                                    $description = $_POST['description'];
                                    $warranty = $_POST['warranty'];
                                    $quantity = $_POST['quantity'];
                                    $addedOn = $_POST['addedOn'];
                                    $price = $_POST['price'];
                                    $image = $_FILES['image'];
                                    
                                    // Path to store Image into DB
                                    $imagePath = "assets".'/'."images".'/'."productImages".'/'.basename($_FILES["image"]["name"]);
                                    
                                    // Path to store Image into Folder
                                    $imageTarget = "../images/productImages/".basename($_FILES["image"]["name"]);

                                    $sql = "INSERT INTO `products` (`serialNo`, `name`, `description`, `img`, `warranty`, `quantity`, `addedOn`, `price`) 
                                             VALUES ('$serialNo', '$name', '$description', '$imagePath', '$warranty', '$quantity', '$addedOn', '$price')";
   
                                    if ($conn->query($sql) === TRUE) {
                                       // Move physical file of image into target
                                       if (move_uploaded_file($_FILES['image']['tmp_name'], $imageTarget)) {
                                          // echo '<h1>Product Added Successfully!</h1>';
                                          return;
                                       } else {
                                          echo "<h1>Your Item is saved but image cannot be added into DB.</h1>";
                                       }
                                    } else {
                                       echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                 }
                           ?>

                        </div>
                     </div>
                  </div>

                  <!-- 1 Edit Product Modal -->
                  <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit this product</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           
                           <form action="" method="POST" enctype="multipart/form-data">
                              <div class="modal-body">
                                    <div class="form-group">
                                       <label>Serial #</label>
                                       <div class="input-group">
                                          <input type="text" name="serialNo" class="form-control" placeholder="Serial Number">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Name:</label>
                                       <div class="input-group">
                                          <input type="text" name="name" class="form-control" placeholder="Name">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Description</label>
                                       <div class="input-group">
                                          <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                                       </div>
                                 </div>
                                    <div class="form-group">
                                          <label>Warranty:</label>
                                          <div class="input-group">
                                             <input type="text" name="warranty" class="form-control" placeholder="Warranty">
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label>Quantity:</label>
                                          <div class="input-group">
                                             <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label>Added On:</label>
                                          <div class="input-group">
                                             <input type="date" name="addedOn" class="form-control" placeholder="Date">
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <label>Price:</label>
                                          <div class="input-group">
                                             <input type="text" name="price" class="form-control" placeholder="Price">
                                          </div>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                 <button type="submit" name="editProduct" class="btn btn-success">Save</button>
                              </div>
                           </form>

                           <?php
                              include("connection.php");

                                 if (isset($_POST['editProduct'])) {
                                    $sno = $_POST['serialNo'];
                                    $nm = $_POST['name'];
                                    $desc = $_POST['description'];
                                    $warr = $_POST['warranty'];
                                    $quan = $_POST['quantity'];
                                    $dat = $_POST['addedOn'];
                                    $pr = $_POST['price'];

                                    $sql = "UPDATE `products` SET `name`='$nm',
                                          `description`='$desc',`warranty`='$warr',
                                          `quantity`='$quan',`addedOn`='$dat',`price`='$pr' 
                                          WHERE `serialNo`=$sno";
   
                                    if ($conn->query($sql) === TRUE) {
                                       
                                    } else {
                                       echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                 }
                           ?>

                        </div>
                     </div>
                  </div>

                  <!-- PRODUCTS TABLE -->
                  <div class="card mb-4">
                     <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        All Products
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th>Serial #</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Warranty</th>
                                    <th>Quantity</th>
                                    <th>Added On</th>
                                    <th>Price</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
                              
                           <?php
                              include("connection.php");
                              error_reporting(0); 

                              $sql = "SELECT * FROM products";
                              $data = mysqli_query($conn, $sql);
                              $total_rows = mysqli_num_rows($data);

                              if ($total_rows != 0) {
                                 while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>
                                          <td>".$result['serialNo']."</td>
                                          <td>".$result['name']."</td>
                                          <td>".$result['description']."</td>
                                          <td>".$result['warranty']."</td>
                                          <td>".$result['quantity']."</td>
                                          <td>".$result['addedOn']."</td>
                                          <td>".$result['price']."</td>
                                          <td class='ops-row'>
                                             <form action='' method='POST'>
                                                <button type='button' data-toggle='modal' data-target='#editProductModal' class='btn btn-sm btn-success'><i class='fas fa-edit edit-btn'></i></button>
                                                <button type='submit' name='deleteProductBtn' value=".$result['serialNo']." class='btn btn-sm btn-danger'><i class='fas fa-trash-alt delete-btn'></i></button>
                                             </form>
                                          </td>
                                          </tr>";
                                 }
                                 echo "</tbody></table>";
                                 echo "</div></div>";
                              }
                           ?> 
                           
                           <?php
                                 include("../connection.php");

                                 if (isset($_POST["deleteProductBtn"])) {
                                    $serial =  $_POST["deleteProductBtn"];
                                    $sql = "DELETE FROM products where serialNo='$serial' ";
                                 
                                    if ($conn->query($sql) === TRUE) {
                                       // header('Location: '.$path);
                                       // die();
                                       echo "<script></script>";
                                    } else {
                                       echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                 }
                                 $conn->close();
                           ?>
                  </div>
               </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
               <div class="container-fluid">
                  <div class="d-flex align-items-center justify-content-between small">
                     <div class="text-muted">Copyright &copy; Infinity 2020</div>
                     <div>
                        <a href="../policy.php">Privacy Policy</a>
                        &middot;
                        <a href="../FAQs.php">FAQ</a>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
   </body>
</html>