<?php
    include "connection.php";
    
    //pagination
    $dataPages = 14;
    $totalData = count(query("SELECT * FROM datatrans"));
    $totalPages = ceil($totalData/$dataPages);
    $activePages = (isset ($_GET["p"])) ? $_GET["p"] : 1;
    $firstPages = ($dataPages * $activePages) - $dataPages;
    //end-pagination
    $result = mysqli_query($conn, "SELECT * FROM datatrans ORDER BY id DESC LIMIT $firstPages, $dataPages");

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
        <a href="transaction.php" class="list-group-item list-group-item-action bg-transparent second-text active">
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
          <h2 class="text-light">Transaksi</h2>
        </div>
      </nav>   

      <!--content-->
      <div class="container-fluid px-4">
        <h3 class="fs-4 mb-3 text-light">Transaksi Keluar Masuk barang</h3>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start pb-1">       
        
          <!-- Modal -->
          <div class="modal fade" id="add-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>                

                <form action="add.php" method="post">
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" id="nama" style="text-transform: capitalize;">
                  </div>
                  <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Barang</label>
                    <select id="jenis" class="form-select" name="jenis" aria-label="Default select example">
                      <option value="ATK">ATK</option>
                      <option value="Dokumen">Dokumen</option>
                      <option value="Elektronik">Elektronik</option>
                      <option value="Perabotan">Perabotan</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="admin" class="form-label">Nama Admin</label>
                    <input type="text" class="form-control" name="admin" id="admin" style="text-transform: capitalize;">
                  </div>
                  <div class="mb-3">
                    <label for="tgl" class="form-label">Tanggal Transaksi</label>
                    <input type="datetime-local" class="form-control" name="tgl" id="tgl" style="text-transform: capitalize;">
                  </div>
                  <div class="mb-3">
                    <label for="stk" class="form-label">Jumlah Stok</label>
                    <input type="number" class="form-control" name="stk" id="stk">
                  </div>
                  <div class="mb-3 btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="trans" id="masuk" autocomplete="off" value="Masuk">
                    <label class="btn btn-outline-success" for="masuk">Masuk</label>
                    <input type="radio" class="btn-check" name="trans" id="keluar" autocomplete="off" value="Keluar">
                    <label class="btn btn-outline-danger" for="keluar">Keluar</label>
                  </div>                    
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="insertdata" class="btn btn-primary">Simpan Data</button>
                  </div>                   
                </form>  
                </div>                           
              </div>
            </div>
          </div>

          <!-- Modal Edit-->
          <div class="modal fade" id="edit-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Transaksi</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>                

                <form action="edit.php" method="post">
                <div class="modal-body">

                  <input type="hidden" name="id" id="id">

                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" id="namaupt" style="text-transform: capitalize;">
                  </div>
                  <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Barang</label>
                    <select id="jenisupt" class="form-select" name="jenis" aria-label="Default select example">
                      <option value="ATK">ATK</option>
                      <option value="Dokumen">Dokumen</option>
                      <option value="Elektronik">Elektronik</option>
                      <option value="Perabotan">Perabotan</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="admin" class="form-label">Nama Admin</label>
                    <input type="text" class="form-control" name="admin" id="adminupt" style="text-transform: capitalize;">
                  </div>
                  <div class="mb-3">
                    <label for="tgl" class="form-label">Tanggal Transaksi</label>
                    <input type="datetime-local" class="form-control" name="tgl" id="tglupt" style="text-transform: capitalize;">
                  </div>
                  <div class="mb-3">
                    <label for="stk" class="form-label">Jumlah Stok</label>
                    <input type="number" class="form-control" name="stk" id="stkupt">
                  </div>
                  <div class="mb-3 btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="trans" id="masukupt" autocomplete="off" value="Masuk">
                    <label class="btn btn-outline-success" for="masukupt">Masuk</label>
                    <input type="radio" class="btn-check" name="trans" id="keluarupt" autocomplete="off" value="Keluar">
                    <label class="btn btn-outline-danger" for="keluarupt">Keluar</label>
                  </div>                    
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                  </div>                   
                </form>  
                </div>                           
              </div>
            </div>
          </div>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-data">
            <i class="bi bi-plus-circle"></i>
          </button>

          <form action="" method="post">
              <input type="text" id="keyword" name ="keyword" class="form-control" placeholder="Cari..." aria-label="Input group example" aria-describedby="btnGroupAddon">
          </form>  
        </div>  

       <!--Table Start Here-->
        <div class="row my-1">            
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
                            <th scope="col">Menu Tambahan</th>
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
                                    <td>                                        
                                        <button type="button" class="btn btn-primary btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#edit-data">
                                            <i class="bi bi-pencil"></i>
                                        </button>|
                                        <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Untuk Menghapus Data?');">
                                        <button type="submit" name="update"  class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                          </button>
                                        </a>
                                    </td>
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
                                    <td>
                                          <button type="button" class="btn btn-primary btn-sm editbtn" data-bs-toggle="modal" data-bs-target="#edit-data">
                                            <i class="bi bi-pencil"></i>
                                          </button>|
                                        <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Untuk Menghapus Data?');">
                                          <button type="submit" name="update"  class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                          </button>
                                        </a>
                                    </td>
                                </tr>
                              <?php } ?>
                            <?php $i++  ; ?>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!--pagination box-->
        
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
 
  <script text="text/javascript" src="js/script.js"></script>
</body>
</html>