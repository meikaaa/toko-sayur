<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-- LOGIN --</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <style>
        .custom-card{
            border-radius: 15px;
        }
      
    </style>
</head>
<body><br><br>
    <div class="container">
        <div class="card col-md-6 mx-auto custom-card">

                <div class="card-header text-center"><h4>LOGIN TOKO SAYUR</h4></div>
                <div class="card-body">
                <form action="../login/proses_login.php" method="post">
                    <label for="" class="form-label">Username</label><br>
                    <input type="text" name="username" id="" class="form-control" placeholder="Masukkan username"><br>
                    <label for="" class="form-label">Password</label><br>
                    <input type="password" name="password" id="" class="form-control" placeholder="Masukkan password"><br>

                    <button type="submit" class="btn btn-success">Login</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>