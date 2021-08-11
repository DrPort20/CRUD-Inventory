<?php
include_once 'connection.php';
 
if(isset($_POST['updatedata'])) {
    $id = $_POST['id'];
    $nama = ucwords($_POST['nama']);
    $jenis = ucwords($_POST['jenis']);
    $admin = ucwords($_POST['admin']);
    $stk = ucwords($_POST['stk']);
    $tgk = ucwords($_POST['tgl']);
    $trans = ucwords($_POST['trans']);
    if ($trans == "Masuk"){
       $insertdata = mysqli_query($conn, "UPDATE datatrans SET nm_brg='$nama', jenis_brg='$jenis', nm_org='$admin', tgl_klr='$tgk', stk='$stk', status='$trans' WHERE id=$id");
    }else{
       $insertdata = mysqli_query($conn, "UPDATE datatrans SET nm_brg='$nama', jenis_brg='$jenis', nm_org='$admin', tgl_klr='$tgk', stkout='$stk', status='$trans' WHERE id=$id");          
    }
   
    if($insertdata){
       echo '<script> alert("Data Saved");</script>';
       header('Location: transaction.php');
    }else{
       echo '<script> alert("Data Not Saved");</script>';
    }
}
?>