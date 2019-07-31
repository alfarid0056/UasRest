<!DOCTYPE html>
<html>

<body>

<h4>tampilan JSON</h4>
<?php
include'koneksi.php';

$query = mysqli_query($koneksi1, 'select * from ekskul');

if (mysqli_num_rows($query) > 0) {
	# buat array
	$responsistem = array();
	$responsistem["data"] = array();
	while ($row = mysqli_fetch_assoc($query)) {
		# kerangka format penampilan data json
		$data['id'] = $row["id_ekskul"];
		$data['ekskul'] = $row["nama_ekskul"];
		$data['tempat'] = $row["lokasi"];
		$data['hari'] = $row["hari"];
		$data['jam'] = $row["jam_mulai"];
		array_push($responsistem["data"], $data);
	}
	echo json_encode($responsistem);
} else {
	# menmapilkan pesan jika tidak ada data dalam tabel
	$responsistem["message"]="tidak ada data";
	echo json_encode($responsistem);
}
?>
</body>
</html>
