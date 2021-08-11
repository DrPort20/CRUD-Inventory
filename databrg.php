<?php
    require 'connection.php';
    
    $keyword = $_GET["keyword"];
    $query = "SELECT nm_brg, jenis_brg, SUM(stk - stkout) AS Total FROM datatrans WHERE
                    nm_brg LIKE '%$keyword%' OR
                    jenis_brg LIKE '%$keyword%'
                    group by nm_brg";

    $dataTransaksi = query($query);
?>

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
                            <?php foreach( $dataTransaksi as $row ) : ?>
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