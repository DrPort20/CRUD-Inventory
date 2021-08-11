<?php
    include_once("connection.php");

    //pagination
    $dataPages = 14;
    $totalData = count(query("SELECT nm_brg, jenis_brg, SUM(stk - stkout) AS Total FROM datatrans group by nm_brg"));
    $totalPages = floor($totalData/$dataPages);
    $activePages = (isset ($_GET["p"])) ? $_GET["p"] : 1;
    $firstPages = ($dataPages * $activePages) - $dataPages;
    //end-pagination

    $result = mysqli_query($conn, "SELECT nm_brg, jenis_brg, SUM(stk - stkout) AS Total FROM datatrans group by nm_brg LIMIT $firstPages, $dataPages");

    //pagination

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
        <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="bi bi-speedometer2 me-2"></i>
              Dashboard
        </a>
        <a href="transaction.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
          <i class="bi bi-shuffle me-2"></i>
              Transaksi
        </a>
        <a href="listBarang.php" class="list-group-item list-group-item-action bg-transparent second-text active">
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
          <h2 class="text-light">Daftar Barang</h2>
        </div>
      </nav>

      <div class="container-fluid px-4">
                
        <div class="row my-1">
            <h3 class="fs-4 mb-3 text-light">Daftar Barang Yang Tersedia</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start pb-1">   
            <form action="" method="post">
              <input type="text" id="keyword" name ="keyword" class="form-control" placeholder="Cari..." aria-label="Input group example" aria-describedby="btnGroupAddon">
            </form>  
            </div>
            <div id="tableContent" class="col">
                <table class="table table-bordered bg-white rounded shadow-sm table-hover">
                    <thead class="primary-text">
                        <tr>
                            <th scope="col" width="50">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                            <?php foreach( $result as $row ) : ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $row["nm_brg"]; ?></td>
                                    <td><?= $row["jenis_brg"]; ?></td>
                                    <td><?= $row["Total"]; ?></td>

                                </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
          <nav aria-label="...">
            <ul class="pagination primary-text">
            <?php if ($activePages > 1) : ?>
            <li class="page-item">
              <a class="page-link" href="?p=<?= $activePages - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <?php endif; ?>
              <?php for($i = 1; $i <= $totalPages; $i++) : ?>
                <?php if($i == $activePages) : ?>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="?p=<?= $i; ?>"><?= $i; ?></a>
                  </li>
              
                <?php else : ?>
                  <li class="page-item">
                    <a class="page-link" href="?p=<?= $i; ?>"><?= $i; ?></a>
                  </li>
                <?php endif; ?>
              <?php endfor; ?>
              <?php if ($activePages < $totalPages) : ?>
              <li class="page-item">
                <a class="page-link" href="?p=<?= $activePages + 1; ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </nav>
    </div>
</div>
</div>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>                            
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script text="text/javascript" src="js/scriptbrg.js"></script>
</body>
</html>