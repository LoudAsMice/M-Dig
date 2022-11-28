<?php 
$pid = base64_decode($_GET['id']);
$delete = delete("DELETE FROM `request_surat` WHERE id='$pid'");

if ($delete == "1") {
?>
	<script type="text/javascript">
		window.location.href = "?page=surat"
	</script>
<?php
}
?>