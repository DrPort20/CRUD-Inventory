<?php
    include_once("connection.php");
    
    $result = mysqli_query($conn, "SELECT * FROM datatrans ORDER BY id DESC LIMIT 0, 13");
    
    $totalstk = mysqli_query($conn, "SELECT SUM(stk - stkout) AS Total FROM datatrans");
    $sum = mysqli_fetch_assoc($totalstk); 
    
    $totaltrans = mysqli_query($conn, "SELECT COUNT(*) FROM datatrans");   
    $sumtrans = mysqli_fetch_assoc($totaltrans); 

    $totalin = mysqli_query($conn, "SELECT SUM(stk) as ttlin from datatrans WHERE status='Masuk'");   
    $sumin = mysqli_fetch_assoc($totalin); 

    $totalout = mysqli_query($conn, "SELECT SUM(stkout) as ttlout from datatrans WHERE status='Keluar'");   
    $sumout = mysqli_fetch_assoc($totalout); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  

  <title>Sistem Inventory</title>
</head>
<body>

  <div class="d-flex" id="wrapper">

    <!--Sidebar Start Here-->

    <div class="bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 primary-text fs-2 fw-bold text-uppercase border-bottom">
        <i class="bi bi-archive-fill me-2" ></i>Inventory
      </div>
      <div class="list-group list-group-flush fs-5 my-3">
        <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active">
          <i class="bi bi-speedometer2 me-2"></i>
              Dashboard
        </a>
        <a href="transaction.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="bi bi-shuffle me-2"></i>
              Transaksi
        </a>
        <a href="listBarang.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="bi bi-basket me-2"></i>
             Daftar Barang
        </a>
      </div>
    </div>

    <!--Sidebar End Here-->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-4">
        <div class="d-flex align-items-center">
          <i class="bi bi-list text-light fs-1 me-3 mb-2" id="menu-toggle"></i>
          <h2 class="text-light">Dashboard</h2>
        </div>
      </nav>

      <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3 text-dark">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?= $sum['Total']; ?></h3>
                        <p class="fs-5 fw-bold">Total Barang</p>
                    </div>
                    <i class="bi bi-box fs-1 mb-2"></i>
                </div>
            </div>

            <div class="col-md-3 primary-text fw-bold">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?= $sumin['ttlin']; ?></h3>
                        <p class="fs-5">Barang Masuk</p>
                    </div>
                    <i class="bi bi-cart-plus fs-1 mb-2"></i>
                </div>
            </div>

            <div class="col-md-3 text-danger fw-bold">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?= $sumout['ttlout']; ?></h3>
                        <p class="fs-5">Barang Keluar</p>
                    </div>
                    <i class="bi bi-cart-dash fs-1 mb-2"></i>
                </div>
            </div>

            <div class="col-md-3 light-text fw-bold">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?= $sumtrans['COUNT(*)']; ?></h3>
                        <p class="fs-5">Total Transaksi</p>
                    </div>
                    <i class="bi bi-currency-dollar fs-1 mb-2"></i>
                </div>
            </div>
        </div>        
           
         <!--Table Start Here-->
         <div class="row my-5">            
         <h3 class="fs-4 mb-3 text-light">13 Transaksi Terakhir</h3>
            <div id="tableContent" class="col table-responsive">
                <table class="table table-bordered bg-white rounded shadow-sm table-hover">
                    <thead class="primary-text">
                        <tr>
                            <th scope="col" width="50">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                            <?php foreach( $result as $row ) : ?>
                              <?php if($row["status"]=='Masuk'){?>
                                <tr class="text-success">
                                    <td><?= $row["id"]; ?></td>
                                    <td><?= $row["nm_brg"]; ?></td>
                                    <td><?= $row["jenis_brg"]; ?></td>
                                    <td><?= $row["nm_org"]; ?></td>
                                    <td><?= $row["tgl_klr"]; ?></td>
                                    <td>+<?= $row["stk"]; ?></td>
                                    <td><?= $row["status"]; ?></td>
                                </tr>
                              <?php }else{?>
                                <tr class="text-danger">
                                    <td><?= $row["id"]; ?></td>
                                    <td><?= $row["nm_brg"]; ?></td>
                                    <td><?= $row["jenis_brg"]; ?></td>
                                    <td><?= $row["nm_org"]; ?></td>
                                    <td><?= $row["tgl_klr"]; ?></td>
                                    <td><?= -$row["stkout"]; ?></td>
                                    <td><?= $row["status"]; ?></td>
                                </tr>
                              <?php } ?>
                            <?php $i++  ; ?>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>                
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script text="text/javascript" src="js/script.js"></script>
</body>
</html>