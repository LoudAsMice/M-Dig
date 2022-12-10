<?php 

function query($query){
	global $koneksi;
	$sql = $koneksi->query($query);
	$fetch = [];
	while ($fetchs = $sql->fetch_assoc()) {
		$fetch[] = $fetchs;
	}
	return $fetch;
}

function insert($query){
	global $koneksi;
	$sql = "$query";
	mysqli_query($koneksi, $sql);
}
function update($query){
	global $koneksi;
	$sql = "$query";
	mysqli_query($koneksi, $sql);
}

function delete($query){
	global $koneksi;
	$sql = "$query";
	mysqli_query($koneksi, $sql);
	return "1";
}
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
 ?>
