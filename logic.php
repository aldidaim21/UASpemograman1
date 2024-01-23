<?php

$conn = mysqli_connect("localhost", "root", "", "eplusgo_karyawan");


// cek koneksi database	 
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}



// menampilkan  query database
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function cari1($keyword1)
{
    $query = "SELECT * FROM cuti
			WHERE 
			id like '%$keyword1%'
			";
    return query($query);
}


function cari2($keyword2)
{
    $query = "SELECT * FROM cuti
			WHERE 
			tanggal_cuti LIKE '%$keyword2%'
			";
    return query($query);
}



// menabmbahkan data cuti
function tambahcuti($data)
{
    global $conn;
    // get form dari script html
    $karyawan_id = htmlspecialchars($data["karyawan_id"]);
    $tanggal_cuti = $data["tanggal_cuti"];
    $jumlah = htmlspecialchars($data["jumlah"]);

    // Konversi data tanggal
    $tanggal_cuti = date("Y-m-d", strtotime($data["tanggal_cuti"]));

    // memasukan data kedalam database 
    $query = "INSERT INTO  cuti (karyawan_id, tanggal_cuti, jumlah) VALUES
				('$karyawan_id', '$tanggal_cuti', '$jumlah')
			 ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// edit data 
function update_cuti($data)
{
    global $conn;

    // Memanggil id
    $id = $data["id"];

    // Get form data from HTML script
    $karyawan_id = htmlspecialchars($data["karyawan_id"]);
    $tanggal_cuti = htmlspecialchars($data["tanggal_cuti"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    // Memasukkan data ke dalam database
    $query = "UPDATE cuti SET
                karyawan_id = '$karyawan_id', 
                tanggal_cuti = '$tanggal_cuti', 
                jumlah = '$jumlah'
                WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Menghapus cuti
function hapuscuti($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM cuti WHERE id = $id");
    return mysqli_affected_rows($conn);
}
