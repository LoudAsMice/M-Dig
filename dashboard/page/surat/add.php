<?php 
$insert	= insert("INSERT INTO `request_surat`(`id`, `request_user`, `surat`, `pesan`, `status`) VALUES ('','$id','1','','Request')");

if (mysqli_affected_rows($koneksi) == "1") {
	?>
	<script type="text/javascript">
		window.location.href = "?page=surat&action=edit&id=<?= base64_encode($koneksi->insert_id); ?>"
	</script>
	<?php
}
 ?>