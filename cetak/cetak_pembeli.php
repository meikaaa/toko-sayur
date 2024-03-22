<?php
include "../koneksi/koneksi.php";

$sql = "SELECT * FROM pembeli";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP SAYUR</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
</head>
<body>
    <div class="container">
      <br>

        <div class="card">
            <div class="card-body">
            <table class="table table-striped table-hover text-center">
                <h4>Daftar Pembeli</h4><br>
               <tr class="table-secondary">
                    <th>No</th>
                    <th>Nama pembeli</th>
                    <th>No HP</th>
                </tr>
                <?php while ($pembeli = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?=$pembeli['id_pembeli']?></td>
                        <td><?=$pembeli['nama_pembeli']?></td>
                        <td><?=$pembeli['no_hp']?></td>
                   
                    </tr>

               <?php } ?>
            </table>
            </div>
        </div>
        
    </div>
</body>
</html>
<script>
    window.print();
</script>