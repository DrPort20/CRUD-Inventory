<?php
     include 'connection.php';
                    
        if(isset($_POST['insertdata'])) {
             $nama = ucwords($_POST['nama']);
             $jenis = ucwords($_POST['jenis']);
             $admin = ucwords($_POST['admin']);
             $stk = ucwords($_POST['stk']);
             $tgk = ucwords($_POST['tgl']);
             $trans = ucwords($_POST['trans']);
             if ($trans == "Masuk"){
                $insertdata = mysqli_query($conn, "INSERT INTO datatrans (nm_brg, jenis_brg, nm_org, tgl_klr, stk, status) VALUES ('$nama', '$jenis', '$admin', '$tgk', '$stk', '$trans')");
             }else{
                $insertdata = mysqli_query($conn, "INSERT INTO datatrans (nm_brg, jenis_brg, nm_org, tgl_klr, stkout, status) VALUES ('$nama', '$jenis', '$admin', '$tgk', '$stk', '$trans')");          
             }
            
             if($insertdata){
                echo '<script> alert("Data Saved");</script>';
                header('Location: transaction.php');
             }else{
                echo '<script> alert("Data Not Saved");</script>';
             }
        }
?>              
</body>
</html>