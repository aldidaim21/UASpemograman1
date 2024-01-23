<?php
include 'logic.php';
// ambil data di URL
$id = $_GET["id"];
// query data layanan
$cuti = query("SELECT * FROM cuti WHERE id = $id")[0];



// cek apakah tombol submit 
if (isset($_POST["submit"])) {

    if (update_cuti($_POST) > 0) {
        echo "
			<script>
			alert('Data ID $id berhasil diubah!');
			document.location.href='index.php';
			</script>
		";
    } else {
        echo "
            <script>
            alert('Data ID $id gagal diubah!');
            document.location.href='service.php';
            </script>
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengubah Data</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style/style.css">

</head>

<body>
    <div class="container">

        <!-- container form  -->
        <div class="content-all">
            <h2>Update Cuti ID <?php echo $cuti["id"] ?></h2>
        </div>

        <!-- breadcrumb -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="#">Update Cuti ID <?php echo $cuti["id"] ?></li>
            </ol>
        </nav>

        <div class="conform">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                    <input type="text" name="id" id="floatingInput" class="form-control" value="<?= $cuti["id"]; ?>" required>
                    <label for="floatingInput">id</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="karyawan_id" id="floatingInput" class="form-control" value="<?= $cuti["karyawan_id"]; ?>" required>
                    <label for="floatingInput">karyawan_id</label>
                </div>

                <div class="mb-3">
                    <label for="floatingInput" class="form-label">Tanggal Cuti</label>
                    <input type="date" name="tanggal_cuti" id="floatingInput" class="form-control" value="<?= date('Y-m-d', strtotime($cuti['tanggal_cuti'])); ?>" required>
                </div>


                <div class="form-floating mb-3">
                    <input type="number" name="jumlah" id="floatingInput" class="form-control" value="<?= $cuti["jumlah"]; ?>" required>
                    <label for="floatingInput">jumlah</label>
                </div>

                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
        </div>
    </div>

    </form>
    </div>


</body>