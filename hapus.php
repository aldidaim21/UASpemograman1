<?php

include 'logic.php';

$id = $_GET["id"];

if (hapuscuti($id) > 0) {
    echo "
			<script>
			alert('Data cuti $id berhasil dihapus!');
			document.location.href='index.php';
			</script>

	";
} else {
    echo "
			<script>
			alert('Data gagal  dihapus!');
			document.locati on.href='index.php';
			</script>

	";
}
