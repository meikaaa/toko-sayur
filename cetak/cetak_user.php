<?php
include "../koneksi/koneksi.php";

$sql = "SELECT * FROM user";
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
    <div class="container"><br>

               <div class="card">
            <div class="card-body">
            <table class="table table-striped table-hover text-center">
                <h4>Daftar User</h4><br>
                    <tr class="table-secondary">
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
                <?php while ($user = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?=$user['id_user']?></td>
                        <td><?=$user['username']?></td>
                        <td><?=$user['password']?></td>
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

