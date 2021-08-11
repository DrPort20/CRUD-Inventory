<?php
    require 'connection.php';
    
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM datatrans
              WHERE
                nm_brg LIKE '%$keyword%' OR
                jenis_brg LIKE '%$keyword%' OR
                nm_org LIKE '%$keyword%' OR
                tgl_klr LIKE '%$keyword%' OR
                stk LIKE '%$keyword%' OR
                status LIKE '%$keyword%'
                ";

    $dataTransaksi = query($query);
?>

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
                            <?php foreach( $dataTransaksi as $row ) : ?>
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
                                    <td><?= -$row["stk"]; ?></td>
                                    <td><?= $row["status"]; ?></td>
                                    <td>
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