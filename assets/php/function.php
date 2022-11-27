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
 ?>
