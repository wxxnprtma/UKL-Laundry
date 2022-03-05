<?php
require_once "../author/login_guard.php";

allow_page_access_exclusive(["Admin", "Kasir"]);

require_once "../utility/utils.php";
require_once "../koneksi.php";

if ($_GET) {
	$id = $_GET["id"];

	if (!checkParams($id, "ID Transaksi")) {
		exit();
	}

	$query_detail_transaksi = mysqli_query($conn, "DELETE FROM `detail_transaksi` WHERE id_transaksi = $id");
	$query_transaksi = mysqli_query($conn, "DELETE FROM `transaksi` WHERE id = $id");

	if ($query_transaksi && $query_detail_transaksi) {
		warn("Berhasil menghapus transaksi");
		redirectTo("tampil.php");
	} else {
		warn("Gagal menghapus transaksi");
	}
}
?>